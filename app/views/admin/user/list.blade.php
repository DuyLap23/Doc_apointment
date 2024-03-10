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

            </div>
            <table>
                <thead>
                    <tr>
                        <th>Mã Tài Khoản</th>
                        <th>Email</th>
                        <th>Tên Tài Khoản</th>
                        <th>Ảnh</th>
                        <th>Địa Chỉ</th>
                        <th>Giới Tính</th>
                        <th>Số Điện Thoại</th>
                        <th>Vai Trò</th>
                        <th>Chức Vụ</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($userSelect as $usList)
                    
                        <tr class="tr-shadow">
                            <td>
                                {{ $usList->id }}
                            </td>
                            <td>
                                {{ $usList->email }}
                            </td>
                            <td>
                                {{ $usList->firstName
                                    .' ' . $usList->lastName}}
                            </td>
                          
                            <td>
                                {{ $usList->image }}
                            </td>
                            <td>
                                {{ $usList->address }}
                            </td>
                            <td>
                                {{ $usList->gender }}
                            </td>
                            <td>
                                {{ $usList->phonenumber }}
                            </td>
                            <td>
                                {{ $usList->roleId }}
                            </td>
                            <td>
                                {{ $usList->positionId }}
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa Tài Khoản này không?')"
                                    href="{{ route('admin/user/del/'. $usList->id)}}"><button
                                        class="btn status pending">xóa</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</main>
@endsection