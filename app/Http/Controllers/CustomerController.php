<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomerController extends Controller
{
    public function index(Request $request)
    {
        //Customer is model
        $search = $request['search'] ?? "";
        if($search != "")
        {
            //where clause is:: Where name is likely to $search
            $customers = Customer::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->paginate(20);
            //"%$search" means any search name/email ends with $search
            //"$search%" means any search name/email start with $search
            //"%$search%" means any search name/email contains $search
        }
        else
        {
            //$customers = Customer::all();
            $customers = Customer::paginate(10);
        }
        
        $data = compact('customers','search');
        return view('index')->with($data);
    }
    public function trash(){
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }
    public function forceDelete($id)
    {
        $customer = Customer::onlyTrashed()->find($id);
        if(!is_null($customer))
        {
            $customer->forceDelete();
        }
        return redirect('/customer/trash');
    }
    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer))
        {
            $customer->restore();
        }
        return redirect('/customer/trash');
    }

    public function create()
    {
        $url = url('/customer');
        $title = "Create Customer";
        $data = compact('url','title');
        return view('customer')->with($data);
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->password = md5($request['password']);
        $customer->save();
        return redirect('/customer');
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer))
        {
            $customer->delete();
        }
        return redirect('/customer');
        //return redirect()->back();
    }


    public function edit($id)
    {
        $customer = Customer::find($id);
        if(is_null($customer))
        {
            echo "Customer Not found";
        }
        else
        {
            $url = url('/customer/update')."/".$id;
            $title = "Update Customer";
            $data = compact('customer','url','title');
            return view('customer')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->save();
        return redirect('/customer');
    }



    public function fileupload(Request $request)
    {
        //To let laravel to save file by larvel own suggested name
        //echo $request->file('myfile')->store('uploads');

        // $fileName = time()."-myfileName.".$request->file('myfile')->getClientOriginalExtension();
        // echo $request->file('myfile')->storeAs('uploads',$fileName);

        //Or save file with same name as it was posted by user as
        $fileName = $request->file('myfile')->getClientOriginalName();
        echo $request->file('myfile')->storeAs('uploads',$fileName);
    }
    
}
