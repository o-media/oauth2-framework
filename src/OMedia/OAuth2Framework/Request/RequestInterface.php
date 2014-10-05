<?php
namespace OMedia\OAuth2Framework\Request;

use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Framework request interface.
 * 
 * In case of platform-specific request implementations, this framework
 * requests uses delegating request parameters to underlying request objects
 * through apply() method provided in this interface.
 *
 * This interface also includes all RFC-defined parameters used in OAuth2 spec.
 * 
 * @see http://tools.ietf.org/html/rfc6749
 * @author Alexander Sergeychik
 */
interface RequestInterface {
	
	const GRANT_TYPE_TOKEN = 'token';
	const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';
	const GRANT_TYPE_PASSWORD = 'password';
	const GRANT_TYPE_CLIENT_CREDENTIALS = 'client_credentials';
	
	const RESPONSE_TYPE_CODE = 'code';
	const RESPONSE_TYPE_TOKEN = 'token';
	
	const PARAMETER_GRANT_TYPE = 'grant_type';
	const PARAMETER_CLIENT_ID = 'client_id';
	const PARAMETER_CLIENT_SECRET = 'client_secret';
	const PARAMETER_CODE = 'code';
	const PARAMETER_REDIRECT_URI = 'redirect_uri';
	const PARAMETER_RESPONSE_TYPE = 'response_type';
	const PARAMETER_SCOPE = 'scope';
	const PARAMETER_STATE = 'state';

	/**
	 * Applies request parameters to underlying http request
	 *
	 * @param HttpRequestInterface $request        	
	 * @return HttpRequestInterface
	 */
	public function apply(HttpRequestInterface $request);

}
