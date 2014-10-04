<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Authentication;

/**
 * Authenticator interface
 * 
 * @author Alexander Sergeychik
 */
interface AuthenticatorInterface {

	/**
	 * Creates authentication url
	 * 
	 * @return string
	 */
	public function createAuthenticationUrl();	
	
	/**
	 * Authenticates and returns access token by code
	 * 
	 * @param CodeInterface $code - exchange code
	 * @return TokenInterface
	 */	
	public function authenticate(CodeInterface $code);
	
	/**
	 * Refreshes token and returns new token instance
	 * 
	 * @param TokenInterface $token - old token
	 * @return TokenInterface
	 */
	public function refreshToken(TokenInterface $token);
	
	/**
	 * Revokes token
	 * 
	 * @param TokenInterface $token
	 */
	public function revokeToken(TokenInterface $token);
	
}
