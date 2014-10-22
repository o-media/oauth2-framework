<?php
namespace OMedia\OAuth2Framework\Scope;

/**
 * Default scope implementation
 * 
 * @author Alexander Sergeychik
 */
class Scope implements ScopeInterface {
	
	/**
	 * Scope name
	 * 
	 * @var string
	 */
	protected $scope;
	
	/**
	 * Scope description
	 * 
	 * @var string
	 */
	protected $description;
	
	/**
	 * Constructs scopw
	 * 
	 * @param string $scope
	 * @param string $description
	 * @throws Exception
	 */
	public function __construct($scope, $description = null) {

		if (!$scope) {
			throw new Exception('Scope should not be empty');
		}
		
		$this->scope = (string)$scope;
		$this->description = $description ? (string)$description : null;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getScope() {
		return $this->scope;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Returns literal scope name
	 * 
	 * @return string
	 */
	public function __toString() {
		return $this->getScope();
	}
	
}
