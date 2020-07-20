<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index(){
        $user = Auth::user();
        $user->load('wallets', 'wallets.payments');
        $sum = [];
        foreach($user->wallets as $wallet){
            $sum[$wallet->id]=0;
            foreach($wallet->payments as $payment){
                $sum[$wallet->id]+=$payment->amount;
            }
        }

        $total = array_sum($sum);

        return view('dashboard.index', compact(['user', 'sum', 'total']));
    }
}
