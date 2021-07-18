<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search_query) {
            $search_query = $request->search_query;
            $items = Item::where('item_name', 'LIKE', '%' . $search_query . '%')->sortable()->paginate(5);
        }

        if ($request->sort) {
            $items = Item::sortable()->paginate(5);
        }

        if (!$request->sort && !$request->search_query) {
            $items = Item::orderBy('item_name')->paginate(5);
        }

        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item_name' => 'required|max:60',
            'price' => 'required|numeric|min:0.01',
            'description' => 'max:2000',
        ]);
        $better = new Item();
        $better->fill($request->all());
        $better->save();
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request, [
            'item_name' => 'required|max:60',
            'price' => 'required|numeric|min:0.01',
            'description' => 'max:2000',
        ]);
        $item->fill($request->all());
        $item->save();
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }

    public function cart()
    {
        return view('cart.index');
    }

    public function addToCart(Request $request)
    {
        $item = Item::findOrFail($request->id);
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->quantity;
        } else {
            $cart[$request->id] = [
                'path_to_img' => $item->path_to_img,
                'item_name' => $item->item_name,
                'price' => $item->price,
                'description' => $item->description,
                'quantity' => $request->quantity,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item added to the cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully.');
        }
    }

    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item removed from the cart successfully.');
        }
    }
}
