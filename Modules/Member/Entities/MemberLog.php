<?php

namespace Modules\Member\Entities;

use Illuminate\Database\Eloquent\Model;

class MemberLog extends Model
{
    protected $table = 'memberlog';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
