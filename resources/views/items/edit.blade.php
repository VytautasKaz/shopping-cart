@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit an item:</div>
                    <div class="card-body">
                        <form action="{{ route('items.update', $item->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label>Item:</label>
                                <input type="text" name="item_name" class="form-control" value="{{ $item->item_name }}"
                                    required>
                                @error('item_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Price, €:</label>
                                <input type="text" name="price" class="form-control" value="{{ $item->price }}" required>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea style="width: 100%" name="description" cols="30"
                                    rows="10">{{ $item->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <a class="btn btn-success" style="margin-top: 20px;" href="{{ route('items.index') }}">Back to
                                list</a>
                            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
