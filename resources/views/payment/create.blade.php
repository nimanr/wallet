@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a payment</div>

                    <div class="card-body">
                        <form action="/wallets/{{ $wallet->id }}/payments" method="post">

                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Amount</label>
                                    <div class="input-group mb-2">
                                        <input name="amount" type="number" min="1" class="form-control" id="inlineFormInputGroup" placeholder="amount">
                                        <div class="input-group-append">
                                            <div class="input-group-text">$</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="side" id="inlineRadio1" value="Sent">
                                        <label class="form-check-label" for="inlineRadio1">Sent</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="side" id="inlineRadio2" value="Recieved">
                                        <label class="form-check-label" for="inlineRadio2">Recieved</label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Add Payment</button>
                                </div>
                            </div>
                            @error('amount')
                            <small class="text-danger">{{ $message }}</small><br>
                            @enderror
                            @error('side')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
