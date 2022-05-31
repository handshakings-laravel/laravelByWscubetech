{{-- Inherit from layouts.main and push main-section. layout.main will receive it in yield directive --}}

@extends('layouts.main')
@push('title')
    <title>About page title</title>  
@endpush


@section('main-section')
    <h1>About Page<h1>
@endsection