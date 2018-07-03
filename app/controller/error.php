<?php

class ErrorController extends Controller
{
    function _404() {
        echo "could not find controller and action combo!";
    }
}
