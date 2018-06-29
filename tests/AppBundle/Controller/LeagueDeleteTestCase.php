<?php
/*
 *  Test case for League Delete
 */
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LeagueDeleteTestCase extends WebTestCase
{
    	public function testDeleteLeaguePassCase()
    	{
        	$client = static::createClient();
		$token_crawler = $client->request('GET', '/api/tokens');
		$resp_token = json_decode($client->getResponse()->getContent());
		$header = array('HTTP_Authorization'=> $resp_token->headers->Authorization,
        		'HTTP_CONTENT_TYPE' => 'application/json',
			'HTTP_ACCEPT'       => 'application/json',
    		);
        	$crawler = $client->request('GET', '/delete-leauge/2',array(),array(),$header);
		$resp = json_decode($client->getResponse()->getContent());
        	$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertEquals(200, $resp->errorCode);
    	}

	//Fail case :  If there having League id null or blank
	public function testDeleteLeagueFailCase()
    	{
        	$client = static::createClient();
		$token_crawler = $client->request('GET', '/api/tokens');
		$resp_token = json_decode($client->getResponse()->getContent());
		$header = array('HTTP_Authorization'=> $resp_token->headers->Authorization,
        		'HTTP_CONTENT_TYPE' => 'application/json',
			'HTTP_ACCEPT'       => 'application/json',
    		);
        	$crawler = $client->request('GET', '/delete-leauge',array(),array(),$header);
		$resp = json_decode($client->getResponse()->getContent());
        	$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertNotEquals(200, $resp->errorCode);
    	}

}
