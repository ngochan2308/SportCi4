<?php

namespace App\Helpers;

class AuthHelper
{
    public static function isLoggedIn()
    {
        return session()->get('logged_in') === true;
    }
}
