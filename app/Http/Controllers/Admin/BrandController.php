<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{


    public function index(Request $request)
    {


        $q=request()->get("q")??"";

        $brands=Brand::where('title','like',"%{$q}%")->paginate(5)->appends(["q"=>$q]);


        return view('admin.brand.index')->with("brands",$brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        return view("admin.brand.create")->with("brands",$brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        Brand::create($request->all());
        \Session::flash("msg","Brand created succesfully");
        return redirect(route('brands.index'));
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = Brand::find($id);
        if(!$brands){
            session()->flash("msg", "e: The brand was not found");
            return redirect(route("brands.index"));
        }

        return view("admin/brand.show")->withbrands($brands);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        if($brand==null){
            session()->flash("msg", "e: The Brand was not found");
            return redirect(route("brands.index"));
        }

        return view("admin/brand.edit")->withbrand($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        Brand::find($id)->update($request->all());
        session()->flash("msg", "i: Brand Updated Successfully");
        return redirect(route("brands.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        session()->flash("msg", "w: Brand Deleted Successfully");
        return redirect(route("brands.index"));
    }
}
