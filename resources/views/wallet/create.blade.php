@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a wallet</div>

                    <div class="card-body">
                        <form action="/wallets" method="post">

                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Wallet Name</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Wallet Name</div>
                                        </div>
                                        <input name="name" type="text" class="form-control" id="inlineFormInputGroup" placeholder="Wallet Name">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Add wallet</button>
                                </div>
                            </div>
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
