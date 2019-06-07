<?php

namespace Modules\AdminMember\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminMemberLog extends Model
{
    protected $table = 'admin_memberlog';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
