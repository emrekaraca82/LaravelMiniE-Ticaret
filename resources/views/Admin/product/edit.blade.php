<x-app-layout>
    <x-slot name="header">Ürünleri Güncelle</x-slot>
   
    <div class="row">
        <div class="card">    
            <div class="card-body">
            <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
            @method('PUT') 
            @csrf  

            <div class="form-row"> 
                <div class="col-md-12 mb-2">           
                <a href="{{asset($product->image)}}" type="button" style="color:white;" class="btn btn-warning"
                  target="_blank">Görsel Görüntüle</a>             
                </div>
            </div>

            <div class="form-row"> 
                <div class="col-md-6 mb-2">
                    <label for="sliderLinkYazi">Ürün Adı </label>
                    <input type="text" class="form-control" name="baslik"
                        value="{{ $product->baslik }}">                
                </div>

                <div class="col-md-6 mb-2">
                    <label for="category_id">Kategori </label>
                    <select class="form-select form-select-md mb-3" name="">
                        <option value="">{{ $product->getCategory->name }}</option>                  
                    </select>
                </div>
            
            </div>

            <div class="form-row">

                <div class="col-md-6 mb-2">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok"
                value="{{ $product->stok }}" required>              
                </div>

                <div class="col-md-6 mb-2">
                <label for="price">Birim Fiyat</label>
                <input type="number" class="form-control" name="price"
                    value="{{ $product->price }}" required>          
                </div>

            </div>
             
            <div class="form-row">

              <div class="col-md-12 mb-2">
                <label for="price">Ürün Açıklama</label>
                <textarea class="form-control" name="description" rows="8">{{ $product->description }}</textarea>                 
              </div>
            </div>  

            <div class="form-row">

              <div class="col-md-6 mb-2">
                <label> Durum </label>
                <select name="status" class="form-control">                        
                    <option @if($product->status==='active') selected @endif value="active">Aktif</option>   
                    <option @if($product->status==='passive') selected @endif value="passive">Pasif</option>                       
                </select>  
              </div>

              <div class="col-md-6 mb-2">
                <label for="image">Görsel </label>
                <input type="file" class="form-control" name="image" value="{{$product->image}}">          
              </div>
             
            </div>
                          
            <button type="submit" class="btn btn-primary"> Güncelle </button>
               
            </form>
           
            </div>
        </div>
</div>



</x-app-layout>
