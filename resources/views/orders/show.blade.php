<h2>Struk Pembelian</h2>

@foreach($order->items as $item)
<p>{{ $item->product->name }} x {{ $item->qty }}</p>
@endforeach

<p>Total: Rp {{ number_format($order->total) }}</p>

<button onclick="window.print()">Cetak</button>
