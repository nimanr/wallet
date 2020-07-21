<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th><th>Wallet Name</th><th>Total balance</th><th>add payment</th>
    </tr>
    </thead>
@foreach($wallets as $i=>$wallet)
    <tr>
        <td>{{ $i+1 }}</td>
        <td>{{ $wallet->name }}</td>
        <td>{{ number_format($sum[$wallet->id], 0) }}</td>
        <td><a href="{{ route('CreatePayment',['wallet'=>$wallet]) }}" class="btn btn-outline-primary btn-sm">add payment</a></td>
    </tr>
@endforeach
</table>
