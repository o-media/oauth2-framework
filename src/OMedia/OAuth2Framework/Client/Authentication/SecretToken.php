<?php
namespace OMedia\OAuth2Framework\Client\Authentication;

use OMedia\OAuth2Framework\IO\HttpRequestInterface;
use OMedia\OAuth2Framework\Request\RequestInterface;

/**
 * Secret token authentication
 * 
 * @author Alexander Sergeychik
 */
class SecretToken implements AuthenticationInterface {
	
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