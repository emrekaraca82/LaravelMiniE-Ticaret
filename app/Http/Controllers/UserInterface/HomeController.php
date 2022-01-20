<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        $getProduct = Product::where('status','active')->take(6)->get();
        return view('UserInterface.index',compact('getProduct'));
    }

    public function product()
    {       
        $getCategory = Category::where('status','active')->get();
        $getProduct =  Product::where('status','active')->paginate(12);
        return view('UserInterface.product',compact('getCategory','getProduct'));
    }

    public function category_detail($slug)
    {
        $getCategory = Category::get();
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('category_id',$category->id)->where('status','active')->get();
            return view('UserInterface.category',compact('category','products','getCategory'));
        }
        else{
            return redirect('/')->with('slug',"böyle kategori yok");
        }
        
    }

    public function product_detail($cate_slug,$prod_slug)
    {
        
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {   
                $products = Product::where('slug',$prod_slug)->first();
                return view('UserInterface.product-detail',compact('products'));
            }
            else{
                return redirect('/')->with('status',"böyle ürün yok");
            }
        }
        else{
            return redirect('/')->with('status',"böyle kategori yok");
        }
        
    }
}
