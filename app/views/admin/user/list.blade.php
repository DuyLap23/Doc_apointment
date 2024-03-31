@extends('layout.main')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Quản Lý Tài Khoản</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('/') }}">Trang Chủ</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Quản Lý Tài Khoản </a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- table -->
        <div>
            @if (isset($_SESSION['error']))
                <div id="error-message" class="alert alert-danger">
                    {{ $_SESSION['error'] }}
                    @unset ($_SESSION['error'])
                </div>
            @elseif(isset($_SESSION['success']))
                <div id="success-message" class="alert alert-success">
                    {{ $_SESSION['success'] }}
                </div>
                @unset ($_SESSION['success'])
            @endif
        </div>
        <div class="container mt-5">
            <a href="{{ route('admin/user/store') }}"><input type="button" value="Tạo Tài Khoản"></a>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#patient"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Bệnh Nhân
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#doctor  " type="button"
                        role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                        Bác Sĩ
                    </button>
                </li>
                <li class="nav-item " role="presentation">
                    <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button"
                        role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                        Admin
                    </button>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- admin  -->
                <div class="tab-pane fade  " id="admin" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <!-- table  -->
                    <div class="table-data">
                        <div class="order">
                            <table>
                                <thead>
                                    <tr class="row">
                                        <th class="col-1">Mã Tài Khoản</th>
                                        <th class="col-3">Tên Tài Khoản</th>
                                        <th class="col-2">Ảnh</th>
                                        <th class="col-4">Thông tin </th>
                                        <th class="col-2">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($userSelects['3']))
                                        @foreach ($userSelects['3'] as $users)
                                            <tr class="tr-shadow row ">
                                                <td class="col-1  ">
                                                    <p>{{ $users->id }}</p>
                                                </td>

                                                <td class="col-3">
                                                    <p> {{ $users->firstName . ' ' . $users->lastName }}</p>
                                                </td>

                                                <td class="col-2">
                                                    <img src="../../images/{{ $users->image }}" alt=""
                                                        width="100px" height="100px" class="rounded-4">
                                                </td>
                                                <td class="col-4">
                                                    <p> <strong>Email</strong> : {{ $users->email }}</p>
                                                    <p><strong>SDT </strong>: {{ $users->phonenumber }}</p>
                                                    <p><strong>Giới tính</strong> : {{ $users->gender_value }}</p>
                                                    <p><strong>Địa chỉ</strong> : {{ $users->address }}</p>
                                                </td>
                                                <td class="col-2">
                                                    <a href="{{ route('admin/user/detail/' . $users->id) }}"><button
                                                            class="btn status completed">sửa</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- table  -->
                </div>
                <!-- doctor -->
                <div class="tab-pane fade" id="doctor" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="table-data">
                        <div class="order">
                            <table class=" table-striped ">
                                <thead>
                                    <tr class="row">
                                        <th class="col-1">Mã Tài Khoản</th>
                                        <th class="col-2">Tên Tài Khoản</th>
                                        <th class="col-1">Ảnh</th>
                                        <th class="col-4">Thông tin </th>
                                        <th class="col-2">Chức vụ</th>
                                        <th class="col-1">Đặt lịch</th>
                                        <th class="col-1">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($userSelects['2']))
                                        @foreach ($userSelects['2'] as $users)
                                            <tr class="tr-shadow row ">
                                                <td class="col-1">
                                                    <p class="col"> {{ $users->id }}</p>
                                                </td>
                                                <td class="col-2">
                                                    {{ $users->firstName . ' ' . $users->lastName }}
                                                </td>

                                                <td class="col-1">
                                                    <img src="../../images/{{ $users->image }}" alt=""
                                                        width="100px" height="100px" class="rounded-4">
                                                </td>
                                                <td class="col-4">
                                                    <p><strong>Email :</strong> {{ $users->email }} </p>
                                                    <p><strong>SDT :</strong> {{ $users->phonenumber }}</p>
                                                    <p><strong>Giới tính :</strong> {{ $users->gender_value }}</p>
                                                    <p><strong>Địa chỉ :</strong> {{ $users->address }}</p>
                                                </td>

                                                <td class="col-2">
                                                    <p><strong>Vai trò :</strong> {{ $users->role_value }}</p>
                                                    <p><strong>Chức vụ :</strong> {{ $users->position_value }}</p>
                                                    <p><strong>Chuyên môn :</strong> {{ $users->specialty_name }}</p>

                                                </td>
                                                <td class="col-1"><button class="btn status bluecheck"><a
                                                            class="text-decoration-none text-white" href="">Đặt
                                                            lịch</a></button></td>
                                                <td class="col-1">

                                                    <a href="{{ route('admin/user/detail/' . $users->id) }}"><button
                                                            class="btn status completed">Sửa</button></a>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa Tài Khoản này không?')"
                                                        href="{{ route('admin/user/del/' . $users->id) }}"><button
                                                            class="btn status pending">Xóa</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end doctor -->

                <!-- patient -->
                <div class="tab-pane fade show active" id="patient" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="table-data">
                        <div class="order">
                            <table>
                                <thead>
                                    <tr class="row">
                                        <th class="col-1">Mã Tài Khoản</th>
                                        <th class="col-3">Tên Tài Khoản</th>
                                        <th class="col-2">Ảnh</th>
                                        <th class="col-4">Thông tin</th>
                                        <th class="col-2">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($userSelects['1']))
                                        @foreach ($userSelects['1'] as $users)
                                            <tr class="tr-shadow row ">
                                                <td class="col-1">
                                                    <p> {{ $users->id }}</p>
                                                </td>
                                                <td class="col-3">
                                                    {{ $users->firstName . ' ' . $users->lastName }}
                                                </td>

                                                <td class="col-2">
                                                    <img src="../../images/{{ $users->image }}" alt=""
                                                        width="100px" height="100px" class="rounded-4">
                                                </td>

                                                <td class="col-4">
                                                   <p><strong>Email :</strong>  {{ $users->email }}</p>
                                                   <p><strong>SDT :</strong>  {{ $users->phonenumber }}</p>
                                                   <p><strong>Giới tính :</strong> {{ $users->gender_value }}</p>
                                                   <p><strong>Địa chỉ :</strong> {{ $users->address }}</p>
                                                </td>

                                                
                                                <td class="col-2">
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa Tài Khoản này không?')"
                                                        href="{{ route('admin/user/del/' . $users->id) }}"><button
                                                            class="btn status pending">xóa</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end patient -->
                <!-- end admin  -->



            </div>
        </div>
        </div>
    </main>
    <script>
        // Xóa thông báo sau 3 giây
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.remove();
            }

            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.remove();
            }
        }, 3000); // 3000 milliseconds = 3 giây
    </script>
@endsection
