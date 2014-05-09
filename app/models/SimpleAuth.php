<?php

class SimpleAuth implements Illuminate\Auth\UserProviderInterface {

	public function retrieveById($identifier) {
		return new SimpleUser;
	}
	
	public function retrieveByCredentials(array $credentials) {
		return new SimpleUser;
	}
	
	public function validateCredentials(Illuminate\Auth\UserInterface $user, array $credentials) {
		// return true;
		// Log::info( var_export($credentials, true));
		// Log::info( $user->getAuthPassword() );
		// Log::info( Hash::make($credentials['password']) );

		return Hash::check($credentials['password'], $user->getAuthPassword())
		&& $user->getAuthIdentifier() === $credentials['email'];
	}

	public function retrieveByToken($identifier, $token) {
		return new SimpleUser;
	}

	public function updateRememberToken(Illuminate\Auth\UserInterface $user, $token)
	{
		return;
	}
}