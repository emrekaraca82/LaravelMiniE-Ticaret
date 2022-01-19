<x-app-layout>
    <x-slot name="header">Kategori Güncelle</x-slot>
   
    <div class="row">
        <div class="card">    
            <div class="card-body">
            <form method="POST" action="{{route('category.update',$category->id)}}">
                @method('PUT') 
                @csrf             
                <div class="form-group" style="margin-top:10px;">
                    <label> Kategori Adı </label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label> Durum </label>
                    <select name="status" class="form-control">
                         
                        <option @if($category->status==='active') selected @endif value="active">Aktif</option>   
                        <option @if($category->status==='passive') selected @endif value="passive">Pasif</option>   
                       
                    </select>  
                </div>
                                
                <button type="submit" class="btn btn-primary"> Güncelle </button>
              
            </form>
           
            </div>
        </div>
</div>



</x-app-layout>
