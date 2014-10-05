<?php
namespace OMedia\OAuth2Framework\Endpoint;

/**
 * RFC6749 Redirection endpoint implementation
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-3.1.2
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
