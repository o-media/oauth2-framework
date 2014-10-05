<?php
namespace OMedia\OAuth2Framework\Request;

use OMedia\OAuth2Framework\Endpoint\RedirectionEndpointInterface;
use OMedia\OAuth2Framework\Scope\ScopeInterface;
use OMedia\OAuth2Framework\Role\ClientInterface;

/**
 * RFC6749 Implicit grant request.
 *
 * The implicit grant type is used to obtain access tokens (it does not
 * support the issuance of refresh tokens) and is optimized for public
 * clients known to operate a particular redirection URI. These clients
 * are typically implemented in a browser using a scripting language
 * such as JavaScript.
 *
 * Since this is a redirection-based flow, the client must be capable of
 * interacting with the resource owner's user-agent (typically a web
 * browser) and capable of receiving incoming requests (via redirection)
 * from the authorization server.
 *
 * Unlike the authorization code grant type, in which the client makes
 * separate requests for authorization and for an access token, the
 * client receives the access token as the result of the authorization
 * request.
 *
 * The implicit grant type does not include client authentication, and
 * relies on the presence of the resource owner and the registration of
 * the redirection URI. Because the access token is encoded into the
 * redirection URI, it may be exposed to the resource owner and other
 * applications residing on the same device.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.2
 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
 * @author Alexander Sergeychik
 */
class ImplicitRequest implements RequestInterface, StateAwareRequestInterface {

	/**
	 * Client identifier
	 *
	 * @var string
	 */
	protected $client;

	/**
	 * Redirection endpoint
	 *
	 * @var RedirectionEndpointInterface
	 */
	protected $redirectionEndpoint;

	/**
	 * Scope
	 *
	 * @var ScopeInterface
	 */
	protected $scope;

	/**
	 * State provided by client
	 *
	 * @var string
	 */
	protected $state;

	/**
	 * Constructs authorization code grant request
	 *
	 * @param ClientInterface $client        	
	 * @param RedirectionEndpointInterface $redirectionEndpoint        	
	 * @param ScopeInterface $scope        	
	 * @param string $state        	
	 */
	public function __construct(ClientInterface $client, RedirectionEndpointInterface $redirectionEndpoint = null, ScopeInterface $scope, $state = null) {
		// requred parameters
		$this->setClient($client);
		
		// optional parameters
		if ($redirectionEndpoint !== null) $this->setRedirectionEndpoint($redirectionEndpoint);
		if ($scope !== null) $this->setScope($scope);
		if ($state !== null) $this->setState($state);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getResponseType() {
		return self::RESPONSE_TYPE_TOKEN;
	}
	
	/**
	 * Returns client
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @return ClientInterface
	 */
	public function getClient() {
		return $this->client;
	}

	/**
	 * Sets the client
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @param ClientInterface $client     	
	 * @return ImplicitRequest
	 */
	public function setClient(ClientInterface $client) {
		$this->client = $client;
		return $this;
	}

	/**
	 * Returns redirection endpoint
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
	 * @return RedirectionEndpointInterface
	 */
	public function getRedirectionEndpoint() {
		return $this->redirectionEndpoint;
	}

	/**
	 * Sets redirection endpoint
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
	 * @param RedirectionEndpointInterface $redirectionEndpoint        	
	 * @return ImplicitRequest
	 */
	public function setRedirectionEndpoint(RedirectionEndpointInterface $redirectionEndpoint) {
		$this->redirectionEndpoint = $redirectionEndpoint;
		return $this;
	}

	/**
	 * Returns access request scope
	 *
	 * @return ScopeInterface
	 */
	public function getScope() {
		return $this->scope;
	}

	/**
	 * Sets the scope of the access request
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 *
	 * @param ScopeInterface $scope        	
	 * @return ImplicitRequest
	 */
	public function setScope(ScopeInterface $scope) {
		$this->scope = $scope;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @return ImplicitRequest
	 */
	public function setState($state) {
		$this->state = $state;
		return $this;
	}

}
