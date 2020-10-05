<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\editRequest;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function brands()
    {
        $brands = Brand::select('id','title')->get();
        return $brands;
    }


    public function categories()
    {
        $categories = Category::where('published',1)->select('id','title'/*,'published'*/)->get();
        return $categories;
    }
    public function products()
    {
        $q = request()->q;
        $category = request()->category;
        $brand = request()->brand;

        /*$products = Product::where('active',1)
        ->leftJoin("brands","brand_id","brands.id")
        ->leftJoin("categories","category_id","categories.id");

        if($q){
            $products->where("products.title","like","%{$q}%");
        }
        if($category){
            $products->where("category_id",$category);
        }
        if($brand){
            $products->where("brand_id",$brand);
        }

        $products = $products->select([
            'products.id',
            'brands.title as brand',
            'brand_id',
            'categories.title as category',
            'category_id',
            'products.title as product',
            'image',
            'description',
            'old_price',
            'new_price'
        ])->paginate(10);*/

        
        $products = Product::where('active',1);
        if($q){
            $products->where("title","like","%{$q}%");
        }
        if($category){
            $products->where("category_id",$category);
        }
        if($brand){
            $products->where("brand_id",$brand);
        }
        $products = $products->paginate(10);
        return $products;
    }
}
