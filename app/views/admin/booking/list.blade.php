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
                            <input type="text" name="search" width="50px" placeholder="Search doctor..."
                                class="form-control mx-2 rounded-2">
                            <select name="doctor_id" class="rounded-2 border-0">
                                <option value="0" selected>Tên bác sĩ</option>

                            </select>

                        </div>

                        <div class="form-input pb-2 d-flex    ">

                            <input type="date" name="search" width="50px" 
                                class="form-control mx-2 rounded-2">

                            <input type="submit" name="filter" value="Tìm" class=" btn btn-insert mx-2">
                        </div>
                    </form>
                </div>

                <form action="{{ route ('admin/booking/booking') }}" method="post" class="form-group mx-auto">
                    <div class=" container">
                        <div class="d-flex">
                            <div>
                                <input type="checkbox" name="timeSlot[]" id="timeSlot[]" class="input-hidden">
                                <label for="timeSlot[]" class="form-label label-time btn btn-outline-secondary ">8:00 - 9:00</label>
                            </div>
                            <div>
                                <input type="checkbox" name="timeSlot1" id="timeSlot1" class="input-hidden">
                                <label for="timeSlot1" class="form-label label-time btn btn-outline-secondary ">8:00 - 9:00</label>
                            </div>
                            <div>
                                <input type="checkbox" name="timeSlot2" id="timeSlot2" class="input-hidden">
                                <label for="timeSlot2" class="form-label label-time btn btn-outline-secondary ">8:00 - 9:00</label>
                            </div>
                            <div>
                                <input type="checkbox" name="timeSlot3" id="timeSlot3" class="input-hidden">
                                <label for="timeSlot3" class="form-label label-time btn btn-outline-secondary ">8:00 - 9:00</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div>
                                <input type="checkbox" name="timeSlot4" id="timeSlot4" class="input-hidden">
                                <label for="timeSlot4" class="form-label label-time btn btn-outline-secondary ">8:00 - 9:00</label>
                            </div>
                            <div>
                                <input type="checkbox" name="timeSlot5" id="timeSlot5" class="input-hidden">
                                <label for="timeSlot5" class="form-label label-time btn btn-outline-secondary ">8:00 - 9:00</label>
                            </div>
                            <div>
                                <input type="checkbox" name="timeSlot6" id="timeSlot6" class="input-hidden">
                                <label for="timeSlot6" class="form-label label-time btn btn-outline-secondary ">8:00 - 9:00</label>
                            </div>
                            <div>
                                <input type="checkbox" name="timeSlot7" id="timeSlot7" class="input-hidden">
                                <label for="timeSlot7" class="form-label label-time btn btn-outline-secondary ">8:00 - 9:00</label>
                            </div>
                        </div>
                     
                    </div>
                    <div class="mx-4">
                        <button class="btn btn-insert  status completed mt-4">Xác Nhận </button>
                    </div>
                </form>



            </div>

        </div>
    </main>
@endsection
