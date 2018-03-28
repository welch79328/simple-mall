<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends CommonController {
    
    public function info() {
        
    }

    public function signIn() {
        parent::__construct();
        return view("frontend.member.signin");
    }

    public function signUp() {
        parent::__construct();
        return view("frontend.member.signup");
    }

}
