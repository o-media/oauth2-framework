<?php
namespace OMedia\OAuth2Framework\Endpoint;

/**
 * RFC6749 Redirection endpoint interface
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-3
 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
 * @author Alexander Sergeychik
 */
interface RedirectionEndpointInterface extends EndpointInterface {
	
	/**
	 * Returns redirection endpoint URI.
	 * As redirection should provide params in query/fragment, this method
	 * supports a $params and $fragment arguments
	 * 
	 * @param array $params - array of additional parameters that should be added to redirection uri
	 * @param string $fragment - fragment parameter for client-size grants
	 * @return string
	 */
	public function getUri(array $params = array(), $fragment = null);
	
}
