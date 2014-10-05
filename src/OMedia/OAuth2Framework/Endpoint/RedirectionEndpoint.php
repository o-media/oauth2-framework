<?php
namespace OMedia\OAuth2Framework\Endpoint;

/**
 * RFC6749 Redirection endpoint implementation
 * 
 * @author Alexander Sergeychik
 */
class RedirectionEndpoint extends AbstractEndpoint implements RedirectionEndpointInterface {
	
	public function getUri(array $params = array(), $hashtag = null) {
		
		if (!$params && !$hashtag) {
			return parent::getUri();
		}
		
		$uri = parent::getUri();		
		
		// @todo modify uri
		
		return $uri;
	}
	
}
