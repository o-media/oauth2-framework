<?php
namespace OMedia\OAuth2Framework\Grant;

use OMedia\OAuth2Framework\Scope\ScopeInterface;
/**
 * RFC6749 Client credentials grant.
 *
 * The client can request an access token using only its client
 * credentials (or other supported means of authentication) when the
 * client is requesting access to the protected resources under its
 * control, or those of another resource owner that have been previously
 * arranged with the authorization server (the method of which is beyond
 * the scope of this specification).
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.4
 * @author Alexander Sergeychik
 */
class ClientCredentialsGrant implements GrantInterface {

	/**
	 * Scope instance
	 *
	 * @var ScopeInterface
	 */
	private $scope;

	/**
	 * Constructs ClientCredentials request
	 *
	 * @param ScopeInterface $scope        	
	 */
	public function __construct(ScopeInterface $scope = null) {
		if ($scope !== null) {
			$this->setScope($scope);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getType() {
		return self::GRANT_TYPE_CLIENT_CREDENTIALS;
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

}
