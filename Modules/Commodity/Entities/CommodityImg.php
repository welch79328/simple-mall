<?php

namespace Modules\Commodity\Entities;

use Illuminate\Database\Eloquent\Model;

class CommodityImg extends Model
{
    protected $table = 'commodity_img';
    protected $primaryKey = 'id';
//    public $timestamps = false;
    protected $guarded = [];
}
