<?php
/*
 *  Test case for Team Add
 */
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamAddTestCase extends WebTestCase
{
    	public function testAddTeamListPassCase()
    	{
        	$client = static::createClient();
		$token_crawler = $client->request('GET', '/api/tokens');
		$resp_token = json_decode($client->getResponse()->getContent());
		$header = array('HTTP_Authorization'=> $resp_token->headers->Authorization,
        		'HTTP_CONTENT_TYPE' => 'application/json',
			'HTTP_ACCEPT'       => 'application/json',
    		);
        	$crawler = $client->request('POST', '/add-team', array('name'=>'Test name','strip'=>'test strip', 'leaugeid'=>'2'),array(),$header);
		$resp = json_decode($client->getResponse()->getContent());
        	$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertEquals(200, $resp->errorCode);
    	}

	//Fail case :  If there having either of parameter null or blank
	public function testAddTeamListFailCase()
    	{
        	$client = static::createClient();
		$token_crawler = $client->request('GET', '/api/tokens');
		$resp_token = json_decode($client->getResponse()->getContent());
		$header = array('HTTP_Authorization'=> $resp_token->headers->Authorization,
        		'HTTP_CONTENT_TYPE' => 'application/json',
			'HTTP_ACCEPT'       => 'application/json',
    		);
        	$crawler = $client->request('POST', '/add-team', array('name'=>'Test name'),array(),$header);
		$resp = json_decode($client->getResponse()->getContent());
        	$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertNotEquals(200, $resp->errorCode);
    	}

}
