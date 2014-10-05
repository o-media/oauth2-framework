<?php
namespace OMedia\OAuth2Framework\Role\Credentials;

/**
 * Client credentials interface.
 * Reflects to RFC authentication flow.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-2.3
 * @author Alexander Sergeychik
 */
interface CredentialsInterface {

	/**
	 * Signs request by client credentials
	 *
	 * @param HttpRequestInterface $request        	
	 * @return HttpRequestInterface
	 */
	public function sign(HttpRequestInterface $request);

}
