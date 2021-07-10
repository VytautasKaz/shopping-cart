@extends('layouts.app')
@section('content')
    <div class="card-body container">
        <table class="table">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <form action="" method="POST">
                            <a class="btn btn-success" href="#">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="#" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
