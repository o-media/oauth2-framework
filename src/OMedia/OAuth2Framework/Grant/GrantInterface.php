<?php
namespace OMedia\OAuth2Framework\Grant;

/**
 * RFC6749 Authorization grant.
 *
 * To request an access token, the client obtains authorization from the
 * resource owner.
 * The authorization is expressed in the form of an
 * authorization grant, which the client uses to request the access
 * token. OAuth defines four grant types: authorization code, implicit,
 * resource owner password credentials, and client credentials. It also
 * provides an extension mechanism for defining additional grant types.
 *
 * @author Alexander Sergeychik
 */
interface GrantInterface {
	
	const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';
	const GRANT_TYPE_CLIENT_CREDENTIALS = 'client_credentials';
	const GRANT_TYPE_PASSWORD = 'password';
	const GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';
	const GRANT_TYPE_TOKEN = 'token';

	/**
	 * Returns grant type
	 *
	 * @return string - one of predefined constants GRANT_TYPE_*
	 */
	public function getType();

}