<?php

namespace JumpKick\Mvc\Auth;

class FacebookAuthenticationProvider implements AuthenticationProvider {
	function isLoggedIn() {
		return $_SESSION['loggedin'];
	}
	
	function requireLogin() {
		if(!$this->isLoggedIn()) {
			header("Location:/login");
		}
	}
	
	function getFriends() {
		
	}
	
	function getFbRelId() {
		
	}
	
	function getName() {
		
	}
	
}
