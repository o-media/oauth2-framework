<?php
namespace OMedia\OAuth2Framework\IO;

/**
 * HTTP Response abstraction interface.
 * 
 * In case of platform-specific request implementations, this framework
 * requests uses delegating request submissions to underlying request objects 
 * through methods provided in this interface.
 * 
 * @author Alexander Sergeychik
 */
interface HttpRequestInterface {
	
	public function getUri();
	
	public function setUri($uri);
	
	public function getHeader($name);
	
	public function setHeader($name, $value);
	
	public function getQueryParameter($name, $default = null);
	
	public function setQueryParameter($name, $value);

	public function getPostParameter($name, $default = null);
	
	public function setPostParameter($name, $value);
	
	public function getMethod();
	
	public function setMethod($method);
	
	public function setBasicHttpAuth($username, $password);
	
	/**
	 * Returns Http Basic auth username and password
	 * 
	 * @return array|null - array with 2 elements [username, password]
	 */
	public function getBasicHttpAuth();
	
}