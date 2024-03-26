@extends('layout.main')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Chuyên Môn</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('/') }}">Trang Chủ</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Chuyên môn </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Danh sách</h3>
                </div>
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
                <div>
                    <a href="{{ route('admin/specialty/store') }}"><button class="btn btn-insert">Thêm</button></a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Mã chuyên môn</th>
                            <th>Tên chuyên môn</th>
                            <th>Ảnh </th>
                            <th>Mô tả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialty as $spl)
                            <tr>
                                <td>{{ $spl->specialty_id }}</td>
                                <td>{{ $spl->specialty_name }}</td>
                                <td><img src="../../images/{{ $spl->image }}" alt=""></td>
                                <td>{{ $spl->description }}</td>
                                <td><a href="{{ route('admin/specialty/edit/' . $spl->specialty_id) }}"><button
                                            class="btn status completed">Sửa</button></a></td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa mục này không?')"
                                        href="{{ route('admin/specialty/del/' . $spl->specialty_id) }}"><button
                                            class="btn status pending">Xóa</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

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
