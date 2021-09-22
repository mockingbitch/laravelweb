@extends('adminLayout')
@section('adminContent')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mã giảm giá
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
                        <form role="form" action="{{ URL::to('/save-coupon') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" name="cp_name" class="form-control" "
                                   >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mã giảm giá</label>
                                <input type="text" name="cp_code" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng mã giảm giá</label>
                                <input type="text" name="cp_qty" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giảm theo:</label>
                                <select name="cp_function" class="form-control input-lg m-bot15">
                                    <option value="1">Giảm theo %</option>
                                    <option value="2">Giảm tiền</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá trị mã</label>
                                <input type="text" name="cp_value" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="cp_status" class="form-control input-lg m-bot15">
                                    <option value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                </select>
                            </div>
                            <button name="addcoupon" type="submit" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
