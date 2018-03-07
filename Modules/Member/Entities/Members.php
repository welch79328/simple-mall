<?php

namespace Modules\Member\Entities;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'member_id';
//    public $timestamps = false;
    protected $guarded = [];
}
