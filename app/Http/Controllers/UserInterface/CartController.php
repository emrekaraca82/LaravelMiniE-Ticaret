<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $product_check = Product::where('id',$product_id)->first();

            if($product_check)
            {
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $product_check->name."ürün sepette var"]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $product_check->name."Sepete Eklendi"]);
                }
                
            }
        }
    }

    public function cartView()
    {
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('UserInterface.cart',compact('cartItems'));
    }

    public function updateProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
       
        if(Auth::check())
        {
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->product_qty = $product_qty;
                $cartItem->update();
                return response()->json(['status' => "Adet güncellendi"]);
            }              
        }
    }
    
    public function deleteProduct(Request $request)
    {
        $product_id = $request->input('product_id');
       
        if(Auth::check())
        {
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Kayıt Silindi"]);
            }
            else{
                
                return response()->json(['status' => "Başarısız!!!"]);
            }               
        }
    }


    public function cartCount()
    {
        $cartCount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count' => $cartCount]);
        
    }
    
}
