<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Response;

interface SuccessResponseInterface {
	
	const PARAMETER_access_token = 'access_token';
	const PARAMETER_token_type = 'token_type';
	const PARAMETER_expires_in = 'expires_in';
	const PARAMETER_refresh_token = 'refresh_token';
	const PARAMETER_scope = 'scope';

	/**
	 * The access token issued by the authorization server.
	 * 
	 * @return string
	 */
	public function getAccessToken();

	/**
	 * 
	 */
	public function getTokenType();
	
	/**
	 * 
	 */
	public function getExpiresIn();
	
	/**
	 * 
	 */
	public function getRefreshToken();
	
	/**
	 * 
	 * 
	 */
	public function getScope();
	
}
