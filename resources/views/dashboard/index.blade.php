@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body h-100">
                            <h3>{{ $user->name }}</h3>
                            <dl class="row">
                                <dt class="col-sm-6">Number of wallets</dt>
                                <dd class="col-sm-6">{{ count($user->wallets) }}</dd>

                                <dt class="col-sm-6">Total Balance</dt>
                                <dd class="col-sm-6">
                                    {{ $total }} $
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header">Actions</div>

                        <div class="card-body h-100">
                            <a href="{{ route('CreateWallet') }}" class="btn btn-primary">Add a wallet</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                @forelse($user->wallets as $wallet)
                    <div class="col-md-4">
                    @include('wallet.wallet',['wallet'=>$wallet, 'sum'=>$sum[$wallet->id]]);
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
