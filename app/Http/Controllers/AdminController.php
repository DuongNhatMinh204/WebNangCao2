<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showBookings()
    {
        $bookings = Booking::all(); // Lấy tất cả dữ liệu từ bảng bookings
        return view('admin_booking', compact('bookings'));
    }
    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully!');
    }

}