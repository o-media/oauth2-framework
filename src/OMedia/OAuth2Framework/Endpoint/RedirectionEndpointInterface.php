<?php
namespace OMedia\OAuth2Framework\Endpoint;

/**
 * RFC6749 Redirection endpoint interface
 *
 * After completing its interaction with the resource owner, the
 * authorization server directs the resource owner's user-agent back to
 * the client. The authorization server redirects the user-agent to the
 * client's redirection endpoint previously established with the
 * authorization server during the client registration process or when
 * making the authorization request.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-3
 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
 * @author Alexander Sergeychik
 */
interface RedirectionEndpointInterface extends EndpointInterface {

	/**
	 * Returns redirection endpoint URI.
	 * As redirection should provide params in query/fragment, this method
	 * supports a $params and $fragment arguments.
	 *
	 * @param array $params
	 *        	- array of additional parameters that should be added to redirection uri
	 * @param string $fragment
	 *        	- fragment parameter for client-size grants
	 * @return string
	 */
	public function getUri(array $params = array(), $fragment = null);

}
