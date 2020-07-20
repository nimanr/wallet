@if(!$payments->isEmpty())
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th><th>Sent</th><th>Recieved</th><th>Date</th><th>time</th>
        </tr>
        </thead>
    @forelse($payments as $i=>$payment)
        <tr>
            <td>{{ $i+1 }}</td>
            @if($payment->amount<0)
                <td>{{ number_format($payment->amount*-1, 0) }}</td>
                <td>&nbsp;</td>
            @else
                <td>&nbsp;</td>
                <td>{{ number_format($payment->amount, 0) }}</td>
            @endif
            <td>{{ substr($payment->created_at,0,10) }}</td>
            <td>{{ substr($payment->created_at,11) }}</td>
        </tr>
    @endforeach
        <tfoot>
        <tr>
            <td colspan="5">Total: <strong>{{ number_format($total, 0) }}</strong></td>
        </tr>
        </tfoot>
    </table>
@else
    <p>No payment in this wallet yet</p>
@endif
