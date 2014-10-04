<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Authentication;

/**
 * Access/refresh token interface
 *
 * @author Alexander Sergeychik
 */
interface TokenInterface {

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
