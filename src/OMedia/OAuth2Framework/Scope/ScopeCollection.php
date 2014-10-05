<?php
namespace OMedia\OAuth2Framework\Scope;

/**
 * Scopes collection implementation
 * 
 * @author Alexander Sergeychik
 */
class ScopeCollection implements ScopeInterface {
	
	/**
	 * Scopes collection
	 * 
	 * @var string
	 */
	protected $scopes = array();
	
	/**
	 * Constructs scope collection
	 * 
	 * @param string|array $scopes
	 */
	public function __construct($scopes) {
		$this->scopes = (array)$scopes;	
	}
	
	/**
	 * Returns scope in RFC-compilant format
	 * 
	 * @return string
	 */
	public function getScope() {
		return implode(' ', $this->scopes);
	}	
	
}
