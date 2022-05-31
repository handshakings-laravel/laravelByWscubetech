<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Customer Trash</h1>
    <h1>
        @if (session()->has('name'))
            {{ session()->get('name') }}
        @else
            Guest
        @endif
    </h1>
    <table border=1 cellpadding=5>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <td>DoB</td>
                <th>Address</th>
                <th>Gender</th>
                <td>State</td>
                <th>Country</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->dob}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                        @if ($customer->gender == "Male")
                            M
                        @elseif($customer->gender == "Femal")
                            F
                        @else
                            O
                        @endif
                    </td>
                    <td>{{$customer->state}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->created_at}}</td>
                    <td>
                        <a href="{{url('/customer/forcedelete')}}/{{$customer->customer_id}}"><button style="background-color:red">Permanent Delete</button></a>
                        <a href="{{url('/customer/restore')}}/{{$customer->customer_id}}"><button style="background-color:blue">Restore</button></a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

    
    <a href="{{url('/customer')}}"><button style="background-color:green">Go to Home</button></a>
 



</body>
</html>