@extends('layouts.app')
@section('title', 'Laporan Penjualan')
@section('content')
    <div class="admin-content">
    <h3>RIWAYAT PENJUALAN</h3>
    <br>
    <form method="GET" action="{{ route('laporan.penjualan') }}">
        <div class="form-row d-flex">
            <div class="col-md-4">
                <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai" value="{{ request()->get('start_date') }}">
                <input type="date" name="end_date" class="form-control" placeholder="Tanggal Selesai" value="{{ request()->get('end_date') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="/laporan-penjualan" class="btn btn-success">Refresh</a>
                <a href="{{ route('laporan.penjualan.cetaksemua') }}" class="btn btn-danger" target="_blank" rel="noopener noreferrer">cetak</a>
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
                <th>Opsi</th>
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
                    <td><a class="btn btn-danger" href="{{ route('laporan.penjualan.cetaksatu', ['id' => $order->id]) }}" target="_blank" rel="noopener noreferrer">Cetak</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        <h3>Total Pendapatan: Rp{{ $totalPendapatan }} ,-</h3>
    </div>
</div>
@endsection