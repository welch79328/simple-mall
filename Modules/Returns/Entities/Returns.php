<?php

namespace Modules\Returns\Entities;

use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    protected $table = 'returns';
    protected $primaryKey = 'returns_id';
//    public $timestamps = false;
    protected $guarded = [];
}
