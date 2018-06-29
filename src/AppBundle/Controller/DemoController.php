<?php

/*
 * This is main controller for the demo project
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Teams;
use AppBundle\Entity\Leagues;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
class DemoController extends Controller {

    public function addTeamAction(Request $request) {    
        $name = $request->request->get('name');
        $strip = $request->request->get('strip');
        $leaugeid = $request->request->get('leaugeid');
        if($name== '' || $strip=='' || $leaugeid==""){
            return new JsonResponse(array("errorCode" =>204,
                            "errorMsg" => 'All parameters are mandatory.'));
        }
        $getTeam = $this->getDoctrine()
                ->getRepository('AppBundle:Teams')
                ->findOneBy(array('name' => $name));
        //a team can only play in a single football league so check if the team is already exist for any league
        if (!$getTeam) {
            $team = new Teams();
            $team->setName($name);
            $team->setLeaugeid($leaugeid);
            $team->setStrip($strip);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($team);
            $entityManager->flush();
        }
        $errorCode = ($getTeam) ? 201 : 200;
        $errorMsg = ($getTeam) ? "One team can be added to the one league only." : "Team created successfully!";
        return new JsonResponse(array("errorCode" => $errorCode,
                            "errorMsg" => $errorMsg));
    }

    public function displayListAction(Request $request, $id) {
//echo 	$request->headers->get('x-session-token');die;
        if(empty($id)){
            return new JsonResponse(array("errorCode" =>204,
                            "errorMsg" => 'League id can not be null.',"result"=>""));
        }
        $entityManager = $this->getDoctrine()->getManager();
        $result = $entityManager->getRepository('AppBundle:Teams')
                ->teamList($id);
	$resp = array("errorCode"=>"200", "errorMsg"=>"success","result"=>$result);
        return new JsonResponse($resp);
    }

    public function deleteLeaugeAction($id) {
         if(empty($id)){
            return new JsonResponse(array("errorCode" =>204,
                            "errorMsg" => 'League id can not be null.'));
        }
        $entityManager = $this->getDoctrine()->getManager();
        $recordExist = $entityManager->getRepository('AppBundle:Leagues')
                ->searchLeauge($id);
        if ($recordExist) {
            $entityManager->remove($recordExist);
            $entityManager->flush();
            $deleteTeam = $entityManager->getRepository('AppBundle:Teams')
                    ->deleteTeam($id);
        }
        $errorCode = (!$recordExist) ? 202 : 200;
        $errorMsg = (!$recordExist) ? "Leauge id doesn't exist!" : "Leauge deleted sucessfully!";
        return new JsonResponse(array("errorCode" => $errorCode,
                            "errorMsg" => $errorMsg));
    }

    public function updateTeamAction(Request $request) {
	// id of the team for which we are changing the attributes
        $teamid = $request->request->get('teamid'); 
        // attributes which are going to change
        $leagueid = $request->request->get('leagueid');
        $teamname =  $request->request->get('teamName');
        $strip = $request->request->get('strip');        
        if($teamid== '' || $leagueid=='' || $teamname=="" || $strip==''){
            return new JsonResponse(array("errorCode" =>204,
                            "errorMsg" => 'All parameters are mandatory.'));
        } 
        $result = $this->getDoctrine()
                ->getRepository('AppBundle:Teams')
                ->updateRecords($teamid,$leagueid,$teamname,$strip);
        return new JsonResponse($result);
    }

}
