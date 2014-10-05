<?php
namespace OMedia\OAuth2Framework\Role;

use OMedia\OAuth2Framework\Request\RequestInterface;

/**
 * RFC6749 Resource owner role interface.
 *
 * An entity capable of granting access to a protected resource.
 * When the resource owner is a person, it is referred to as an
 * end-user.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-1.1
 * @see http://tools.ietf.org/html/rfc6749#section-1.2
 * @author Alexander Sergeychik
 */
interface ResourceOwnerInterface {

	/**
	 * Returns authorization grant from authorization request
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-1.2
	 * @param RequestInterface $request        	
	 */
	public function getGrant(RequestInterface $request);

}
