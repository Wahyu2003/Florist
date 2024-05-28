@extends('layouts.app')
@section('title', 'Laporan Penjualan')
@section('content')
    <div class="admin-content">
    <h3>LAPORAN PENJUALAN</h3>
    <br>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pembeli</th>
                <th>Total Harga</th>
                <th>Tanggal Pesanan</th>
                <th>Detail Item</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($completedOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td> <!-- Ubah order_id menjadi id -->
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->total_harga }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <ul>
                            @foreach ($order->orderItems as $item)
                                <li>{{ $item->plant->nama }} (Jumlah: {{ $item->quantity }}, Harga: {{ $item->sub_harga }})</li> <!-- Sesuaikan dengan perubahan model -->
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection