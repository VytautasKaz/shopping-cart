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
                            <a href="{{ route('items.show', $item->id) }}">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('items.edit', $item->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            @csrf @method('delete')
                            <button style="border: none; background: none; color: #ff0011; padding: 0" type="submit"
                                onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
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
