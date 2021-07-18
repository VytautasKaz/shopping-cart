@extends('layouts.app')
@section('content')
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th style="width: 20px">Quantity</th>
                    <th class="text-center">Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Item">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs">
                                        <img src="{{ $details['path_to_img'] }}" width="100" height="auto"
                                            class="img-responsive" />
                                    </div>
                                    <div class="col-sm-9">
                                        <a style="text-decoration: none;" href="{{ route('items.show', $id) }}">
                                            <h4 class="nomargin">{{ $details['item_name'] }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ $details['price'] }} €</td>
                            <td data-th="Quantity">
                                <input style="width:80px;" type="number" value="{{ $details['quantity'] }}"
                                    class="form-control quantity update-cart" />
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                {{ $details['price'] * $details['quantity'] }} €
                            </td>
                            <td class="actions" data-th="">
                                <button class="delete-btn-index remove-from-cart">
                                    <i class="fas fa-trash action-icons"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <h3><strong>Total: {{ $total }} €</strong></h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ route('items.index') }}" class="btn btn-outline-primary">
                            <i class="fa fa-angle-double-left"></i> Continue Shopping
                        </a>
                        <button class="btn btn-outline-primary">Submit Order</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {

            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {

            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection
