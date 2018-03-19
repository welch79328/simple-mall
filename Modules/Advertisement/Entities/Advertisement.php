<?php

namespace Modules\Advertisement\Entities;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisement';
    protected $primaryKey = 'advertisement_id';
//    public $timestamps = false;
    protected $guarded = [];
}
