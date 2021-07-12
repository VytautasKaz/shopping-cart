@extends('layouts.app')
@section('content')
    <div class="card-body container">
        <table class="table">
            <tr>
                <th>Item</th>
                <th>Price, Eur</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            <a class="btn btn-success" href="{{ route('items.show', $item->id) }}">View</a>
                            <a class="btn btn-success" href="{{ route('items.edit', $item->id) }}">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('items.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
