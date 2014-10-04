<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Request;

/**
 * In case of platform-specific request implementations, this framework
 * requests uses delegating request submissions to underlying request objects 
 * through methods provided in this interface.
 * 
 * @author Alexander Sergeychik
 */
interface RequestInterface {
	
	
	public function getQueryParameter();
	
	public function setQueryParameter();
	
	public function getPostParameter();
	
	public function setPostParameter();
		
	public function getRequest();
	
}
