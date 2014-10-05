<?php
namespace OMedia\OAuth2Framework\Request\Authorization;

use OMedia\OAuth2Framework\Request\RequestInterface;
use OMedia\OAuth2Framework\Endpoint\AuthorizationEndpointInterface;
use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Authorization request interface.
 *
 * The authorization endpoint is used by the authorization code grant
 * type and implicit grant type flows. The client informs the
 * authorization server of the desired grant type using the
 * response_type parameter managed by getResponseType() and 
 * setResponseType() methods
 *
 * @see http://tools.ietf.org/html/rfc6749#section-3.1.1
 * @author Alexander Sergeychik
 */
abstract class AbstractAuthorizationRequest implements RequestInterface {
	
	/**
	 * Authorization endpoint
	 * 
	 * @var AuthorizationEndpointInterface
	 */
	private $authorizationEndpoint;
	
	/**
	 * Response type
	 * 
	 * @var string
	 */
	private $responseType;
	
	/**
	 * Returns authorization endpoint
	 * 
	 * @return AuthorizationEndpointInterface
	 */
	public function getAuthorizationEndpoint() {
		return $this->authorizationEndpoint;
	}
	
	/**
	 * Sets authorization endpoint
	 * 
	 * @param AuthorizationEndpointInterface $endpoint
	 * @return AbstractAuthorizationRequest
	 */
	public function setAuthorizationEndpoint(AuthorizationEndpointInterface $endpoint) {
		$this->authorizationEndpoint = $endpoint;
		return $this;
	}

	/**
	 * Returns response type associated with request.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.1
	 * @return string
	 */
	public function getResponseType() {
		return $this->responseType;
	}

	/**
	 * Sets response type to request.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-3.1.1
	 * @param string $responseType
	 * @return AbstractAuthorizationRequest
	 */
	public function setResponseType($responseType) {
		$this->responseType = $responseType;
		return $this;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function apply(HttpRequestInterface $request) {
		
		$request->setUri($this->getAuthorizationEndpoint()->getUri());
		$request->setMethod('GET');
		
		$request->setQueryParameter(self::PARAMETER_RESPONSE_TYPE, $this->getResponseType());
		return $request;
	}
	
}
