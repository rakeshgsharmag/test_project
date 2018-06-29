<?php
/*
 *  Test case for Team listing
 */
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamListTestCase extends WebTestCase
{
    	public function testDisplayTeamListPassCase()
    	{
        	$client = static::createClient();
		$token_crawler = $client->request('GET', '/api/tokens');
		$resp_token = json_decode($client->getResponse()->getContent());
		$header = array('HTTP_Authorization'=> $resp_token->headers->Authorization,
        		'HTTP_CONTENT_TYPE' => 'application/json',
			'HTTP_ACCEPT'       => 'application/json',
    		);
        	$crawler = $client->request('GET', '/display-list/1',array(),array(),$header);
		$resp = json_decode($client->getResponse()->getContent());
        	$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertEquals(200, $resp->errorCode);
    	}
	//Fail case :  If there having league id null or blank
	public function testDisplayTeamListFailCase()
    	{
        	$client = static::createClient();
        	$token_crawler = $client->request('GET', '/api/tokens');
		$resp_token = json_decode($client->getResponse()->getContent());
		$header = array('HTTP_Authorization'=> $resp_token->headers->Authorization,
        		'HTTP_CONTENT_TYPE' => 'application/json',
			'HTTP_ACCEPT'       => 'application/json',
    		);
        	$crawler = $client->request('GET', '/display-list',array(),array(),$header);
		$resp = json_decode($client->getResponse()->getContent());
        	$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertNotEquals(200, $resp->errorCode);
    	}

}
