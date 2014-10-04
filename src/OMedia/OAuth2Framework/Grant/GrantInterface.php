<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Grant;

interface GrantInterface {
	
	const GRANT_TYPE_TOKEN = 'token';
	const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';
	const GRANT_TYPE_PASSWORD = 'password';
	const GRANT_TYPE_CLIENT_CREDENTIALS = 'client_credentials';
	
	/**
	 * Returns grant type
	 * 
	 * @return string
	 */
	public function getType();
	
	
}