<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Subcategory\StoreRequest;
use App\Http\Requests\Subcategory\UpdateRequest;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::get();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Subcategory::create($request->all());
        return redirect()->route('subcategories.index');
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
    }

    public function update(Request $request, Product $product)
    {

    }

    public function destroy(Product $product)
    {

    }
}
