<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends CommonController {
    
    public function index() {
        parent::__construct();
        return view("frontend.question");
    }

}
