<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends CommonController {
    
    public function index() {
        parent::__construct();
        return view("frontend.contact");
    }

}
