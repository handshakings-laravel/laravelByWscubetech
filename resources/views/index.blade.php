<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <div class="p-3 justify-content-center">
       Localization (Language): @lang('lang.language')
       <a href="{{ url('/') }}" class="btn btn-primary">English</a>
       <a href="{{ url('/ur') }}" class="btn btn-warning">Urdu</a>
       <a href="{{ url('/hi') }}" class="btn btn-info">Hindi</a>
    </div>


    <form action="{{ url('/customer/fileupload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="bg-secondary">
            <input type="file" name="myfile" value="select file" class="form-control"/>
            <input type="submit" class="btn btn-primary" value="Upload" />
        </div>
    </form>
    <h1>        
        @if (session()->has('name'))
            {{ session()->get('name') }}
        @else
            Guest
        @endif
    </h1>

    <div class="container">
        <form action="" method="get">
            <div class="col-6">
                <div class="row">
                    <div class="mb-3 p-3">
                        <input type="search" value="{{ $search }}" name="search" id="" class="form-control" placeholder="Search by Name or Email" >
                        <button type="submit" class="btn btn-warning">Search</button>
                        <a href="{{ url('/customer') }}" class="btn btn-info">Reset</a>
                    </div>
                </div>   
            </div>
        </form>
        <div class="col-8">
            <table class="table table-border table-striped">
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
                                <a class="btn btn-danger" href="{{url('/customer/delete')}}/{{$customer->customer_id}}">Trash</a>
                                <a class="btn btn-primary" href="{{url('/customer/edit')}}/{{$customer->customer_id}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach     
                </tbody>
            </table>
            <div class="row">

            {{ $customers->links() }}
            </div>
        </div>
    </div>
    
    <a href="{{url('/customer/create')}}"><button class="btn btn-primary">Create by Url Route</button></a>
    <a href="{{route('add')}}"><button class="btn btn-secondary">Create by Named Route</button></a>
    <a href="{{url('/customer/trash')}}"><button class="btn btn-info">Go to Trash</button></a>



</body>
</html>