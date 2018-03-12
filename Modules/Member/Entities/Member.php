<?php

namespace Modules\Member\Entities;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'member_id';
//    public $timestamps = false;
    protected $guarded = [];
}
