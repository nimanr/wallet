<div class="card h-100">
    <div class="card-header">{{ $wallet->name }}</div>

    <div class="card-body h-100">
        <h4>Balance: {{ number_format($sum,0) }}</h4>
    </div>
</div>
