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
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $reservations = \App\Reservation::orderBy('created_at', 'desc')->paginate(20);
            $data = [
                'user' => $user,
                'reservations' => $reservations,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('managers.index', $data);
    }
    
    public function store(ReservationRequest $request) 
    {
        $request->user()->reservations()->create([
        'reserve_start' => $request->reserve_start,
        'reserve_end' => $request->reserve_end
        ]);
        return back()->with('result', '予約を受け付けました。');
    }
    
    public function destroy($id)
    {
        $reservation = \App\Reservation::findOrFail($id);
        $reservation->delete();

        return back()->with('success', '削除完了しました');
    }
}
