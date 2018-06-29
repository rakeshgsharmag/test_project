<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TeamsRepository extends EntityRepository {

    public function teamList($id) {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
        SELECT * FROM teams t
        WHERE t.leagueid = :id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll();
        return $result;
    }
    public function deleteTeam($id){
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
        DELETE FROM teams t
        WHERE t.leagueid = :id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return;
    }
    public  function teamNameExist($id,$name){
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
        SELECT t.name FROM teams t
        WHERE t.name = :name and t.id != :id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['name'=>$name,'id' => $id]);
        $result = $stmt->fetchAll();
        return $result;
    }
    public  function updateTeam($teamid,$leagueid,$teamname,$strip){
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'UPDATE teams t SET t.name = :name, t.strip = :strip, t.leagueid= :leagueid WHERE t.id = :tid';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['name'=>$teamname,'tid' => $teamid,'strip'=>$strip,'leagueid'=>$leagueid]);
        return;
    }
    public function getTeam($id){
	$conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT t.id FROM  teams t where t.id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function updateRecords($teamid,$leagueid,$teamname,$strip){
       	$teamidExist = $this->getTeam($teamid);
    	//check if teamid exist
        if ($teamidExist) {
            $getTeamName = $this->teamNameExist($teamid, $teamname);
            //if teamid exist then check for team name attribute- same team name should not be allowed
            $resultArray = (!$getTeamName) ? (array("errorCode" => 200,
                            "errorMsg" => "Team updated successfully!")) : (array("errorCode" => 201,
                            "errorMsg" => "Team with same name is already exist."));
		$this->updateTeam($teamid,$leagueid,$teamname,$strip);
            return $resultArray;        
            
        } else {
            return (array("errorCode" => 202,
                            "errorMsg" => "Team id doesn't exist."));
        }    
        
    }
  
}
