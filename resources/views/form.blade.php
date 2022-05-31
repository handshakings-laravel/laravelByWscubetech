<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="bootstrap.min.css" />
  
</head>


<body>
<p class="text text-dangour">Hello Bootstrap</p>
<h1>{{$country}}</h1>
<form action="{{url('/my')}}" method="post" class="row g-3 needs-validation" novalidate>
  @csrf
  @php
    $demo = 1;
  @endphp
    
  <div class="col-12">
      <x-input type="text" name="name" label="Please Enter Your Name" :demo="$demo" />
      <x-input type="email" name="email" label="Please Enter Your Email" />
      <x-input type="password" name="password" label="Please Enter Your Password" />

      <!-- <input type="text" name="name" id="" value="{{old('name')}}"/>
      <span>
          @error('name')
           {{$message}}
          @enderror
    </span>
      <input type="password" name="password" id="" />
      <span>
          @error('password')
           {{$message}}
          @enderror
    </span> -->
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>


</body>
</html>