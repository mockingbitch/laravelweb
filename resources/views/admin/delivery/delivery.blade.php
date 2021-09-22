@extends('adminLayout')
@section('adminContent')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Quản lý vận chuyển
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span style="color:green;text-align:center">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-product') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-lg m-bot15 choose city">
                                    <option value="">---Chọn thành phố---</option>
                                   @foreach ($city as $key => $value)
                                   <option value="{{$value->matp}}">{{$value->tentinhthanhpho}}</option>
                                   @endforeach
                                   

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn quận/huyện</label>
                                <select name="province" id = "province" class="form-control input-lg m-bot15 choose province">
                                    <option value="">--Chọn quận huyện--</option>
                                   {{-- <option value="{{$value->maqh}}">{{$value->tenquanhuyen}}</option>
                                   --}}

                                </select>
                            </div>
                           
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Chọn xã/phường</label>
                                <select name="wards" id="wards" class="form-control input-lg m-bot15 choose wards">
                                 

                                </select>
                            </div> --}}
                           
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="text"  name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1"
                                    placeholder="Thêm tên danh mục">
                            </div>
                            <button name="add_delivery" type="button" class="btn btn-info add_delivery">Thêm</button>
                        </form>
                    </div>
                    <div id="load_delivery">
                        
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
