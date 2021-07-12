@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Viewing: {{ $item->item_name }}</div>
                    <div class="card-body">
                        <div>
                            <label>Item:</label>
                            <p>{{ $item->item_name }}</p>
                        </div>
                        <div>
                            <label>Price, €:</label>
                            <p>{{ $item->price }}</p>
                        </div>
                        <div>
                            <label>Description:</label>
                            <p style="width: 100%">{{ $item->description }}</p>
                        </div>
                        <a class="btn btn-success" href="{{ route('items.index') }}">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
