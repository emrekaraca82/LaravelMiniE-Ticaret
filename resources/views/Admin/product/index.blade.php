<x-app-layout>
<x-slot name="header"></x-slot>
<!--Main Content-->
	<!--Content right-->
	<div class="col-md-12 col-sm-9 col-xs-12 content pt-1 pl-0">
		
		<div class="row mt-3">
			<div class="col-sm-12">
               
				<div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
                                    <th>Ürün Resimi</th>
									<th>Ürün Adı</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>	
                                    <th>Birim Fiyat</th>	
                                    <th>Durum</th>			
									<th>Kayıt Tarih</th>
									<th style="width: 200px;">İşlemler</th>
								</tr>
							</thead>
                            @foreach($productList as $product)		
                            <tbody>
                                <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td><img src="{{asset($product->image)}}" alt="{{asset($product->baslik)}}" class="img-thumbnail" style="height:100px;"></td>     
                                <td>{{ $product->baslik }}</td>   
                                <td>{{ $product->getCategory->name }}</td>   
                                <td>{{ $product->stok }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @switch($product->status)
                                        @case('active')
                                        <span style="background-color:#33a771;color:white;">Aktif</span>
                                        @break
                                        @case('passive')
                                        <span style="background-color:#dc3545;color:white;">Pasif</span>
                                        @break
                                    @endswitch
                                </td>                               
                                <td>{{ $product->created_at ? $product->created_at->diffForHumans() : '-' }}</td>                                     
                                <td>            
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('product.destroy',$product->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>                  
                                </td>
                                
                                </tr>
                            
                            </tbody>
                            @endforeach
						</table>
                        {{$productList->links()}}
					</div>
				</div>
				<!--/Datatable-->
			</div>
		</div>
        </div>

</x-app-layout>
