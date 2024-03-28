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
    
    <form action="{{ route('admin/user/edit/'.$user->id) }}" enctype="multipart/form-data" method="POST">

        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="{{ $user->email }}"/></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="text" name="password" value="{{ $user->password }}"/></td>
            </tr>
            <tr>
                <td>Họ</td>
                <td><input type="text" name="firstName" value="{{ $user->firstName }}"/></td>
            </tr>
            <tr>
                <td>Tên</td>
                <td><input type="text" name="lastName" value="{{ $user->lastName }}"/></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input type="text" name="phonenumber" value="{{ $user->phonenumber }}"/></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="address" value="{{ $user->address }}"/></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td><input type="text" name="gender" value="{{ $user->gender }}"/></td>
            </tr>
            <tr>
                <td>Ảnh đại diện</td>
                <td><input type="file" name="image" value="{{ $user->image }}"/></td>
            </tr>

            <tr>
                <td><input type="submit" name="edit" value="Sửa" /></td>
            </tr>
        </table>
    </form>
@endsection
