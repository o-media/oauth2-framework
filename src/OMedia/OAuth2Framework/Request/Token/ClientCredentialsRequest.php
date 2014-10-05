<?php
namespace OMedia\OAuth2Framework\Request\Token;

use OMedia\OAuth2Framework\Endpoint\TokenEndpointInterface;
use OMedia\OAuth2Framework\Scope\ScopeInterface;
use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * The client can request an access token using only its client
 * credentials
 *
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.4
 * @see http://tools.ietf.org/html/rfc6749#section-4.4.2
 * @author Alexander Sergeychik
 */
class ClientCredentialsRequest extends AbstractTokenRequest {

	/**
	 * Scope instance 
	 * 
	 * @var ScopeInterface
	 */
	private $scope;
	
	/**
	 * Constructs ClientCredentials request
	 * 
	 * @param TokenEndpointInterface $tokenEndpoint
	 * @param ScopeInterface $scope
	 */
	public function __construct(TokenEndpointInterface $tokenEndpoint, ScopeInterface $scope = null) {
		$this->setTokenEndpoint($tokenEndpoint);
		$this->setGrantType(self::GRANT_TYPE_CLIENT_CREDENTIALS);
		
		if ($scope !== null) {
			$this->setScope($scope);
		}
	}
	
	/**
	 * Returns access request scope
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.4.2
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 * @return ScopeInterface
	 */
	public function getScope() {
		return $this->scope;
	}
	
	/**
	 * Sets the scope of the access request
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.4.2
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 * @param ScopeInterface $scope
	 * @return ClientCredentialsRequest
	 */
	public function setScope(ScopeInterface $scope) {
		$this->scope = $scope;
		return $this;
	}
	
	
	
	/**
	 * {@inheritDoc}
	 */
	public function apply(HttpRequestInterface $request) {
		$request = parent::apply($request);

		// @todo implement request apply
		
		return $request;
	}
	
	
}
