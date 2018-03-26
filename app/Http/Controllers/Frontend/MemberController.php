<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends CommonController {

    function __construct() {
        parent::__construct();
    }

    public function info() {
        
    }

    public function signIn() {
        return view("frontend.member.signin");
    }

    public function signUp() {
        
        return view("frontend.member.signup");
    }

}
