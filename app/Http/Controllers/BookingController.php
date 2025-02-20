<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{
    
    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để đặt chuyến đi');
        }

        // Validate dữ liệu nhập vào
        $validated = $request->validate([
            'palaceName' => 'required|string|max:255',
            'numberOfPeople' => 'required|integer',
            'checkinTime' => 'required|date',
            'checkoutTime' => 'required|date|after:checkinTime',
            'hotel' => 'required|string',
        ]);

        // Tạo mới booking và lưu vào cơ sở dữ liệu
        $booking = Booking::create([
            'palaceName' => $validated['palaceName'],
            'numberOfPeople' => $validated['numberOfPeople'],
            'checkinTime' => $validated['checkinTime'],
            'checkoutTime' => $validated['checkoutTime'],
            'hotel' => $validated['hotel'],
            'user_id' => Auth::id(),
        ]);

        // Chuyển hướng người dùng đến trang thành công hoặc thông báo
        return redirect()->route('plan-trip')->with('success', 'Booking successful');
    }
    public function getBookingDetails()
    {
        // Lấy danh sách chuyến đi từ cơ sở dữ liệu
        $bookings = Booking::all();

        // Trả về JSON để sử dụng trong JavaScript
        return response()->json($bookings);
    }
    public function delete($id)
    {
        try {
            // Kiểm tra bản ghi có tồn tại hay không
            $booking = Booking::find($id);

            if (!$booking) {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy chuyến đi này'], 404);
            }

            // Xóa bản ghi
            $booking->delete();

            return response()->json(['success' => true, 'message' => 'Hủy chuyến thành công']);
        } catch (\Exception $e) {
            // Log lỗi nếu có
            \Log::error('Lỗi khi hủy chuyến:', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi hủy chuyến',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
