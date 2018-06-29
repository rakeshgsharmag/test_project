<?php
/*
 *  Test case for Team Update
 */
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamUpdateTestCase extends WebTestCase
{
    	public function testUpdateTeamListPassCase()
    	{
        	$client = static::createClient();
		$token_crawler = $client->request('GET', '/api/tokens');
		$resp_token = json_decode($client->getResponse()->getContent());
		$header = array('HTTP_Authorization'=> $resp_token->headers->Authorization,
        		'HTTP_CONTENT_TYPE' => 'application/json',
			'HTTP_ACCEPT'       => 'application/json',
    		);
        	$crawler = $client->request('POST', '/update-team', array('teamid'=>'5','leagueid'=>'2', 'teamName'=>'updated test name', 'strip'=>'test updated strip'),array(),$header);
		$resp = json_decode($client->getResponse()->getContent());
        	$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertEquals(200, $resp->errorCode);
    	}

	//Fail case :  If there having either of parameter null or blank
	public function testUpdateTeamListFailCase()
    	{
        	$client = static::createClient();
		$token_crawler = $client->request('GET', '/api/tokens');
		$resp_token = json_decode($client->getResponse()->getContent());
		$header = array('HTTP_Authorization'=> $resp_token->headers->Authorization,
        		'HTTP_CONTENT_TYPE' => 'application/json',
			'HTTP_ACCEPT'       => 'application/json',
    		);
        	$crawler = $client->request('POST', '/update-team', array('teamName'=>'updated test name', 'strip'=>'test updated strip'),array(),$header);
		$resp = json_decode($client->getResponse()->getContent());
        	$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertNotEquals(200, $resp->errorCode);
    	}

}
