@extends('layout.main')
@section('content')

<main>
    <div class="head-title">
        <div class="left">
            <h1>Sửa chuyên môn</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('/') }}">Trang chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="" href="{{ route('admin/specialty/list') }}">Chuyên môn </a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Sửa chuyên môn</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Chuyên môn</h3>

            </div>
            <form action="{{ route('admin/specialty/update') }}" class="form-input" method="post" enctype="multipart/form-data">
                <div class="form-group pb-4">
                    <label for="" class="label pt-2">
                        Tên 
                    </label><br />
                    <input type="text" name="specialty_name" id="" value="{{ $specialty->specialty_name }}" placeholder="Nhập tên chuyên môn "
                        class="input w-75 rounded-2">
                    <label for="" class="label pt-2">
                       Ảnh 
                    </label><br />
                    <img src="../../images/{{ $specialty->image }}" alt="">
                    <input type="file" name="image" id="" value="" 
                        class="input w-75 rounded-2">
                    <label for="" class="label pt-2">
                        Mô tả
                    </label><br />
                    <textarea name="specialty_description" id="" cols="50" rows="10">{{ $specialty->description}}</textarea>
                </div>


                <input type="submit" name="submit" id="" value="Cập nhật" class="btn btn-insert  status completed ">
                <input type="reset" name="reset" id="" value="Nhập Lại" class=" btn btn-reset ">

            </form>
            <a href="{{ route('admin/specialty/list') }}"><button class="btn btn-insert  status completed mt-4">Các chuyên môn 
                </button></a>
         

        </div>

    </div>
</main>
@endsection