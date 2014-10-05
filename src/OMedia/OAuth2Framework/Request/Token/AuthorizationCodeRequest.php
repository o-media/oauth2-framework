<?php
namespace OMedia\OAuth2Framework\Request\Token;

use OMedia\OAuth2Framework\Token\CodeTokenInterface;
use OMedia\OAuth2Framework\Client\ClientInterface;
use OMedia\OAuth2Framework\Endpoint\TokenEndpointInterface;
use OMedia\OAuth2Framework\IO\HttpRequestInterface;
/**
 * Access token request
 * 
 * @see http://tools.ietf.org/html/rfc6749#section-4.1.3
 * @author Alexander Sergeychik
 */
class AuthorizationCodeRequest extends AbstractTokenRequest {
	
	/**
	 * Code token
	 * 
	 * @var CodeTokenInterface
	 */
	protected $codeToken;
	
	/**
	 * The client
	 * 
	 * @var ClientInterface
	 */
	protected $client;
	
	/**
	 * Constructs access token request.
	 * 
	 * @param TokenEndpointInterface $tokenEndpoint
	 * @param CodeTokenInterface $codeToken
	 * @param ClientInterface $client
	 */
	public function __construct(TokenEndpointInterface $tokenEndpoint, CodeTokenInterface $codeToken, ClientInterface $client) {
		$this->setTokenEndpoint($tokenEndpoint);
		$this->setGrantType(self::GRANT_TYPE_AUTHORIZATION_CODE);
		
		$this->setCodeToken($codeToken);		
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
	 * {@inheritDoc}
	 */
	public function apply(HttpRequestInterface $request) {
		$request = parent::apply($request);
		
		$codeToken = $this->getCodeToken();
		
		$request->setQueryParameter(self::PARAMETER_CODE, $codeToken->getCode());
		$request->setQueryParameter(self::PARAMETER_REDIRECT_URI, $codeToken->getRedirectUri()->getUri());
		
		return $request;
	}
	
	
}
