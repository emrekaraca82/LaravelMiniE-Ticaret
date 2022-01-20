@include('UserInterface.header')

<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th style="max-width: 20%;">Resim</th>
                                        <th style="max-width: 20%;">Name</th>
                                        <th style="max-width: 20%;">Price</th>
                                        <th style="max-width: 20%;">Quantity</th>
                                        <th style="max-width: 20%;">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cartItems as $item)	
                              
                                    <tr class="product_data">
                                        <td class="cart_product_img" style="max-width: 20%;" >
                                            <a href="#"><img src="{{asset($item->getProducts->image)}}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc" style="max-width: 20%;">
                                            <h5>{{$item->getProducts->baslik}}</h5>
                                        </td>
                                        <td class="price" style="max-width: 20%;">
                                            <span>{{$item->getProducts->price}}</span>
                                        </td>
                                        <td class="qty" style="max-width: 20%;">
                                        <input type="hidden" value="{{$item->product_id}}" class="prod_id">
                                            <div class="qty-btn d-flex ">                                          
                                                <div class="quantity">
                                                <span class="qty-plus increment-btn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->product_qty}}">
                                                <span class="qty-minus decrement-btn"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                </div>                                       
                                            </div>
                                            
                                        </td>
                                        <td style="max-width: 20%;">
                                            <button class="btn-sm btn-danger delete-cart-item">Sil</button>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>$140.00</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>$140.00</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="cart.html" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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