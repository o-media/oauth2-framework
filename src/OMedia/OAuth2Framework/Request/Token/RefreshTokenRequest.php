<?php
namespace OMedia\OAuth2Framework\Request\Token;

use OMedia\OAuth2Framework\Endpoint\TokenEndpointInterface;
use OMedia\OAuth2Framework\Token\AccessTokenInterface;
use OMedia\OAuth2Framework\Scope\ScopeInterface;
use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Refresh token request
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-6
 * @author Alexander Sergeychik
 */
class RefreshTokenRequest extends AccessTokenRequest {
	
	/**
	 * Scope instance
	 *
	 * @var ScopeInterface
	 */
	private $scope;
	
	/**
	 * Previously obtained access token
	 * 
	 * @var AccessTokenInterface
	 */
	private $accessToken;
	
	/**
	 * Constructs request using previously generated access token instance and scopes
	 * 
	 * @param TokenEndpointInterface $tokenEndpoint
	 * @param AccessTokenInterface $accessToken
	 * @param ScopeInterface $scope
	 */
	public function __construct(TokenEndpointInterface $tokenEndpoint, AccessTokenInterface $accessToken, ScopeInterface $scope = null) {
		$this->setTokenEndpoint($tokenEndpoint);
		$this->setGrantType(self::GRANT_TYPE_CLIENT_CREDENTIALS);
	
		$this->setAccessToken($accessToken);
		
		if ($scope !== null) {
			$this->setScope($scope);
		}
	}
	
	/**
	 * Returns access token instance
	 * 
	 * @return AccessTokenInterface
	 */
	public function getAccessToken() {
		return $this->accessToken;
	}
	
	/**
	 * Sets access token instance with refresh token stored in it
	 * 
	 * @param AccessTokenInterface $accessToken
	 * @return RefreshTokenRequest
	 */
	public function setAccessToken(AccessTokenInterface $accessToken) {
		$this->accessToken = $accessToken;
		return $this;
	}
	
	/**
	 * Returns access request scope
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-6
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 * @return ScopeInterface
	 */
	public function getScope() {
		return $this->scope;
	}
	
	/**
	 * Sets the scope of the access request
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-6
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 * @param ScopeInterface $scope
	 * @return RefreshTokenRequest
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
		
		// @todo request apply
		
		return $request;
	}

	
}
