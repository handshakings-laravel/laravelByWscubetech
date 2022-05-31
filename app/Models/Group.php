<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $primaryKey = 'group_id';
    public function members()
    {
        //1 group can have many members
        return $this->hasMany('App\Models\Member','group_id','group_id');
    }
}
