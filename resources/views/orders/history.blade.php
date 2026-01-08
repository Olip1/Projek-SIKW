
<h2>History Pesanan</h2>

@foreach($orders as $order)
<div class="bg-white p-4 rounded shadow mb-4">
    <p>Order #{{ $order->id }}</p>
    <p>Total: Rp {{ number_format($order->total) }}</p>
    <p>Metode: {{ $order->payment_method }}</p>

    <a href="{{ route('orders.show', $order->id) }}"
       class="text-blue-500 underline">
        Cetak Struk
    </a>
</div>
@endforeach
