<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function total(Wallet $wallet){
        return $wallet->payments()->sum('amount');
    }

    public function index(){

        $wallets = auth()->user()->wallets()->get();
        $sum = [];
        foreach ($wallets as $wallet){
            $sum[$wallet->id] = $this->total($wallet);
        }
        return view('wallet.index', compact(['wallets', 'sum']));
    }

    public function create(){
        return view('wallet.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required'
        ]);
        $wallet = auth()->user()->wallets()->create($data);

        return redirect('/wallets/'.$wallet->id);
    }

    public function show(Wallet $wallet){

        $wallet->load('payments');
        $total = $this->total($wallet);

        return view('wallet.show', compact(['wallet','total']));
    }
}
