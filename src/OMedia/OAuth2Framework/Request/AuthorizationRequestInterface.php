<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Request;

use Like2biz\Bundle\GoogleBundle\OAuth2\Scope\ScopeInterface;

/**
 * RFC6749 OAuth2 Authorization request interface.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
 * @author Alexander Sergeychik
 */
interface AuthorizationRequestInterface extends StateAwareRequestInterface {
	
	const PARAMETER_RESPONSE_TYPE = 'response_type';
	const PARAMETER_CLIENT_ID = 'client_id';
	const PARAMETER_REDIRECT_URI = 'redirect_uri';
	const PARAMETER_SCOPE = 'scope';

	/**
	 * Value MUST be set to "code"
	 *
	 * @param string $responseType        	
	 */
	public function setResponseType($responseType = 'code');

	/**
	 * Sets the client identifier
	 *
	 * @param string $clientId        	
	 */
	public function setClientId($clientId);

	/**
	 * Sets redirection uri
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
	 *
	 * @param string $redirectUri        	
	 */
	public function setRedirectUri($redirectUri);

	/**
	 * Sets the scope of the access request
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 *
	 * @param ScopeInterface $scope        	
	 */
	public function setScope(ScopeInterface $scope);

}
