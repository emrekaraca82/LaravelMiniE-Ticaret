@include('UserInterface.header')

<!-- Product Details Area Start -->
<div class="single-product-area section-padding-100 clearfix">
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-50">
                <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="#">{{$products->getCategory->name}}</a></li>  
                <li class="breadcrumb-item active" aria-current="page">{{$products->baslik}}</li> 
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-7">
        <div class="single_product_thumb ">                    
            <div id="product_details_slider" class="carousel slide" data-ride="carousel">                               
                <ol class="carousel-indicators">
                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{asset($products->image)}});">
                    </li>                                
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a class="gallery_img" href="{{asset($products->image)}}">
                            <img class="d-block w-100" src="{{asset($products->image)}}" alt="{{$products->baslik}}">
                        </a>
                    </div>                         
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-5">
        <div class="single_product_desc">
            <!-- Product Meta Data -->
            <div class="product-meta-data">
                <div class="line"></div>
                <p class="product-price">${{$products->price}}</p>
                <a href="product-details.html">
                    <h6>{{$products->baslik}}</h6>
                </a>
                
                <!-- Avaiable -->
                @if($products->stok >0)
                    <p class="avaibility"><i class="fa fa-circle"></i> Stok var</p>
                @else
                    <p class="avaibility"><i class="fa fa-circle" style="color:red;"></i> Stok yok</p>       
                @endif
                
            </div>

            <div class="short_overview my-5">
                <p>{{$products->description}}</p>
            </div>
            

            <!-- Add to Cart Form -->
            <div class="cart clearfix product_data">
                <input type="hidden" value="{{$products->id}}" class="prod_id">
                <div class="cart-btn d-flex mb-50">
                    <p>Adet</p>
                    <div class="quantity">
                    <span class="qty-plus increment-btn"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                    <span class="qty-minus decrement-btn"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                    </div>
                </div>
                <button type="button" class="btn amado-btn addToCartBtn">Add to cart</button>
            </div>
            
        </div>
    </div>
</div>
</div>
</div>
<!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->

<!-- ##### Newsletter Area Start ##### -->
<section class="newsletter-area section-padding-100-0">
<div class="container">
<div class="row align-items-center">
<!-- Newsletter Text -->
<div class="col-12 col-lg-6 col-xl-7">
    <div class="newsletter-text mb-100">
        <h2>Subscribe for a <span>25% Discount</span></h2>
        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
    </div>
</div>
<!-- Newsletter Form -->
<div class="col-12 col-lg-6 col-xl-5">
    <div class="newsletter-form mb-100">
        <form action="#" method="post">
            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
            <input type="submit" value="Subscribe">
        </form>
    </div>
</div>
</div>
</div>
</section>
<!-- ##### Newsletter Area End ##### -->



@include('UserInterface.footer')