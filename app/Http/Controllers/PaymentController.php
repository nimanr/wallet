<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function create(Wallet $wallet){
        return view('payment.create', compact('wallet'));
    }

    public function store(Wallet $wallet){
        $data = request()->validate([
            'amount' => 'required|numeric',
            'side' => 'required'
        ]);
        $data['amount'] = ($data['side']=='Recieved')?$data['amount']:($data['amount']*-1);
        unset($data['side']);

        $wallet->payments()->create($data);

        return redirect('/wallets/'.$wallet->id);
    }
}
