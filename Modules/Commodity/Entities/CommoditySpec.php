<?php

namespace Modules\Commodity\Entities;

use Illuminate\Database\Eloquent\Model;

class CommoditySpec extends Model
{
    protected $table = 'commodity_spec';
    protected $primaryKey = 'id';
//    public $timestamps = false;
    protected $guarded = [];
}
