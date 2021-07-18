@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header text-center">Viewing: <br><strong>{{ $item->item_name }}</strong>
                    </div>
                    <div class="card-body">
                        @if ($item->path_to_img)
                            <div>
                                <img style="max-width: 600px; height: auto;" src="{{ $item->path_to_img }}" alt="">
                            </div>
                        @endif
                        <div style="margin-top: 20px;">
                            <label><strong>Price, €</strong></label>
                            <p>{{ $item->price }}</p>
                        </div>
                        <div>
                            <label><strong>Description</strong></label>
                            <p style="width: 100%">{{ $item->description }}</p>
                        </div>
                        <a class="btn btn-success" href="{{ route('items.index') }}">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
