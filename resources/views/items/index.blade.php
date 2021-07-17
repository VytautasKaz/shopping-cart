@extends('layouts.app')
@section('content')
    <div class="card-body container">
        <div>
            <a href="{{ route('items.create') }}" class="btn btn-success" style="margin-bottom: 20px;">Add a new Item</a>
        </div>
        <table class="table">
            <tr>
                <th>Item</th>
                <th>Price, €</th>
                <th class="descr-col">Description</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">
                    @if (auth()->check())
                        Actions
                    @else
                        View
                    @endif
                </th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>
                        @if ($item->path_to_img)
                            <img class="index-item-img" src="{{ $item->path_to_img }}" alt="">
                        @endif
                        <strong>{{ $item->item_name }}</strong>
                    </td>
                    <td>{{ $item->price }}</td>
                    <td class="descr-col">{{ $item->description }}</td>
                    <td class="text-center">
                        <form action="{{ route('add_to_cart', $item->id) }}">
                            <input class="amount-input-index" name="quantity" type="number" min="1" value="1">
                            <button type="submit" class="btn btn-success">Add to Cart</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('items.show', $item->id) }}">
                                <i class="fa fa-eye action-icons"></i>
                            </a>
                            @if (auth()->check())
                                <a href="{{ route('items.edit', $item->id) }}">
                                    <i class="fas fa-edit action-icons"></i>
                                </a>
                                @csrf @method('delete')
                                <button class="delete-btn-index" type="submit" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash action-icons"></i>
                                </button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="page-links">
            {{ $items->links() }}
        </div>
    @endsection
