<?php

namespace Modules\Returns\Entities;

use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    protected $table = 'return';
    protected $primaryKey = 'return_id';
//    public $timestamps = false;
    protected $guarded = [];
}
