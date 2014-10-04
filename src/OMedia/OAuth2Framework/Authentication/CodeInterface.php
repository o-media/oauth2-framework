<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Authentication;

/**
 * Exchange code interface
 * 
 * @author Alexander Sergeychik
 */
interface CodeInterface {

	/**
	 * Returns exchange code
	 * 
	 * @return string
	 */
	public function getCode();
	
	/**
	 * Returns redirect uri assigned to code
	 * 
	 * @return string
	 */
	public function getRedirectUri();
	
}
