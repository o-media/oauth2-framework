<?php
namespace OMedia\OAuth2Framework\IO;

/**
 * HTTP Server abstraction layer
 * 
 * @author Alexander Sergeychik
 */
interface HttpServerInterface {
	
	/**
	 * Serves response to end-client
	 * 
	 * @param HttpResponseInterface $response
	 */
	public function send(HttpResponseInterface $response);
	
}
