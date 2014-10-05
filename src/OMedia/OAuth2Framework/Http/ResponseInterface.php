<?php
namespace OMedia\OAuth2Framework\Http;

interface ResponseInterface {
	
	public function getHeader();
	
	public function setHeader();
	
	public function getParameter();
	
	public function setParameter();
	
	
}
