@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new item:</div>
                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name:</label>
                                <input type="text" name="item_name" class="form-control" required>
                                @error('item_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Price, €:</label>
                                <input type="currency" name="price" class="form-control" required>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description: </label><br>
                                <textarea style="width: 100%" name="description" cols="30" rows="10"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
