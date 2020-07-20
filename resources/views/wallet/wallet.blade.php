<div class="card h-100">
    <div class="card-header">{{ $wallet->name }}</div>

    <div class="card-body h-100">
        <h4>Balance: {{ number_format($sum,0) }}</h4>
        <a href="{{ route('GoToWallet',['wallet'=>$wallet]) }}" class="btn btn-outline-primary btn-sm">Go to wallet</a>
        <a href="{{ route('CreatePayment',['wallet'=>$wallet]) }}" class="btn btn-outline-primary btn-sm">Add payment to this wallet</a>
    </div>
</div>
