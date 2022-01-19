<x-app-layout>
<x-slot name="header"></x-slot>

  <!--Content right-->
  <div class="col-md-12 col-sm-9 col-xs-12 content pt-2 pl-2">
      <div class="col-sm-12">
        <!--Default bootstrap 4 validation-->
        <div class="mt-1 mb-4 p-3 button-container bg-white border shadow-sm">
        <form method="POST" action="{{route('category.store')}}">
            @csrf      
            <div class="form-row">  

              <div class="col-md-6 mb-2">
                <label for="icerikKeyword"> Kategori Adı </label>
                <input type="text" class="form-control" name="name"
                  value="">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

            </div>


            <button type="submit" class="btn btn-success"> Kaydet </button>
          </form>
        </div>
        <!--/Default bootstrap validation-->
        </div>
    </div>



</x-app-layout>