@extends('layouts.app')
@section('title', 'Konfirmasi Pesanan')
@section('content')
    <div class="admin-content">
    <h3>KONFIRMASI PESANAN</h3>
    <br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pembeli</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Tanggal Pesanan</th>
                <th>Detail Item</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingOrders as $ord)
                <tr>
                    <td>{{ $ord->id }}</td> <!-- Ubah order_id menjadi id -->
                    <td>{{ $ord->user->name }}</td>
                    <td>{{ $ord->total_harga }}</td>
                    <td>{{ $ord->status }}</td>
                    <td>{{ $ord->created_at }}</td>
                    <td>
                        <ul>
                            @foreach ($ord->orderItems as $item)
                                <li>{{ $item->plant->nama }} (Jumlah: {{ $item->quantity }}, Harga: {{ $item->sub_harga }})</li> <!-- Sesuaikan dengan perubahan model -->
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="/konfirmasi-pesanan/{{ $ord->id }}" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin mengkonfirmasi pesanan ini?')">KONFIRMASI</a>
                        <a href="/hapus-pesanan/{{ $ord->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection