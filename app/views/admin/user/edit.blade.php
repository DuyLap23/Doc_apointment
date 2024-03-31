@extends('layout.main')
@section('content')

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
                    <a class="active" href="#">Thay đổi thông tin </a>
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
                @csrf
                <!-- <input type="hidden" name="id" id="" value="{{ $user->id }}"> -->
                <div class="form-group pb-4 ">
                    <label for="" class="label">Email</label> <br>
                    <input type="text" class="input w-75 rounded-2 form-control" name="email" value="{{ $user->email }}" /> <br>

                    <label for="" class="label">Mật khẩu</label> <br>

                    <input type="text" class="input w-75 rounded-2 form-control" name="password" value="{{ $user->password }}" /> <br>

                    <label for="" class="label">Họ</label> <br>
                    <input type="text" class="input w-75 rounded-2 form-control" name="firstName" value="{{ $user->firstName }}" /> <br>

                    <label for="" class="label">Tên</label> <br>
                    <input type="text" class="input w-75 rounded-2 form-control" name="lastName" value="{{ $user->lastName }}" /> <br>

                    <label for="" class="label">Số điện thoại</label> <br>
                    <input type="text" class="input w-75 rounded-2 form-control" name="phonenumber" value="{{ $user->phonenumber }}" /> <br>

                    <label for="" class="label">Địa chỉ</label> <br>
                    <input type="text" class="input w-75 rounded-2 form-control " name="address" value="{{ $user->address }}" /> <br>

                    <label for="" class="label pt-2">Giới tính </label> <br>
                    <select name="gender" id="" class="form-control mt-2 rounded-3 w-75">
                        @foreach ($gender as $gd) 
                            @if ($gd->id_codetype == $user->gender) 
                                <option value="{{$gd->id_codetype}}" selected>{{$gd->value}}</option>';
                            @else
                                <option value="{{$gd->id_codetype}}">{{$gd->value}}</option>';
                            @endif
                        @endforeach
                    </select>

                    <label for="" class="label pt-2">Chức vụ</label> <br>
                    <select name="position" id="" class="form-control mt-2 rounded-3 w-75">
                        @foreach ($positionIds as $ps) 
                            @if ($ps->id_codetype == $user->positionId ) 
                                <option value="{{$ps->id_codetype}}" selected>{{$ps->value}}</option>';
                            @else
                                <option value="{{$ps->id_codetype}}">{{$ps->value}}</option>';
                            @endif
                        @endforeach
                    </select>
                    <label for="" class="label pt-2">Chuyên môn</label> <br>
                    <select name="specialty" id="" class="form-control mt-2 rounded-3 w-75">
                        @foreach ($selectSpecialty as $sp) 
                            @if ($sp->specialty_id == $user->specialty ) 
                                <option value="{{$sp->specialty_id}}" selected>{{$sp->specialty_name}}</option>';
                            @else
                                <option value="{{$sp->specialty_id}}">{{$sp->specialty_name}}</option>';
                            @endif
                        @endforeach
                    </select>
                   
                    <label for="" class="label pt-2">Ảnh</label> <br>
                    <img src="../../../images/{{ $user->image }}" width="150px" alt=""> <br>
                    <input type="file" name="image"> <br>
                </div>


                <input type="submit" name="submit" id="" value="Cập Nhật" class="btn btn-insert  status completed ">
                <input type="reset" name="reset" id="" value="Nhập Lại" class=" btn btn-reset ">
            </form>
            <a href="{{ route('admin/user/list') }}"><button class="btn btn-insert  status completed mt-4">
                    Trở lại
                </button></a>


            </form>
        </div>
    </div>
</main>
@endsection