<?php
namespace OMedia\OAuth2Framework\Request\Token;

use OMedia\OAuth2Framework\Request\RequestInterface;
use OMedia\OAuth2Framework\Endpoint\TokenEndpointInterface;
use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Token request interface.
 *
 * The token endpoint requests is used by the client to obtain an access token by
 * presenting its authorization grant or refresh token. The token
 * endpoint is used with every authorization grant except for the
 * implicit grant type.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-3.2
 * @author Alexander Sergeychik
 */
abstract class AbstractTokenRequest implements RequestInterface {

	/**
	 * Token endpoint
	 *
	 * @var TokenEndpointInterface
	 */
	protected $tokenEndpoint;

	/**
	 * Grant type
	 *
	 * @var string
	 */
	protected $grantType;

	/**
	 * Returns token endpoint
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-3.2
	 * @return TokenEndpointInterface
	 */
	public function getTokenEndpoint() {
		return $this->tokenEndpoint;
	}

	/**
	 * Sets token endpoint
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-3.2
	 * @param TokenEndpointInterface $tokenEndpoint        	
	 * @return AbstractTokenRequest
	 */
	public function setTokenEndpoint(TokenEndpointInterface $tokenEndpoint) {
		$this->tokenEndpoint = $tokenEndpoint;
		return $this;
	}

	/**
	 * Returns grant type
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-3.2
	 * @return string
	 */
	public function getGrantType() {
		return $this->grantType;
	}

	/**
	 * Sets grant type
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-3.2
	 * @param string $grantType        	
	 * @return AbstractTokenRequest
	 */
	public function setGrantType($grantType) {
		$this->grantType = $grantType;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function apply(HttpRequestInterface $request) {
		
		$request->setUri($this->getTokenEndpoint()->getUri());
		$request->setMethod('POST');
		
		$request->setPostParameter(self::PARAMETER_GRANT_TYPE, $this->getGrantType());
		
		return $request;
	}


}
