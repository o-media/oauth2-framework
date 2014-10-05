<?php
namespace OMedia\OAuth2Framework\IO;

interface HttpResponseInterface {
	
	public function getHeader();
	
	public function setHeader();
	
	public function getParameter();
	
	public function setParameter();
	
	
}
