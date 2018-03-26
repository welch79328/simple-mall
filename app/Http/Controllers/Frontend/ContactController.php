<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends CommonController {
    
    function __construct() {
        parent::__construct();
    }

    public function index() {
        return view("frontend.contact");
    }

}
