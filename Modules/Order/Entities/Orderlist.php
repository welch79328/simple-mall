<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class Orderlist extends Model
{
    protected $table = 'order_list';
    protected $primaryKey = 'id';
//    public $timestamps = false;
    protected $guarded = [];
}
