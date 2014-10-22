<?php
namespace OMedia\OAuth2Framework\Scope;

/**
 * RFC6749 OAuth2 scope interface
 * 
 * @author Alexander Sergeychik
 */
interface ScopeInterface {
	
	/**
	 * Returns scope in RFC-compilant format
	 * 
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 * @return string
	 */
	public function getScope();
	
	/**
	 * Returns scope description
	 * 
	 * @return string
	 */	
	public function getDescription();
	
}
