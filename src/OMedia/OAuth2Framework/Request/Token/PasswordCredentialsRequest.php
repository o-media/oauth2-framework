<?php
namespace OMedia\OAuth2Framework\Request\Token;

use OMedia\OAuth2Framework\Endpoint\TokenEndpointInterface;
use OMedia\OAuth2Framework\Scope\ScopeInterface;
use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * The resource owner password credentials grant type request
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.3
 * @see http://tools.ietf.org/html/rfc6749#section-4.3.2
 * @author Alexander Sergeychik
 */
class PasswordCredentialsRequest extends AbstractTokenRequest {

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
	 * @param TokenEndpointInterface $tokenEndpoint        	
	 * @param string $username        	
	 * @param string $password        	
	 * @param ScopeInterface $scope        	
	 */
	public function __construct(TokenEndpointInterface $tokenEndpoint, $username, $password, ScopeInterface $scope = null) {
		$this->setTokenEndpoint($tokenEndpoint);
		$this->setGrantType(self::GRANT_TYPE_PASSWORD);
		
		$this->setUsername($username);
		$this->setPassword($password);
		
		if ($scope !== null) {
			$this->setScope($scope);
		}
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

	/**
	 * {@inheritDoc}
	 */
	public function apply(HttpRequestInterface $request) {
		$request = parent::apply($request);
		
		// @todo request apply
		
		return $request;
	}

	
	
}
