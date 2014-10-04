<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Client;

abstract class AbstractClient {
	
	abstract public function getAuthenticationEndpoint();

	abstract public function getTokenEndpoint();
	
}