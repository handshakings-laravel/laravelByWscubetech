<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Group;

class IndexController extends Controller
{
    public function getMembers()
    {
       return Member::with('group')->get();
    }


    public function getGroups()
    {
        return Group::with('members')->get();
    }

    public function getGroupByModelBinder(Group $id)
    {
        return $id;
    }
}
