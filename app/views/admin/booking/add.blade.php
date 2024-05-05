@extends('layout.main')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Quản lý lịch hẹn </h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php?act=home">Trang Chủ</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Quản lý lịch hẹn </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">

                <div class="form-group  d-flex ">

                    <form action="" method="post" class="form-group form-search-sp d-flex w-100">
                        <div class="form-input pb-2 d-flex    ">
                            <input type="text" name="search_query" id="searchQuery" width="50px"
                                placeholder="Search doctor..." class="form-control mx-2 rounded-2">
                            <select name="doctor_id" id="searchResults" class="rounded-2 border-0">
                                @foreach ($userSelects[2] as $doctor)
                                    <option value="{{ $doctor->id }}"> {{ $doctor->firstName . ' ' . $doctor->lastName }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-input pb-2 d-flex    ">

                            <input type="date" name="search" width="50px" class="form-control mx-2 rounded-2">
                        </div>
                    </form>
                </div>

                <form action="{{ route('admin/booking/booking') }}" method="post" class="form-group mx-auto">
                    <div class="container">
                        <div class="row">
                            @foreach ($timeIds as $key => $timeId)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="timeSlot[]" id="timeSlot{{ $key }}"
                                            class="form-check-input input-hidden">
                                        <label for="timeSlot{{ $key }}"
                                            class="form-check-label label-time btn btn-outline-secondary w-100">{{ $timeId->value }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mx-4 mt-4">
                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    </div>
                </form>

            </div>

        </div>
    </main>
@endsection
<!--  -->
