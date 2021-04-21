<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReservationRequest;

use \App\Reservation;

class ReservationsController extends Controller
{
     public function create() {

        return view('users.store');

    }
    
    public function store(ReservationRequest $request) {

        $request->user()->reservations()->create([
        'reserve_start' => $request->reserve_start,
        'reserve_end' => $request->reserve_end
        
        ]);
        return back()->with('result', '予約が完了しました。');
    }
}
