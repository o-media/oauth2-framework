<?php
namespace OMedia\OAuth2Framework\Grant;

use OMedia\OAuth2Framework\Token\AccessTokenInterface;
use OMedia\OAuth2Framework\Scope\ScopeInterface;

/**
 * Refresh token grant
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-6
 * @author Alexander Sergeychik
 */
class RefreshTokenGrant implements GrantInterface {
	
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
	 * @param AccessTokenInterface $accessToken - previously obtained access token
	 * @param ScopeInterface $scope
	 */
	public function __construct(AccessTokenInterface $accessToken, ScopeInterface $scope = null) {
		$this->setAccessToken($accessToken);
		
		if ($scope !== null) {
			$this->setScope($scope);
		}
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getType() {
		return self::GRANT_TYPE_REFRESH_TOKEN;
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
	 * @return RefreshTokenGrant
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
	 * @return RefreshTokenGrant
	 */
	public function setScope(ScopeInterface $scope) {
		$this->scope = $scope;
		return $this;
	}
	
}
