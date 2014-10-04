<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Request;

/**
 * Interface for state-aware requests.
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-10.12
 * @author Alexander Sergeychik
 */
interface StateAwareRequestInterface {
	
	const PARAMETER_STATE = 'state';
	
	/**
	 * Sets an opaque value used by the client to maintain
	 * state between the request and callback
	 *
	 * @param string $state
	 */
	public function setState($state);
	
}
