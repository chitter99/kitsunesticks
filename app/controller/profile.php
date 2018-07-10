<?php

class ProfileController extends Controller
{
    function _index() {
		if(!AuthService::isLoggedIn()) {
			$this->redirect("login");
		} else {
			$this->renderView("profile");
		}
    }
    
    function _ajax_() {

    }
}
