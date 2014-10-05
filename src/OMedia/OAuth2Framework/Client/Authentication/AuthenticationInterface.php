<?php
namespace OMedia\OAuth2Framework\Client\Authentication;

use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Client authentication interface.
 * Reflects to RFC authentication flows
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-2.3
 * @author Alexander Sergeychik
 */
interface AuthenticationInterface {

	/**
	 * Signs request by client credentials
	 *
	 * @param HttpRequestInterface $request
	 * @return HttpRequestInterface
	 */
	public function sign(HttpRequestInterface $request);
	
}
