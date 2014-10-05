<?php
namespace OMedia\OAuth2Framework\Endpoint;

/**
 * Endpoint interface.
 * As some endpoints has to add parameters to it's representation 
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-3
 * @author Alexander Sergeychik
 */
interface EndpointInterface {
	
	/**
	 * Returns endpoint uri 
	 * 
	 * @return string
	 */
	public function getUri();
	
}
