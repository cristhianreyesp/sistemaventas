<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:brands.create')->only(['create','store']);
        $this->middleware('can:brands.index')->only(['index']);
        $this->middleware('can:brands.edit')->only(['edit','update']);
        $this->middleware('can:brands.show')->only(['show']);
        $this->middleware('can:brands.destroy')->only(['destroy']);
    }
    
    public function index()
    {
        $brands = Brand::get();
        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('admin.brand.create');
    }
    public function store(StoreRequest $request)
    {
        Brand::create($request->all());
        return redirect()->route('brands.index');
    }
    public function show(Brand $brand)
    {
        return view('admin.brand.show', compact('brand'));
    }
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }
    public function update(UpdateRequest $request, Brand $brand)
    {
        $brand->update($request->all());
        return redirect()->route('brands.index');
    }
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
