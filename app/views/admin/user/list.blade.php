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
            <table>
                <thead>
                    <tr class="row">
                        <th class="col">Mã Tài Khoản</th>
                        <th class="col">Email</th>
                        <th class="col">Tên Tài Khoản</th>
                        <th class="col">Ảnh</th>
                        <th class="col">Địa Chỉ</th>
                        <th class="col">Giới Tính</th>
                        <th class="col">Số Điện Thoại</th>
                        <th class="col">Vai Trò</th>
                        <th class="col">Chức Vụ</th>
                        <th class="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($userSelect as $usList)
                    
                        <tr class="tr-shadow row">
                            <td class="col">
                                {{ $usList->id }}
                            </td>
                            <td class="col">
                                {{ $usList->email }}
                            </td>
                            <td class="col">
                                {{ $usList->firstName
                                    .' ' . $usList->lastName}}
                            </td >
                          
                            <td class="col">
                                <img src="../../images/{{ $usList->image }}" alt="" width="100px" height="100px" class="rounded-circle">
                            </td>
                            <td class="col">
                                {{ $usList->address }}
                            </td>
                            <td class="col">
                          @if($usList->gender == 0)Nam 
                          @else Nữ
                           @endif 
                          
                               
                            </td>
                            <td class="col">
                                {{ $usList->phonenumber }}
                            </td>
                            <td class="col">
                                {{ $usList->roleId }}
                            </td>
                            <td class="col">
                                {{ $usList->positionId }}
                            </td>
                            <td class="col">
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