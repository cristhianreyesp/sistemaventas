<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Businesses;
use App\Http\Requests\Business\UpdateRequest;

class BusinessesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:business.index')->only(['index']);
        $this->middleware('can:business.edit')->only(['update']);
    }
   
    public function index(){

        //$brands = Brand::get();
        //$business = Businesses::all();
        $business = Businesses::where('id', 1)->firstOrFail();
        return view('admin.business.index', compact('business'));
    }

    public function update(UpdateRequest $request, Businesses $business)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }

        $business->update($request->all()+[
            'logo'=>$image_name,
        ]);

        return redirect()->route('business.index');
    }
}
