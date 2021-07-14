@extends('layouts.app')
@section('content')
    <div class="card-body container">
        <div>
            <a href="{{ route('items.create') }}" class="btn btn-success" style="margin-bottom: 20px;">Add a new Item</a>
        </div>
        <table class="table">
            <tr>
                <th>Item</th>
                <th>Price, Eur</th>
                <th class="descr-col">Description</th>
                <th class="center-col">Amount</th>
                <th class="center-col">Actions</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td class="descr-col">{{ $item->description }}</td>
                    <td class="center-col">
                        <form action="">
                            <input class="amount-input-index" type="number" min="1" value="1">
                            <a class="btn btn-success" href="#">Add to Cart</a>
                        </form>
                    </td>
                    <td class="center-col">
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('items.show', $item->id) }}">
                                <i class="fa fa-eye action-icons"></i>
                            </a>
                            <a href="{{ route('items.edit', $item->id) }}">
                                <i class="fas fa-edit action-icons"></i>
                            </a>
                            @csrf @method('delete')
                            <button class="delete-btn-index" type="submit" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash action-icons"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
