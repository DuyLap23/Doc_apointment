@extends('layout.main')
@section('content')
@if(isset($_SESSION['errors']) && isset($_GET['msg']))
<ul>
    @foreach($_SESSION['errors'] as $error)
    <li style="color: red">{{ $error }}</li>
    @endforeach
</ul>
@endif
@if(isset($_SESSION['success']) && isset($_GET['msg']))
<span style="color: green">{{ $_SESSION['success'] }}</span>
@endif
<main>
    <div class="head-title">
        <div class="left">
            <h1>Chuyên môn</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Trang chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="" href="#">Tài khoản </a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Sửa tài khoản bác sĩ</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Chỉnh sửa</h3>
            </div>
            <form action="{{ route('admin/user/edit/'.$user->id) }}" enctype="multipart/form-data" method="POST" class="form-input">

                <div class="form-group pb-4">
                    <label for="">Email</label> <br>
                    <input type="text" class="input w-75 rounded-2" name="email" value="{{ $user->email }}" /> <br>

                    <label for="" class="label pt-2">Mật khẩu</label> <br>

                    <input type="text" class="input w-75 rounded-2" name="password" value="{{ $user->password }}" /> <br>

                    <label for="" class="label pt-2">Họ</label> <br>
                    <input type="text" class="input w-75 rounded-2" name="firstName" value="{{ $user->firstName }}" /> <br>

                    <label for="" class="label pt-2">Tên</label> <br>
                    <input type="text" class="input w-75 rounded-2" name="lastName" value="{{ $user->lastName }}" /> <br>

                    <label for="" class="label pt-2">Số điện thoại</label> <br>
                    <input type="text" class="input w-75 rounded-2" name="phonenumber" value="{{ $user->phonenumber }}" /> <br>

                    <label for="" class="label pt-2">Địa chỉ</label> <br>
                    <input type="text" class="input w-75 rounded-2 " name="address" value="{{ $user->address }}" /> <br>

                    <label for="" class="label pt-2">Giới tính</label> <br>
                    <select name="gender" id="" class="form-control mt-2 rounded-3 w-75">
                        @foreach ($genderIds as $key => $gender)
                        <option value="{{ $gender->id_codetype }}">{{ $gender->value }}</option>
                        @endforeach
                    </select> <br>


                    <label for="" class="label pt-2">Ảnh</label> <br>
                    <img src="../../../images/{{ $user->image }}" width="150px" alt=""> <br>
                    <input type="file" name="image"> <br>
                </div>


                <input type="submit" name="submit" id="" value="Cập Nhật" class="btn btn-insert  status completed ">
                <input type="reset" name="reset" id="" value="Nhập Lại" class=" btn btn-reset ">
            </form>
            <a href="{{ route('admin/specialty/list') }}"><button class="btn btn-insert  status completed mt-4">Các
                    chuyên môn
                </button></a>


            </form>
        </div>
    </div>
</main>
@endsection