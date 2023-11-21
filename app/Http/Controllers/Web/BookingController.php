<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Lichhen;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:100', 'email'],
            'phone' => ['required', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8,9})\b/'],
            'date' => ['required'],
            'time' => ['required'],
            'note' => []
        ], [
            'name' => [
                'required' => __('The name field is required.'),
            ]
        ]);

        $booking = Lichhen::create([
            'tenkhachhang' => $request->name,
            'sodienthoai' => $request->phone,
            'email' => $request->email,
            'ngayhen' => date('Y-m-d', strtotime($request->date)),
            'thoigianhen' => date('H:i', strtotime($request->time)),
            'ghichu' => $request->note
        ]);

        if (!$booking) {
            return redirect()->route('booking')->with('danger', 'It have error when sign up!');
        }


        return redirect()->route('booking')->with('toast_success', 'Booking success');
    }
}
