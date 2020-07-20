@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Your Total Balance is : 55000 AMD</h2>
                    <a href="/wallets/create" class="btn btn-primary">Add a new wallet</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
