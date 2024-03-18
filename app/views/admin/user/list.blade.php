@extends('layout.main')
@section('content')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Quản Lý Tài Khoản</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php?act=home">Trang Chủ</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Quản Lý Tài Khoản </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">

            <div class="head">
                <h3>Quản Lý Tài Khoản</h3>
                <div class="create">
                    <button><a href="{{ route('admin/user/store') }}">Tạo Tài Khoản</a></button>
                </div>
            </div>
            <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#waiting" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                Chờ xác nhận 
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                Đang vận chuyển
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                Đã hoàn thành
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">
                Đơn bị huỷ
              </button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="waiting" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                Chờ xác nhận
            </div>
            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                Đang vận chuyển
            </div>
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                Đã hoàn thành
            </div>
            <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                Đã huỷ
            </div>
        </div>
    </div>

        </div>

    </div>
</main>
@endsection