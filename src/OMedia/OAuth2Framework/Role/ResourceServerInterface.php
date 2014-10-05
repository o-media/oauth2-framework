<?php
namespace OMedia\OAuth2Framework\Role;

use OMedia\OAuth2Framework\Token\AccessTokenInterface;

/**
 * RFC6749 Resource server role interface.
 *
 * The server hosting the protected resources, capable of accepting
 * and responding to protected resource requests using access tokens.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-1.1
 * @author Alexander Sergeychik
 */
interface ResourceServerInterface {

	/**
	 * Get protected resource
	 *
	 * @param AccessTokenInterface $token
	 * @param $resource        	
	 * @return mixed
	 */
	public function getProtectedResource(AccessTokenInterface $token, $resource);

}
