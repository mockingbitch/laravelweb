@extends('layout')
@section('content')
    <div id="fh5co-content">
        <div class="container">
            <div class="row ">
                <div class="row animate-box col-md-9 col-padded-right">
                    <div class="col-md-12 col-md-offset-0 text-center fh5co-heading">
                        @foreach ($cate_name as $key => $value)
                            <h2><span>Category: {{ $value->cate_name }} </span></h2>
                        @endforeach
                    </div>
                    {{-- @foreach ($product_cateid as $key => $value)
                        <div class="col-md-3">
                            <div class="fh5co-blog animate-box">
                                <a href="{{ URL::to('/chi-tiet-san-pham/' . $value->pr_id) }}"><img class="img-responsive"
                                        src="{{ URL::to('public/uploads/product/' . $value->pr_img) }}" alt=""></a>
                                <div class="blog-text">
                                    <h3><a
                                            href="{{ URL::to('/chi-tiet-san-pham/' . $value->pr_id) }}">{{ $value->pr_name }}</a>
                                    </h3>
                                    <h4><a
                                            href="{{ URL::to('/chi-tiet-san-pham/' . $value->pr_id) }}">{{ number_format($value->pr_price) . ' VND' }}</a>
                                    </h4>
                                    <button type="button" value="Thêm vào giỏ hàng" name="addtocart" class="btn btn-default add-to-cart-success"><i
                                        class="fa fa-shopping-cart"></i>Thêm </button>
                                </div>
                            </div>

                        </div>
                    @endforeach --}}
                    @foreach ($product_cateid as $key => $value)
                    <div class="col-md-3">
                        <div class="fh5co-blog animate-box">
                            <form action="">
                                @csrf
                                <input type="hidden" value="{{$value->pr_id}}" class="cart_pr_id_{{$value->pr_id}}">
                                <input type="hidden" value="{{$value->pr_name}}" class="cart_pr_name_{{$value->pr_id}}">
                                <input type="hidden" value="{{$value->pr_price}}" class="cart_pr_price_{{$value->pr_id}}">
                                <input type="hidden" value="{{$value->pr_img}}" class="cart_pr_img_{{$value->pr_id}}">
                                <input type="hidden" value="1" class="cart_pr_qty_{{$value->pr_id}}">
                            <a href="{{ URL::to('/chi-tiet-san-pham/'. $value->pr_id) }}"><img  class="img-responsive"
                                    src="{{ URL::to('public/uploads/product/'. $value->pr_img) }}" alt=""></a>
                            <div class="blog-text">
                                <h3><a
                                        href="{{ URL::to('/chi-tiet-san-pham/' . $value->pr_id) }}">{{ $value->pr_name }}</a>
                                </h3>
                                <h4><a
                                        href="{{ URL::to('/chi-tiet-san-pham/' . $value->pr_id) }}">{{ number_format($value->pr_price) . ' VND' }}</a>
                                </h4>
                                <button data-id_product="{{ $value->pr_id }}" type="button" value="Thêm vào giỏ hàng" name="addtocart" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Thêm </button>
                            </div>
                            </form>
                        </div>

                    </div>
                @endforeach
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
