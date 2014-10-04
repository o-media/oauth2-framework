<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Request;

use Like2biz\Bundle\GoogleBundle\OAuth2\Scope\ScopeInterface;

/**
 * Access token request
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-4.1.3
 * @author Alexander Sergeychik
 */
interface AccessTokenRequestInterface {
	
	const PARAMETER_GRANT_TYPE = 'grant_type';
	const PARAMETER_CODE = 'code';
	const PARAMETER_REDIRECT_URI = 'redirect_uri';
	const PARAMETER_CLIENT_ID = 'client_id';
	
	
	public function setGrantType($grantType);
	
	public function setScope(ScopeInterface $scope);
	
}
