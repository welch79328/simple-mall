<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class PageCount extends Model
{
    protected $table = 'page_count';
    protected $primaryKey = 'id';
//    public $timestamps = false;
    protected $guarded = [];
}
