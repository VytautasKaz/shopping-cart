@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="show-header">Viewing: <strong>{{ $item->item_name }}</strong>
                    </div>
                    <div class="card-body">
                        <div>
                            <img src="{{ $item->path_to_img }}" alt="">
                        </div>
                        <div>
                            <label><strong>Price, €:</strong></label>
                            <p>{{ $item->price }}</p>
                        </div>
                        <div>
                            <label><strong>Description:</strong></label>
                            <p style="width: 100%">{{ $item->description }}</p>
                        </div>
                        <a class="btn btn-success" href="{{ route('items.index') }}">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
