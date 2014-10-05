<?php
namespace OMedia\OAuth2Framework\Role\Credentials;

use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Implements basic client authentication credentials
 * 
 * @author Alexander Sergeychik
 */
class HttpBasic implements CredentialsInterface {

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
	 * Creates HTTP Basic authentication
	 * 
	 * @param string $username
	 * @param string $password
	 */
	public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function sign(HttpRequestInterface $request) {
		$request->setBasicHttpAuth($this->username, $this->password);
		return $request;
	}
	
}