<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Scope;

interface ScopeInterface {
	
	/**
	 * Returns scope in RFC-compilant format
	 * 
	 * @see http://tools.ietf.org/html/rfc6749#section-3.3
	 * @return string
	 */
	public function getScope();
	
}
