<?php

class AuthController extends Controller
{
    function _login()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(empty($username) || empty($password)) {
            http_response_code(400);
            die();
        }

		if(!AuthService::login($username, $password)) {
			http_response_code (401);
		} else {
			http_response_code (200);
		}
    }
	
	function _register()
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		$vorname = $_POST["vorname"];
		$nachname = $_POST["nachname"];
		$email = $_POST["email"];

		if(empty($username) || empty($password) || empty($vorname) || empty($nachname) || empty($email)) {
            http_response_code(400);
            die("Missing parameter");
        }

        if(strlen($username) > 40 || strlen($username) < 5) {
		    http_response_code(400);
		    die("Username too long or short");
        }

        if(strlen($password) > 40 || strlen($password) < 8) {
            http_response_code(400);
            die("Password too long or short");
        }

        if(!preg_match("/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])/", $password)) {
            http_response_code(400);
            die("Password too easy");
        }

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            die("Email wrong format");
        }

        if(!DB::queryFirstRow("SELECT * FROM tbl_users WHERE username = %s", $username) == null) {
		    http_response_code(400);
		    die("Username already exists");
        }

        if(!DB::queryFirstRow("SELECT * FROM tbl_users WHERE email = %s", $email) == null) {
            http_response_code(400);
            die("Email already exists");
        }

        DB::insert("tbl_users", [
            "username" => $username,
            "passwort" => md5($password),
            "vorname" => $vorname,
            "nachname" => $nachname,
            "email" => $email
        ]);
		http_response_code(200);
	}
	
	function _logout()
	{
		AuthService::logout();
		header("location: index.php");
	}
}
