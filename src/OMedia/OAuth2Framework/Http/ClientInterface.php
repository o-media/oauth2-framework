<?php
namespace OMedia\OAuth2Framework\Http;

/**
 * HTTP Client abstraction interface
 * 
 * @author Alexander Sergeychik
 */
interface ClientInterface {
	
	/**
	 * Executes request for response
	 * 
	 * @param HttpRequestInterface $request
	 * @return HttpResponseInterface
	 */
	public function execute(HttpRequestInterface $request);
	
}
