<?php
namespace OMedia\OAuth2Framework\Client\Authentication;

use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Implements basic client authentication credentials
 * 
 * @author Alexander Sergeychik
 */
class HttpBasic implements AuthenticationInterface {

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