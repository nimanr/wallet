@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Wallets</div>
                        <div class="card-body">
                            <div class="col-md-6">
                                @if($wallets->first())
                                    @include('wallet.table',['wallets'=>$wallets, 'sum'=>$sum]);
                                @else
                                    <h3>no wallets yet</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
