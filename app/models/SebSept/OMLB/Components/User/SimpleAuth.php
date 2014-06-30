<?php
/**
 * Authentification driver
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace SebSept\OMLB\Components\User;

/**
 * Authentification driver
 */
class SimpleAuth implements \Illuminate\Auth\UserProviderInterface {

	public function retrieveById($identifier) {
		return new SimpleUser();
	}
	
	public function retrieveByCredentials(array $credentials) {
		return new SimpleUser();
	}
	
	public function validateCredentials(\Illuminate\Auth\UserInterface $user, array $credentials) {
		return \Hash::check($credentials['password'], $user->getAuthPassword())
		&& $user->getAuthIdentifier() === $credentials['email'];
	}

	public function retrieveByToken($identifier, $token) {
		return new SimpleUser();
	}

	public function updateRememberToken(\Illuminate\Auth\UserInterface $user, $token)
	{
		return;
	}
}
