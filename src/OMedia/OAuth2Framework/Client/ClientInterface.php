<?php
namespace OMedia\OAuth2Framework\Client;

use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Client interface
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-2.1
 * @see http://tools.ietf.org/html/rfc6749#section-2.2
 * @author Alexander Sergeychik
 */
interface ClientInterface {
	
	/**
	 * Returns client identification
	 * 
	 * @see http://tools.ietf.org/html/rfc6749#section-2.2
	 * @return string
	 */
	public function getClientId();
	
	/**
	 * Signs request by client credentials
	 * 
	 * @param HttpRequestInterface $request
	 * @return HttpRequestInterface
	 */
	public function sign(HttpRequestInterface $request);
	
}
