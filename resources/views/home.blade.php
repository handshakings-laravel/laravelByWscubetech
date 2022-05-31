@extends("layouts.main")
@push('title')
    <title>Home page title</title>
@endpush


@section("main-section")
<h1>Home Page {{$name}} </h1>
@endsection

