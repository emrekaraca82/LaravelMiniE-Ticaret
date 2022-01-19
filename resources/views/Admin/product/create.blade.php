<x-app-layout>
<x-slot name="header"></x-slot>

  <!--Content right-->
  <div class="col-md-12 col-sm-9 col-xs-12 content pt-2 pl-2">
      <div class="col-sm-12">
        <!--Default bootstrap 4 validation-->
        <div class="mt-1 mb-4 p-3 button-container bg-white border shadow-sm">
        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf      
            <div class="form-row">  
           
            <div class="col-md-6 mb-2">
            <label for="sliderLinkYazi">Ürün Adı </label>
            <input type="text" class="form-control" name="baslik"
                value="">
            <div class="valid-feedback">
                Looks good!
            </div>
            </div>

              <div class="col-md-6 mb-2">
                <label for="category_id">Kategori </label>
                <select class="form-select form-select-md mb-3" name="category_id">
                    <option value="">Kategori Seçiniz</option>
                    @foreach($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>           
                    @endforeach
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            
            </div>

            <div class="form-row">

            <div class="col-md-6 mb-2">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok"
                  value="" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-6 mb-2">
                <label for="price">Birim Fiyat</label>
                <input type="number" class="form-control" name="price"
                  value="" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

             
              <div class="col-md-12 mb-2">
                <label for="price">Ürün Açıklama</label>
                <textarea class="form-control" name="description" rows="6"></textarea>             
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

             
              <div class="col-md-6 mb-2">
                <label for="image">Görsel </label>
                <input type="file" class="form-control" name="image">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <input type="hidden" name="image" value="">

            </div>           
            <button type="submit" class="btn btn-success"> Kaydet </button>
          </form>
        </div>
        <!--/Default bootstrap validation-->
        </div>
    </div>



</x-app-layout>