@extends('layout.main')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Thêm Tài Khoản</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('/') }}">Trang Chủ</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="" href="{{ route('admin/user/list') }}">Tài Khoản </a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Thêm Tài Khoản </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Tài Khoản</h3>

                </div>
                <form action="{{ route('admin/user/create') }}" class="form-input" method="post"
                    enctype="multipart/form-data">
                    <div class=" row form-group pb-4">
                        <div class="col-6">
                            <label for="" class="label pt-2">
                                Email
                            </label><br />
                            <input type="text" name="email" id="" value="" placeholder="Nhập tên email "
                                class="input w-75 rounded-2"><br />

                            <label for="" class="label pt-2">
                                Mật Khẩu
                            </label><br />
                            <input type="password" name="password" width="150px"
                                class="input w-75 rounded-2 fileImage"><br />

                            <label for="" class="label pt-2">
                                Họ
                            </label><br />
                            <input type="text" name="firstName" id="" value="" placeholder="Nhập họ"
                                class="input w-75 rounded-2"><br />

                            <label for="" class="label pt-2">
                                Tên
                            </label><br />
                            <input type="text" name="lastName" id="" value="" placeholder="Nhập tên"
                                class="input w-75 rounded-2"><br />

                        </div>

                        <div class="col-6"><label for="" class="label pt-2">
                                Ảnh
                            </label><br />
                            <input type="file" name="image" id="" value=""
                                class="input w-75 rounded-2"><br />

                            <label for="" class="label pt-2">
                                Địa Chỉ
                            </label><br />
                            <textarea name="address" id="" cols="50" class="rounded-2" rows="5"></textarea> <br>

                            <label for="" class="label pt-2">
                                Số Điện Thoại
                            </label><br />
                            <input type="number" name="phonenumber" id="" value=""
                                placeholder="Nhập số điện thoại" class="input w-75 rounded-2"><br />

                            <select name="gender" id="" class="form-control mt-2 rounded-3 w-75">
                                @foreach ($genderIds as $key => $gender)
                              
                                    <option value="{{ $gender->id_codetype }}">{{ $gender->value }}</option>
                                @endforeach
                            </select> <br>
                        </div>



                        <div>
                            <a href="index.php?act=createsp"><input type="submit" name="submitsp" id=""
                                    value="Thêm" class="btn btn-insert  status completed "> </a>
                            <input type="reset" name="reset" id="" value="Nhập Lại" class=" btn btn-reset ">
                        </div>
                </form>
                <div><a href="index.php?act=listsp"><button class="btn btn-insert  status completed mt-4">Về Trang Danh Sách
                        </button></button></a></div>


            </div>

    </main>
@endsection
