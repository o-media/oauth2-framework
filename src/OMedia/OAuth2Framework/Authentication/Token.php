<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Authentication;

/**
 * Implementation of OAtuh2 access token
 * 
 * @author Alexander Sergeychik
 */
class Token implements TokenInterface {
	
	/**
	 * Access token
	 * 
	 * @var string
	 */
	protected $accessToken;

	/**
	 * Refresh token
	 * 
	 * @var string
	 */
	protected $refreshToken;

	/**
	 * Expiration time
	 * 
	 * @var string
	 */
	protected $expiresAt;

	/**
	 * Token type
	 * 
	 * @var string
	 */
	protected $type;

	/**
	 * Constructs token
	 *
	 * @param string $accessToken        	
	 * @param number|\DateTime $expiration
	 *        	- expiration time
	 * @param string $type        	
	 * @param string $refreshToken        	
	 */
	public function __construct($accessToken, $expiration, $type, $refreshToken = null) {
		
		$this->accessToken = $accessToken;
		$this->refreshToken = $refreshToken;
		$this->type = $type;
		
		if (is_numeric($expiration)) {
			$time = new \DateTime();
			$time->add(new \DateInterval(sprintf('P%dS', (int)$expiration)));
			$this->expiresAt = $time;
		} elseif ($expiration instanceof \DateTime) {
			$this->expiresAt = $expiration;
		} else {
			new \InvalidArgumentException(sprintf('Expiration should be either numeric value or \DateTime object, %s given', gettype($expiration)));
		}
	
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getAccessToken() {
		return $this->accessToken;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getRefreshToken() {
		return $this->refreshToken;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getExpiresAt() {
		return $this->expiresAt;
	}

	/**
	 * Returns expiration time in seconds scinse current moment
	 * 
	 * @return integer
	 */
	public function getExpiresIn() {
		return $this->expiresAt->diff(new \DateTime())->format('S');		
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getTokenType() {
		return $this->type;
	}

}
