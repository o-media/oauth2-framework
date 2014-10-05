<?php
namespace OMedia\OAuth2Framework\Endpoint;

/**
 * Abstract enpoint implementation.
 *
 * @author Alexander Sergeychik
 */
abstract class AbstractEndpoint implements EndpointInterface {

	/**
	 * The endpoint URI
	 *
	 * @var string
	 */
	protected $uri;

	/**
	 * Constructs endpoint
	 *
	 * @param string $uri
	 *        	- endpoint URI
	 */
	public function __construct($uri) {
		$this->uri = $uri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUri() {
		return $this->uri;
	}

}
