<?php
namespace OMedia\OAuth2Framework\Scope;

/**
 * Scopes collection implementation
 * 
 * @author Alexander Sergeychik
 */
class ScopeCollection implements ScopeInterface, \IteratorAggregate {
	
	/**
	 * Scopes collection
	 * 
	 * @var array
	 */
	protected $scopes = array();
	
	/**
	 * Constructs scope collection
	 * 
	 * @param string|array $scopes
	 */
	public function __construct($scopes) {
		foreach ((array)$scopes as $scope) {
			$this->add($scope);
		}		
	}		
	
	/**
	 * Returns scope in RFC-compilant format
	 * 
	 * @return string
	 */
	public function getScope() {
		$scopeNames = array();
		
		foreach ($this->scopes as $scope) {
			$scopeNames[] = $scope->getScope();
		}
		
		return implode(' ', $scopeNames);
	}	

	/**
	 * {@inheritDoc}
	 */
	public function getDescription() {
		$scopeDescriptions = array();
		foreach ($this->scopes as $scope) {
			$scopeDescriptions[] = $scope->getDescription();
		}
		return implode("\n", $scopeDescriptions);
	}
	
	/**
	 * Adds scope to collection
	 * 
	 * @param string|ScopeInterface $scope
	 * @throws Exception
	 * @return ScopeCollection
	 */
	public function add($scope) {
		
		if (!$this->has($scope)) {
			if (is_scalar($scope)) {
				$scope = new Scope($scope);
			} elseif (!$scope instanceof ScopeInterface) {
				throw new Exception(sprintf('Invalid scope type %s, ScopeInterface or scalar value required', gettype($scope)));
			}
			$this->scopes[] = $scope;
		}
		
		return $this;
	}
	
	/**
	 * Checks weither scope exists in collection
	 * 
	 * @param string|ScopeInterface $scope
	 * @throws Exception
	 * @return boolean
	 */
	public function has($scope) {
		
		if (is_scalar($scope)) {
			$scopeName = $scope;
		} elseif ($scope instanceof ScopeInterface) {
			$scopeName = $scope->getScope();
		} else {
			throw new Exception(sprintf('Invalid scope type %s, ScopeInterface or scalar value required', gettype($scope)));
		}
		
		foreach ($this->scopes as $scope) {
			if ($scope->getScope() == $scopeName) {
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * Removes scope from collection
	 * 
	 * @param string|ScopeInterface $scope
	 * @throws Exception
	 * @return ScopeCollection
	 */
	public function remove($scope) {
		
		if ($this->has($scope)) {

			if (is_scalar($scope)) {
				$scopeName = $scope;
			} elseif ($scope instanceof ScopeInterface) {
				$scopeName = $scope->getScope();
			} else {
				throw new Exception(sprintf('Invalid scope type %s, ScopeInterface or scalar value required', gettype($scope)));
			}
			
			
			foreach ($this->scopes as $key=>$scope) {
				if ($scope->getScope() == $scopeName) {
					unset($this->scopes[$key]);
					break;
				}
			}
			
		}
		
		return $this;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getIterator() {
		return new \ArrayIterator($this->scopes);
	}
	
	
}
