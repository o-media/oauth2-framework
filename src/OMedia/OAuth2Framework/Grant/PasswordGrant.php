<?php
namespace OMedia\OAuth2Framework\Grant;

use OMedia\OAuth2Framework\Scope\ScopeInterface;

/**
 * RFC6749 Resource owner password credentials grant.
 *
 * The resource owner password credentials grant type is suitable in
 * cases where the resource owner has a trust relationship with the
 * client, such as the device operating system or a highly privileged
 * application. The authorization server should take special care when
 * enabling this grant type and only allow it when other flows are not
 * viable.
 *
 * This grant type is suitable for clients capable of obtaining the
 * resource owner's credentials (username and password, typically using
 * an interactive form). It is also used to migrate existing clients
 * using direct authentication schemes such as HTTP Basic or Digest
 * authentication to OAuth by converting the stored credentials to an
 * access token.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.3
 * @see http://tools.ietf.org/html/rfc6749#section-4.3.2
 * @author Alexander Sergeychik
 */
class PasswordGrant implements GrantInterface {

	/**
	 * Username credential
	 *
	 * @var string
	 */
	private $username;

	/**
	 * Password credential
	 *
	 * @var string
	 */
	private $password;

	/**
	 * Access scope
	 *
	 * @var ScopeInterface
	 */
	private $scope;

	/**
	 * Constructs password grant request
	 *
	 * @param string $username        	
	 * @param string $password        	
	 * @param ScopeInterface $scope        	
	 */
	public function __construct($username, $password, ScopeInterface $scope = null) {
		
		$this->setUsername($username);
		$this->setPassword($password);
		
		if ($scope !== null) {
			$this->setScope($scope);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getType() {
		return self::GRANT_TYPE_PASSWORD;
	}

	/**
	 * Returns username
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.3.2
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Sets username
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.3.2
	 * @param string $username        	
	 * @return PasswordCredentialsRequest
	 */
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}

	/**
	 * Returns password
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.3.2
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Sets password
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.3.2
	 * @param string $password        	
	 * @return PasswordCredentialsRequest
	 */
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}

	/**
	 * Returns access request scope
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.3.2
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 * @return ScopeInterface
	 */
	public function getScope() {
		return $this->scope;
	}

	/**
	 * Sets the scope of the access request
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.3.2
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 * @param ScopeInterface $scope        	
	 * @return PasswordCredentialsRequest
	 */
	public function setScope(ScopeInterface $scope) {
		$this->scope = $scope;
		return $this;
	}

}