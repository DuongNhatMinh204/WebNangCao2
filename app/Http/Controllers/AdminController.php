<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listAccounts()
    {
        // Lấy tất cả booking từ cơ sở dữ liệu
        $bookings = Booking::all();

        // Trả về view với dữ liệu bookings
        return view('admin_account', compact('bookings'));
    }
}