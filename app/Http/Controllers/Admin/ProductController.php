<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Product::paginate(5);
        return view('admin.product.index',compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.product.create',compact('category')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        if($request->hasFile('image'))
        {
            $fileName = Str::slug($request->baslik).'.'.$request->image->extension();
            $fileNameWithUpload = 'uploads/product/'.$fileName;
            $request->image->move(public_path('uploads/product'),$fileName);
            $request->merge([
                'image'=>$fileNameWithUpload
            ]);
        }

        Product::create($request->post());
        return redirect()->route('product.index')->with('success', 'Ekleme İşlemi Başarılı');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);  
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        if($request->hasFile('image'))
        {
            $fileName = Str::slug($request->baslik).'.'.$request->image->extension();
            $fileNameWithUpload = 'uploads/product/'.$fileName;
            if(File::exists($fileNameWithUpload))
            {
                File::delete($fileNameWithUpload);
            }
            $request->image->move(public_path('uploads/product/'),$fileName);
            $request->merge([
                'image'=>$fileNameWithUpload
            ]);
        }


        Product::find($id)->update($request->post()); 
        return redirect()->route('product.index')->with('success', 'Güncelleme İşlemi Başarılı');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);       
        $oldimage = $product->image;
       
        if(File::exists($oldimage))
        {
            File::delete($oldimage);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'İlgili Veri Silindi');

    }
}
