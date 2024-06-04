@extends('layouts.app')
@section('title', 'Riwayat Penjualan')
@section('content')
    <div class="admin-content">
    <h3>LAPORAN PENJUALAN</h3>
    <h3 class="price">Total Pendapatan: Rp{{ number_format($totalPendapatan, 0, ',', '.') }},-</h3>
    <br>
    <form method="GET" action="{{ route('laporan.penjualan') }}" class="form-inline">
        <div class="form-row">
            <div class="col-md-4">
                <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai" value="{{ request()->get('start_date') }}">
            </div>
            <div class="col-md-4">
                <input type="date" name="end_date" class="form-control" placeholder="Tanggal Selesai" value="{{ request()->get('end_date') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="/laporan-penjualan" class="btn btn-success">Refresh</a>
            </div>
        </div>
    </form>
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
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->total_harga }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <ul>
                            @foreach ($order->orderItems as $item)
                                <li>{{ $item->plant->nama_tanaman }} (Jumlah: {{ $item->quantity }}, Harga: {{ $item->sub_harga }})</li> <!-- Sesuaikan dengan perubahan model -->
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection