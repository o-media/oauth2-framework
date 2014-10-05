<?php
namespace OMedia\OAuth2Framework\Client;

use OMedia\OAuth2Framework\IO\HttpRequestInterface;
use OMedia\OAuth2Framework\Client\Authentication\AuthenticationInterface;

/**
 * Client interface
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-2.1
 * @see http://tools.ietf.org/html/rfc6749#section-2.2
 * @see http://tools.ietf.org/html/rfc6749#section-2.3
 * @author Alexander Sergeychik
 */
interface ClientInterface {
	
	/**
	 * Returns client identification
	 * 
	 * @see http://tools.ietf.org/html/rfc6749#section-2.2
	 * @return string
	 */
	public function getId();
	
	/**
	 * For confenetial clients authentication credentials could be set
	 * 
	 * @see http://tools.ietf.org/html/rfc6749#section-2.3
	 * @return AuthenticationInterface
	 */
	public function getAuthentication();
	
}
