
<!DOCTYPE html>
<html lang="en">
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
  <h1>{{$title}}</h1>
    <form action="{{$url}}" method="post"  class="row g-3 needs-validation" novalidate>
        @csrf
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Customer Name</label>
        <input type="text" class="form-control" name="name" id="validationCustom01" value="{{$customer->name ?? ''}}" required>
      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="validationCustom02" value="{{$customer->email ?? ''}}" required>
      </div>
      <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Gender</label>
        <div class="input-group">
          <select name="gender" id="" selected="{{$customer->gender ?? ''}}">
              <option value="1">Male</option>
              <option value="2">Female</option>
              <option value="3">Others</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationCustom03" class="form-label">DoB</label>
        <input type="date" name="dob" id="" value="{{$customer->dob ?? ''}}" />
      </div>

      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" name="email" id="validationCustom02" value="{{$customer->address ?? ''}}" required>
      </div>

      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">State</label>
        <select class="form-select" name="state" selected="{{$customer->state ?? ''}}">
          <option value="1">Punjab</option>
          <option value="2">Sindh</option>
          <option value="3">KPK</option>
          <option value="4">Baluchistan</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Country</label>
        <input type="text" class="form-control" name="country" id="validationCustom02" value="{{$customer->country ?? ''}}" required>
      </div>
      <div class="col-md-3">
        <label for="validationCustom05" class="form-label">Password</label>
        <input type="text" class="form-control" name="password" id="validationCustom05" required>
      </div>
      
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>
</body>
</html>