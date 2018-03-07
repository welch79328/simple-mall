<?php

namespace Modules\AdminMember\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminMember extends Model
{
    protected $table = 'admin_member';
    protected $primaryKey = 'member_id';
//    public $timestamps = false;
    protected $guarded = [];
}
