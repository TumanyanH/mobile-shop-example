<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Brand;

class BrandController extends Controller
{

    /** 
     * @return brands index view
     */
    public function index()
    {
        $brands_list = Brand::get();
        return view('admin.brands.index', [
            'brands_list' => $brands_list,
        ]);
    }

    /** 
     * @return brands create view
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /** 
     * store brand at all
     * 
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'logo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ];

        $request->validate($rules);

        $brand = new Brand();
        $brand->name = $request->name;
        $imagename = time() . '-' . Str::random(8) . '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('uploads/brands/'), $imagename);
        $brand->logo = $imagename;
        $brand->save();

        return redirect()->route('admin.brands.index')->with(['added', 'Added successfully']);
    }

    /** 
     * show current brand to admin
     * 
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.show', compact('brand'));
    }

    /** 
     * edit brand view
     * 
     * @param int $brand (id)
     * @return View
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    /** 
     * update brand action
     * 
     * @param Request $request
     * @param int $id
     * @return redirect
     */
    public function update(Request $request, $id)
    {
        dd($id);
    }
}
