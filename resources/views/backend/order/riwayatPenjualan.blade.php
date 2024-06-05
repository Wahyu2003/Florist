@extends('layouts.app')
@section('title', 'Laporan Penjualan')
@section('content')
    <div class="admin-content">
        <h3>RIWAYAT PENJUALAN</h3>
        <h3 class="price">Total Pendapatan: Rp {{ number_format($totalPendapatan, 0, ',', '.') }} ,-</h3>
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
                    <a href="{{ route('laporan.penjualan.cetaksemua', ['start_date' => request()->get('start_date'), 'end_date' => request()->get('end_date')]) }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Cetak All</a>
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
                        <td class="price">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>
                            <ul>
                                @foreach ($order->orderItems as $item)
                                    <li>{{ $item->plant->nama_tanaman }} (Jumlah: {{ $item->quantity }}, Harga: Rp {{ number_format($item->sub_harga, 0, ',', '.') }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td><a class="btn btn-danger" href="{{ route('laporan.penjualan.cetaksatu', ['id' => $order->id]) }}" target="_blank" rel="noopener noreferrer">Cetak</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
