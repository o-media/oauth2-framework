<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Grant;

class TokenGrant implements GrantInterface {

	public function getType() {
		return self::GRANT_TYPE_TOKEN;
	}
	
}
