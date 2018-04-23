<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    protected $table = 'return';
    protected $primaryKey = 'return_id';
//    public $timestamps = false;
    protected $guarded = [];
}
