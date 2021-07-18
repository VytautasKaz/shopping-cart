@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Welcome to our shop!</h1>
                <a href="{{ route('items.index') }}">
                    <button class="btn btn-outline-success">Browse Items <i class="fa fa-angle-double-right"></i></button>
                </a>
            </div>
        </div>
    </div>
@endsection
