<?php
namespace OMedia\OAuth2Framework\Role;

use OMedia\OAuth2Framework\Grant\GrantInterface;
use OMedia\OAuth2Framework\Token\AccessTokenInterface;

/**
 * RFC6749 Authorization server role interface.
 *
 * The server issuing access tokens to the client after successfully
 * authenticating the resource owner and obtaining authorization.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-1.1
 * @see http://tools.ietf.org/html/rfc6749#section-1.2
 * @author Alexander Sergeychik
 */
interface AuthorizationServerInterface {

	/**
	 * Dispatches authorization grant for access token
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-1.2
	 * @param GrantInterface $grant        	
	 * @return AccessTokenInterface
	 */
	public function getAccessToken(GrantInterface $grant);

}
