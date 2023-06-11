<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function index()
    {
        $prices = Price::get();
        return view('admin.price.index', compact('prices'));
    }

    public function create()
    {
        return view('admin.price.create');
    }

    public function store(Request $request)
    {
        Price::create($request->all());
        return redirect()->route('prices.index');
    }

    public function show(Price $price)
    {
        return view('admin.price.show', compact('price'));
    }

    public function edit(Price $price)
    {
        return view('admin.price.edit', compact('price'));
    }

    public function update(Request $request, Price $price)
    {
        $price->update($request->all());
        return redirect()->route('prices.index');
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return redirect()->route('prices.index');
    }
}
