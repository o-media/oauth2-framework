<?php
namespace OMedia\OAuth2Framework\Token;

use OMedia\OAuth2Framework\Endpoint\RedirectionEndpointInterface;

/**
 * Exchange code token interface
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-10.5
 * @author Alexander Sergeychik
 */
interface CodeTokenInterface {

	/**
	 * Returns exchange code
	 * 
	 * @return string
	 */
	public function getCode();
	
	/**
	 * Returns redirect uri assigned to code
	 * 
	 * @return RedirectionEndpointInterface
	 */
	public function getRedirectUri();
	
}
