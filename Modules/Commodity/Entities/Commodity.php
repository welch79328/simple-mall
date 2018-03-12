<?php

namespace Modules\Commodity\Entities;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = 'commodity';
    protected $primaryKey = 'commodity_id';
//    public $timestamps = false;
    protected $guarded = [];
}
