<?php

class AuthService {
    public static function isLoggedIn() {
        if(isset($_SESSION["auth"]) && 
			isset($_SESSION["auth"]["isLoggedIn"]) && 
			$_SESSION["auth"]["isLoggedIn"] == true) {
			return true;
		}
		return false;
    }
    public static function login($usr, $psw) {
	 	$user = DB::queryFirstRow("SELECT * FROM tbl_users WHERE username = %s", $usr);
	 	if($user == null || $user["passwort"] != md5($psw)) {
	 	    self::logout();
	 	    return false;
        }
        $_SESSION["auth"]["isLoggedIn"] = true;
	 	$_SESSION["auth"]["user"] = $user;
        return true;
    }
    public static function logout() {
		$_SESSION["auth"] = [
			"isLoggedIn" => false,
			"user" => []
		];
    }
    public static function getCurrentUser() {
		if(!self::isLoggedIn()) return null;
		return $_SESSION["auth"]["user"];
    }
}

