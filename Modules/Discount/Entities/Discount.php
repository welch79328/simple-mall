<?php

namespace Modules\Discount\Entities;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    protected $primaryKey = 'discount_id';
//    public $timestamps = false;
    protected $guarded = [];
}
