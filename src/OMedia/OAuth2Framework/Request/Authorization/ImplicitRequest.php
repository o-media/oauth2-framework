<?php
namespace OMedia\OAuth2Framework\Request\Authorization;

use OMedia\OAuth2Framework\Request\StateAwareRequestInterface;
use OMedia\OAuth2Framework\Endpoint\RedirectionEndpointInterface;
use OMedia\OAuth2Framework\IO\HttpRequestInterface;
use OMedia\OAuth2Framework\Scope\ScopeInterface;
use OMedia\OAuth2Framework\Endpoint\AuthorizationEndpointInterface;

/**
 * Implicit grant request.
 *
 * Implements "token" grant_type request
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.2
 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
 * @author Alexander Sergeychik
 */
class ImplicitRequest extends AbstractAuthorizationRequest implements StateAwareRequestInterface {

	/**
	 * Client identifier
	 *
	 * @var string
	 */
	protected $clientId;

	/**
	 * Redirection endpoint
	 *
	 * @var RedirectionEndpoint
	 */
	protected $redirectUri;

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
	 * @param AuthorizationEndpointInterface $autorizationUri
	 * @param string $clientId        	
	 * @param RedirectionEndpointInterface $redirectUri        	
	 * @param ScopeInterface $scope        	
	 * @param string $state        	
	 */
	public function __construct(AuthorizationEndpointInterface $autorizationUri, $clientId, RedirectionEndpointInterface $redirectUri = null, ScopeInterface $scope, $state = null) {
		// requred parameters
		$this->setResponseType(self::RESPONSE_TYPE_CODE);
		$this->setClientId($clientId);
		
		// optional parameters
		if ($redirectUri !== null) $this->setRedirectUri($redirectUri);
		if ($scope !== null) $this->setScope($scope);
		if ($state !== null) $this->setState($state);
	}

	/**
	 * Returns client identifier
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @return string
	 */
	public function getClientId() {
		return $this->clientId;
	}

	/**
	 * Sets the client identifier
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @param string $clientId        	
	 * @return AuthorizationCodeGrantRequest
	 */
	public function setClientId($clientId) {
		$this->clientId = $clientId;
		return $this;
	}

	/**
	 * Returns redirection endpoint
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
	 * @return RedirectionEndpointInterface
	 */
	public function getRedirectUri() {
		return $this->redirectUri;
	}

	/**
	 * Sets redirection endpoint
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.2.1
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
	 * @param RedirectionEndpointInterface $redirectUri        	
	 * @return AuthorizationCodeGrantRequest
	 */
	public function setRedirectUri(RedirectionEndpointInterface $redirectUri) {
		$this->redirectUri = $redirectUri;
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
	 * @return AuthorizationCodeGrantRequest
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
	 * @return AuthorizationCodeGrantRequest
	 */
	public function setState($state) {
		$this->state = $state;
		return $this;
	}

	/**
	 * {@inheritDoc}
	 */
	public function apply(HttpRequestInterface $request) {
		$request = parent::apply($request);
		
		$request->setQueryParameter(self::PARAMETER_CLIENT_ID, $this->getClientId());
		
		if (($redirectUri = $this->getRedirectUri()) !== null) {
			$request->setQueryParameter(self::PARAMETER_REDIRECT_URI, $redirectUri->getUri());
		}
		
		if (($scope = $this->getScope()) !== null) {
			$request->setQueryParameter(self::PARAMETER_SCOPE, $scope->getScope());
		}
		
		if (($state = $this->getState()) !== null) {
			$request->setQueryParameter(self::PARAMETER_STATE, $state);
		}
		
		return $request;
	}

}
