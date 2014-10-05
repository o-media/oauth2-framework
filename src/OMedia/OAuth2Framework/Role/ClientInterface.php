<?php
namespace OMedia\OAuth2Framework\Role;

use OMedia\OAuth2Framework\Request\RequestInterface;
use OMedia\OAuth2Framework\Grant\GrantInterface;
use OMedia\OAuth2Framework\Token\AccessTokenInterface;

/**
 * RFC6749 Client interface
 *
 * An application making protected resource requests on behalf of the
 * resource owner and with its authorization. The term "client" does
 * not imply any particular implementation characteristics (e.g.,
 * whether the application executes on a server, a desktop, or other
 * devices).
 *
 * @see http://tools.ietf.org/html/rfc6749#section-1.1
 * @see http://tools.ietf.org/html/rfc6749#section-1.2
 * @see http://tools.ietf.org/html/rfc6749#section-2.1
 * @see http://tools.ietf.org/html/rfc6749#section-2.2
 * @see http://tools.ietf.org/html/rfc6749#section-2.3
 * @author Alexander Sergeychik
 */
interface ClientInterface {

	/**
	 * Returns client identity.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-2.2
	 * @return string
	 */
	public function getIdentity();

	/**
	 * Returns confidential clients credentials.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-2.3
	 * @return AuthenticationInterface
	 */
	public function getCredentials();

	/**
	 * The client requests authorization from the resource owner.
	 * The authorization request can be made directly to the resource owner
	 * or preferably indirectly via the authorization server as an intermediary.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-1.2
	 * @param RequestInterface $request        	
	 * @return GrantInterface
	 */
	public function getGrant(RequestInterface $request);

	/**
	 * The client requests an access token by authenticating with the
	 * authorization server and presenting the authorization grant.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-1.2
	 * @param GrantInterface $grant        	
	 * @return AccessTokenInterface
	 */
	public function getAccessToken(GrantInterface $grant);

	/**
	 * The client requests the protected resource from the resource
	 * server and authenticates by presenting the access token.
	 * 
	 * @see http://tools.ietf.org/html/rfc6749#section-1.2
	 * @param AccessTokenInterface $token
	 * @param $resource
	 * @return mixed
	 */
	public function getProtectedResource(AccessTokenInterface $token, $resource);

}
