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
									<th>Kategori Adı</th>
                                    <th>Kategori Seo</th>	
                                    <th>Durum</th>			
									<th>Kayıt Tarih</th>
									<th style="width: 200px;">İşlemler</th>
								</tr>
							</thead>
                            @foreach($categoryList as $category)		
                            <tbody>
                                <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>   
                                <td>{{ $category->slug }}</td>     
                                <td>
                                    @switch($category->status)
                                        @case('active')
                                        <span style="background-color:#33a771;color:white;">Aktif</span>
                                        @break
                                        @case('passive')
                                        <span style="background-color:#dc3545;color:white;">Pasif</span>
                                        @break
                                    @endswitch
                                </td>                               
                                <td>{{ $category->created_at ? $category->created_at->diffForHumans() : '-' }}</td>                                     
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('category.destroy',$category->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>                  
                                </td>
                                
                                </tr>
                            
                            </tbody>
                            @endforeach
						</table>
                        {{$categoryList->links()}}
					</div>
				</div>
				<!--/Datatable-->
			</div>
		</div>
        </div>

</x-app-layout>
