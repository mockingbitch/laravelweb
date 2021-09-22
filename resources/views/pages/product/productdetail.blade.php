@extends('layout')
@section('content')
    <div class="banner-bootom-w3-agileits py-5">
        <div class="container py-xl-4 py-lg-2">
            <div class="row">
                <div class="col-md-9">
                    <!-- tittle heading -->
                    <h2 style="font-size:60px" class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                        Chi tiết sản phẩm</h2>
                    <hr />
                    <!-- //tittle heading -->
                    <div class="row">
                        @foreach ($product_detail as $key => $value)
                            <div class="col-lg-5 col-md-8 single-right-left ">
                                <div class="grid images_3_of_2">
                                    <div class="flexslider">
                                        <div class="thumb-image">
                                            <img width="250px"
                                                src="{{ URL::to('public/uploads/product/' . $value->pr_img) }}"
                                                data-imagezoom="true" class="img-fluid" alt="">
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ URL::to('/save-cart') }}" method="post">
                                @csrf
                                <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                                    <h3 class="mb-3">{{ $value->pr_name }}</h3>
                                    <p class="my-sm-4 my-3">
                                        {{ $value->pr_des }}
                                    </p>
                                    <p class="mb-3">
                                        <span class="item_price">Giá:
                                            &emsp;{{ number_format($value->pr_price) . ' VND' }}</span>
                                        {{-- <del class="mx-2 font-weight-light">$280.00</del> --}}
                                        {{-- <label>Free delivery</label> --}}
                                    </p>
                                    <div class="single-infoagile">
                                        <ul>
                                            <li class="mb-3">
                                                Cash on Delivery Eligible.
                                            </li>
                                            <li class="mb-3">
                                                Shipping Speed to Delivery.
                                            </li>
                                            <li class="mb-3">
                                                EMIs from $655/month.
                                            </li>
                                            <li class="mb-3">
                                                Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-single-w3l">
                                        <p class="my-3">
                                            <hr />
                                            <i class="far fa-hand-point-right mr-2"></i>
                                            Thông tin chi tiết:
                                        </p>
                                        <p class="my-sm-4 my-3">
                                            {{ $value->pr_content }}
                                        </p>
                                    </div>
                                    <div class="single-infoagile">
                                        <p class="my-3">
                                            <label>Quantity: </label>
                                            <input type="number" min="1" name="quantity" value="1">
                                        </p>
                                    </div>
                                    <div class="occasion-cart">
                                        <div
                                            class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="pr_id_hidden"
                                                        value="{{ $value->pr_id }}" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name" value="Samsung Galaxy J7 Prime" />
                                                    <input type="hidden" name="amount" value="200.00" />
                                                    <input type="hidden" name="discount_amount" value="1.00" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Thêm vào giỏ hàng"
                                                        class="button add-to-cart-success" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                    <hr style="margin-top:100px"/>
                    <div class="recommended_items" style="margin:50px">
                        <h2 class="title text-center">Sản phẩm liên quan</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach ($related_product as $key => $value)
                                        <div class="col-sm-4 related-product" style="border:1px solid grey; border-radius:10px">
                                            <a href="{{ URL::to('/chi-tiet-san-pham/' . $value->pr_id) }}">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfor text-center">
                                                            <img width="100px"
                                                                src="{{ URL::to('public/uploads/product/' . $value->pr_img) }}"
                                                                alt="" />
                                                            <h2>{{ number_format($value->pr_price) . ' VND' }}</h2>
                                                            <p>{{ $value->pr_name }}</p>
                                                            <button type="button" name="addtocart" class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</button>
    
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#rcm-item-carousel" data-slide="prev"><i
                                    class="fa fa-angle-left"></i></a>
                            <a class="right recommended-item-control" href="#rcm-item-carousel" data-slide="next"><i
                                    class="fa fa-angle-right"></i></a>

                        </div>
                    </div>
                </div>
                
                    <aside id="sidebar">
                        <div class="col-md-3">
                            <div class="side animate-box">
                                <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                                    <h2><span>Category</span></h2>
                                </div>
                                <ul class="category">
                                    @foreach ($category as $key => $value_cate)
                                        <li><a href="{{ URL::to('/danh-muc-san-pham/' . $value_cate->cate_id) }}"><i
                                                    class="icon-check"></i> &ensp; {{ $value_cate->cate_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="side animate-box">
                                <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                                    <h2><span>Brand</span></h2>
                                </div>
                                <ul class="category">
                                    @foreach ($brand as $key => $value_brand)
                                        <li><a href="{{ URL::to('/brand/' . $value_brand->br_id) }}"><i
                                                    class="icon-check"></i> &ensp; {{ $value_brand->br_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="side animate-box">
                                <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                                    <h2><span>About Me</span></h2>
                                </div>
                                <div class="fh5co-staff">
                                    <img src="images/user-2.jpg" alt="Free HTML5 Templates by FreeHTML5.co">
                                    <h3>Jean Smith</h3>
                                    <strong class="role">CEO, Founder</strong>
                                    <p>Quos quia provident conse culpa facere ratione maxime commodi voluptates id repellat
                                        velit eaque aspernatur expedita.</p>
                                    <ul class="fh5co-social-icons">
                                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                                        <li><a href="#"><i class="icon-github"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="side animate-box">
                                <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                                    <h2><span>Latest Posts</span></h2>
                                </div>
                                <div class="blog-entry">
                                    <a href="#">
                                        <img src="images/blog-1.jpg" class="img-responsive" alt="">
                                        <div class="desc">
                                            <span class="date">Dec. 25, 2016</span>
                                            <h3>Most Beautiful Site in 2016</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="blog-entry">
                                    <a href="#">
                                        <img src="images/blog-2.jpg" class="img-responsive" alt="">
                                        <div class="desc">
                                            <span class="date">Dec. 25, 2016</span>
                                            <h3>Most Beautiful Site in 2016</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="blog-entry">
                                    <a href="#">
                                        <img src="images/blog-1.jpg" class="img-responsive" alt="">
                                        <div class="desc">
                                            <span class="date">Dec. 25, 2016</span>
                                            <h3>Most Beautiful Site in 2016</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
    
                            {{-- <div class="side animate-box">
                                <div class="col-md-12 col-md-offset-0 text-center fh5co-heading fh5co-heading-sidebar">
                                    <h2><span>Intagram</span></h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="insta" style="background-image: url(images/insta-1.jpg);">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </aside>
                
            </div>

        </div>
    </div>


@endsection
