<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Collection;
use App\Models\Product;

class CollectionController extends Controller
{
    public function index()
    {
        $shopId = auth()->user()->id;
        $collections = Collection::where('shop_id', $shopId)->get();

        return view('collections.index', compact('collections'));
    }

    public function create()
    {
        return view('collections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $shopId = auth()->user()->id;

        $collection = new Collection;
        $collection->name = $request->name;
        $collection->description = $request->description;
        $collection->shop_id = $shopId;

        $collection->save();

        return Redirect::tokenRedirect('collections.list');
    }

    public function edit(Collection $collection)
    {
        return view('collections.edit', compact('collection'));
    }

    public function update(Collection $collection, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $collection->name = $request->name;
        $collection->description = $request->description;

        $collection->save();

        return Redirect::tokenRedirect('collections.list');
    }


    public function productIndex(Collection $collection)
    {
        return view('products.index', compact('collection'));
    }

    public function productCreate(Collection $collection)
    {
        return view('products.create', compact('collection'));
    }

    public function productStore(Collection $collection, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->collection_id = $collection->id;

        $product->save();

        return Redirect::tokenRedirect('collections.products.list', ['collection' => $collection->id]);
    }

    public function productEdit(Collection $collection, Product $product)
    {
        return view('products.edit', compact('collection', 'product'));
    }

    public function productUpdate(Collection $collection, Product $product, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return Redirect::tokenRedirect('collections.products.list', ['collection' => $collection->id]);
    }
}
