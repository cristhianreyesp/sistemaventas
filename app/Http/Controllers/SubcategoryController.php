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
        $categories = Category::get();
        $subcategories = Subcategory::get();
        return view('admin.subcategory.index', compact('categories',  'subcategories'));
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

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::get();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }
    public function update(UpdateRequest $request, Subcategory $subcategory)
    {
        $subcategory->update($request->all());
        return redirect()->route('subcategories.index');
    }
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index');
    }

   public function byCategory($id)
   {
        return Subcategory::where('category_id',$id)->get();
    }
}
