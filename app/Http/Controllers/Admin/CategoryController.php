<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::whereRaw('true')->orderBy('id','desc');
        $q=request()->get("q")??"";
        $published=request()->get("published");
        if($q){
            $categories->where('title','like',"%{$q}%");
        }
        if($published!=null){
            $categories->where('published',$published);
        }
        if($request->export){
            return $categories->where('published','=','1')/*->select("id","title")*/->get()->downloadExcel(
                //"categories.csv",
                //$writerType = \Maatwebsite\Excel\Excel::CSV,
                ///or
                "categories.xlsx",
                $writerType = null,
                $headings = true
            );
        }
        $categories = $categories->paginate(5)->appends(["q"=>$q,"published"=>$published]);
        return view('admin.category.index')->withCategories($categories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if(!$request->published){
            $request['published']=0;
        }
        Category::create($request->all());
        \Session::flash("msg","category created succesfully");
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if(!$category){
           session()->flash("msg", "The category was not found");
           return redirect(route("category.index"));
        }
        return view("admin.category.show")->withCategory($category);
    }

    public function status($id){
        $category=Category::find($id);
        $category->update(['published'=>!$category->published]);
        session()->flash('msg','w: Category status updated');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if($category==null){
           session()->flash("msg", "The category was not found");
           return redirect(route("category.index"));
        }
        return view("admin.category.edit")->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        if(!$request->published){
            $request['published']=0;
        }
        Category::find($id)->update($request->all());
        session()->flash("msg", "The category was updated");
        return redirect(route("categories.index"));
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category){
            Session()->flash('msg','category not found');
            return redirect(route('categories.index'));
        }
        Category::destroy($id);
        session()->flash("msg", " category Deleted Successfully");
        return redirect(route("categories.index"));
    }
}
