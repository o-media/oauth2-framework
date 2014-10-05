<?php
namespace OMedia\OAuth2Framework\Request;

use OMedia\OAuth2Framework\Role\ClientInterface;
use OMedia\OAuth2Framework\Scope\ScopeInterface;
use OMedia\OAuth2Framework\Endpoint\RedirectionEndpointInterface;

/**
 * RFC6749 Authorization code grant request.
 *
 * The client initiates the flow by directing the resource owner's
 * user-agent to the authorization endpoint. The client includes
 * its client identifier, requested scope, local state, and a
 * redirection URI to which the authorization server will send the
 * user-agent back once access is granted (or denied).
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.1
 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
 * @author Alexander Sergeychik
 */
class AuthorizationCodeRequest implements RequestInterface, StateAwareRequestInterface {

	/**
	 * Client identifier
	 *
	 * @var ClientInterface
	 */
	protected $client;

	/**
	 * Redirection endpoint
	 *
	 * @var RedirectionEndpointInterface
	 */
	protected $redirectEndpoint;

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
	 * Constructs authorization code request
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
		return self::RESPONSE_TYPE_CODE;
	}
	
	/**
	 * Returns client identifier
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 * @return string
	 */
	public function getClient() {
		return $this->client;
	}

	/**
	 * Sets the client identifier
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 * @param ClientInterface $client        	
	 * @return AuthorizationCodeRequest
	 */
	public function setClient(ClientInterface $client) {
		$this->client = $client;
		return $this;
	}

	/**
	 * Returns redirection endpoint
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
	 * @return RedirectionEndpointInterface
	 */
	public function getRedirectionEndpoint() {
		return $this->redirectEndpoint;
	}

	/**
	 * Sets redirection endpoint
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
	 * @param RedirectionEndpointInterface $redirectionEndpoint        	
	 * @return AuthorizationCodeRequest
	 */
	public function setRedirectionEndpoint(RedirectionEndpointInterface $redirectionEndpoint) {
		$this->redirectEndpoint = $redirectionEndpoint;
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
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 *
	 * @param ScopeInterface $scope        	
	 * @return AuthorizationCodeRequest
	 */
	public function setScope(ScopeInterface $scope) {
		$this->scope = $scope;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.1
	 * @return AuthorizationCodeRequest
	 */
	public function setState($state) {
		$this->state = $state;
		return $this;
	}

}
