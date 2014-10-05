<?php
namespace OMedia\OAuth2Framework\IO;

/**
 * HTTP Client abstraction interface
 * 
 * @author Alexander Sergeychik
 */
interface HttpClientInterface {
	
	/**
	 * Executes request for response
	 * 
	 * @param HttpRequestInterface $request
	 * @return HttpResponseInterface
	 */
	public function execute(HttpRequestInterface $request);
	
}
