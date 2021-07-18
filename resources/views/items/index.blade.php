@extends('layouts.app')
@section('content')
    <div class="card-body container">
        <form class="form-inline" style="margin-bottom: 20px;" action="{{ route('items.index') }}" method="GET">
            <select style="margin-right: 10px;" name="currency" id="" class="form-control">
                <option value="eur" {{ app('request')->input('currency') == 'eur' ? 'selected="selected"' : '' }}>
                    EUR
                </option>
                <option value="gbp" {{ app('request')->input('currency') == 'gbp' ? 'selected="selected"' : '' }}>
                    GBP
                </option>
                <option value="usd" {{ app('request')->input('currency') == 'usd' ? 'selected="selected"' : '' }}>
                    USD
                </option>
            </select>
            <button class="btn btn-info" type="submit">Set</button>
        </form>
        <form class="form-inline" style="margin-bottom: 20px;" action="{{ route('items.index') }}" method="GET">
            <input class="form-control" name="search" type="text" placeholder="Search by name...">
            <button class="btn btn-info" style="margin-left: 10px;" type="submit">Search</button>
            <a class="btn btn-success" style="margin-left: 5px;" href={{ route('items.index') }}>Show All</a>
        </form>
        @if (auth()->check())
            <div>
                <a href="{{ route('items.create') }}" class="btn btn-success" style="margin-bottom: 20px;">Add a new
                    Item</a>
            </div>
        @endif
        <table class="table table-hover">
            <tr>
                <th>@sortablelink('item_name', 'Item')</th>
                <th>@sortablelink('price', 'Price')</th>
                <th class="descr-col">Description</th>
                <th></th>
                <th class="text-center">
                    @if (auth()->check())
                        Actions
                    @else
                        View
                    @endif
                </th>
            </tr>
            @foreach ($items as $key => $item)
                <tr>
                    <td>
                        @if ($item->path_to_img)
                            <img class="index-item-img" src="{{ $item->path_to_img }}" alt="">
                        @endif
                        <strong>{{ $item->item_name }}</strong>
                    </td>
                    <td>{{ $convertedPrices[$key] }}</td>
                    <td class="descr-col">{!! $item->description !!}</td>
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
            {!! $items->appends(\Request::except('page'))->render() !!}
        </div>
    @endsection
