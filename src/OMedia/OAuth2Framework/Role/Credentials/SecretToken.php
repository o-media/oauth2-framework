<?php
namespace OMedia\OAuth2Framework\Role\Credentials;

use OMedia\OAuth2Framework\IO\HttpRequestInterface;

/**
 * Secret token authentication
 * 
 * @author Alexander Sergeychik
 */
class SecretToken implements CredentialsInterface {
	
	/**
	 * Client secret token
	 * 
	 * @var string
	 */
	private $token;
	
	/**
	 * Constructs client-secret authentication
	 * 
	 * @param string $token
	 */
	public function __construct($token) {
		$this->token = $token;
	}
	
	/**
	 * Returns secret token
	 * 
	 * @return string
	 */
	public function getToken() {
		return $this->token;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function sign(HttpRequestInterface $request) {
		$request->setQueryParameter(RequestInterface::PARAMETER_CLIENT_SECRET, $request);		
	}
	
}