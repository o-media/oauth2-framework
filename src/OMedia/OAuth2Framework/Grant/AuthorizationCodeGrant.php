<?php
namespace OMedia\OAuth2Framework\Grant;

use OMedia\OAuth2Framework\Token\CodeTokenInterface;
use OMedia\OAuth2Framework\Role\ClientInterface;

/**
 * RFC6749 Authorization code grant.
 * 
 * The authorization code grant type is used to obtain both access
 * tokens and refresh tokens and is optimized for confidential clients.
 * Since this is a redirection-based flow, the client must be capable of
 * interacting with the resource owner's user-agent (typically a web
 * browser) and capable of receiving incoming requests (via redirection)
 * from the authorization server.
 *
 * @see http://tools.ietf.org/html/rfc6749#section-4.1
 * @see http://tools.ietf.org/html/rfc6749#section-4.1.3
 * @author Alexander Sergeychik
 */
class AuthorizationCodeGrant implements GrantInterface {

	/**
	 * Client instance
	 * 
	 * @var ClientInterface
	 */
	private $client;
	
	/**
	 * Code token instance
	 * 
	 * @var CodeTokenInterface
	 */
	private $codeToken;
	
	/**
	 * Creates authorization code grant.
	 * 
	 * @param ClientInterface $client
	 * @param CodeTokenInterface $codeToken
	 */	
	public function __construct(ClientInterface $client, CodeTokenInterface $codeToken) {
		$this->setClient($client);
		$this->setCodeToken($codeToken);
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getType() {
		return self::GRANT_TYPE_AUTHORIZATION_CODE;
	}
	
	/**
	 * Returns client
	 *
	 * @return ClientInterface
	 */
	public function getClient() {
		return $this->client;
	}

	/**
	 * Sets client to request
	 *
	 * @param ClientInterface $client        	
	 * @return AuthorizationCodeRequest
	 */
	public function setClient(ClientInterface $client) {
		$this->client = $client;
		return $this;
	}

	/**
	 * The authorization code received from the authorization server
	 *
	 * @return CodeTokenInterface
	 */
	public function getCodeToken() {
		return $this->codeToken;
	}

	/**
	 * Sets code token received from the authorization server
	 *
	 * @param CodeTokenInterface $codeToken        	
	 * @return AuthorizationCodeRequest
	 */
	public function setCodeToken(CodeTokenInterface $codeToken) {
		$this->codeToken = $codeToken;
		return $this;
	}

}