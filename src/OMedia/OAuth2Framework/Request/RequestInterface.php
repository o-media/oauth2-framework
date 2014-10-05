<?php
namespace OMedia\OAuth2Framework\Request;

/**
 * Framework request interface.
 * 
 * In case of platform-specific request implementations, this framework
 * requests uses delegating request parameters to underlying request objects
 * through apply() method provided in this interface.
 *
 * This interface also includes all RFC-defined parameters used in OAuth2 spec.
 * 
 * @see http://tools.ietf.org/html/rfc6749
 * @author Alexander Sergeychik
 */
interface RequestInterface {
	
	const RESPONSE_TYPE_CODE = 'code';
	const RESPONSE_TYPE_TOKEN = 'token';
	
	/**
	 * Returns response type for request
	 * 
	 * @return string
	 */
	public function getResponseType();
	
	

}
