@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $wallet->name }}</div>

                    <div class="card-body">
                        <a href="/wallets/{{ $wallet->id }}/payments/create" class="btn btn-primary">add a payment</a>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">Payments</div>

                    <div class="card-body">
                        @include('payment.table', ['payments' => $wallet->payments])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
