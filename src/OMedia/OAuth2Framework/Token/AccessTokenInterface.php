<?php
namespace OMedia\OAuth2Framework\Token;

/**
 * Access/refresh token interface
 *
 * @author Alexander Sergeychik
 */
interface AccessTokenInterface {

	/**
	 * Returns access token
	 *
	 * @return string
	 */
	public function getAccessToken();

	/**
	 * Returns refresh token if available
	 *
	 * @return string | null
	 */
	public function getRefreshToken();

	/**
	 * Returns token expiration timestamp
	 *
	 * @return \DateTime
	 */
	public function getExpiresAt();

	/**
	 * Returns token type
	 *
	 * @return string
	 */
	public function getTokenType();

}
