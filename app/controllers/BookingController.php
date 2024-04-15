<?php
namespace App\Controllers;


class BookingController extends BaseController
{
    public function __construct()
    {
        // $this->booking = new BookingModel();
    }

    public function index()
    {
        return $this->render('admin.booking.list');
    }
}