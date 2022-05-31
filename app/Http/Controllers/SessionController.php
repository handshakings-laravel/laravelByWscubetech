<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getAll()
    {
        $sessions = session()->all();
        p($sessions);
    }
    public function put()
    {
        session()->put('byBlobalSessionVariable','This session vairable is created by global array session');
        //$request->session().put('byRequest','This session variable is created by request object');
        session(['name'=>'John Smith']);
        session()->flash('status','success');
        return redirect('sessions');
    }

    public function delete()
    {
        session()->forget(['name','byBlobalSessionVariable']);
        return redirect('sessions');
    }

}
