<?php

class HomeController extends Controller
{
    function _index() {
        $this->renderView('home');
    }

    function _test() {
        echo "Test!";
    }
}
