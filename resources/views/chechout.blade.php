<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>

<h2>Checkout</h2>

@if($items->isEmpty())
    <p>Keranjang kosong</p>
@else
    <ul>
        @foreach($items as $item)
            <li>
                {{ $item->product->name }} 
                ({{ $item->qty }}) -
                Rp {{ number_format($item->product->price) }}
            </li>
        @endforeach
    </ul>

    <p><strong>Total:</strong> Rp {{ number_format($total) }}</p>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <select name="payment_method" required>
            <option value="COD">COD</option>
            <option value="Transfer">Transfer</option>
        </select>
        <button type="submit">Checkout</button>
    </form>
@endif

</body>
</html>
