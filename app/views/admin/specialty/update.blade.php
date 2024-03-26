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
                        <a class="" href="#">Chuyên môn </a>
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
                    <h3>Chỉnh sửa</h3>
                </div>

                <form action="{{ route('admin/specialty/update/' . $specialty->specialty_id) }}" class="form-input"
                    method="post" enctype="multipart/form-data">
                    <input type="hidden" name="specialty_id" id="" value="{{ $specialty->specialty_id }}">
                    <div class="form-group pb-4">
                        <label for="" class="label pt-2">
                            Tên
                        </label><br />
                        <input type="text" name="specialty_name" id="" value="{{ $specialty->specialty_name }}"
                            placeholder="Nhập tên chuyên môn " class="input w-75 rounded-2"> <br>
                        <label for="" class="label pt-2">
                            Ảnh
                        </label><br />
                        <img src="../../../images/{{ $specialty->image }}" width="150px" alt=""> <br>
                        <input type="file" name="image" id="" value="" class="input w-75 rounded-2">
                        <br>

                        <label for="" class="label pt-2">
                            Mô tả
                        </label><br />
                        <textarea name="specialty_description" id="" cols="100" class ="input w-75 rounded-2" rows="5">{{ $specialty->description }}</textarea>
                    </div>
                    <input type="submit" name="submit" id="" value="Cập Nhật"
                        class="btn btn-insert  status completed ">
                    <input type="reset" name="reset" id="" value="Nhập Lại" class=" btn btn-reset ">
                </form>
                <a href="{{ route('admin/specialty/list') }}"><button class="btn btn-insert  status completed mt-4">Các
                        chuyên môn
                    </button></a>
            </div>
        </div>
    </main>
@endsection
