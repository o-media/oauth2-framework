<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Response;

/**
 * State aware response interface
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-10.12
 * @author Alexander Sergeychik
 */
interface StateAwareResponseInterface {
	
	const PARAMETER_STATE = 'state';
	
	/**
	 * The exact value received from the client.
	 * OPTIONAL if the "state" parameter was present in the client authorization request
	 *
	 * @return string|null
	 */
	public function getState();
	
}
