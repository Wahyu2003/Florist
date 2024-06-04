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
                    <td>{{ $ord->id }}</td> 
                    <td>{{ $ord->user->name }}</td>
                    <td>{{ $ord->total_harga }}</td>
                    <td>{{ $ord->status }}</td>
                    <td>{{ $ord->created_at }}</td>
                    <td>
                        <ul>
                            @foreach ($ord->orderItems as $item)
                                <li>{{ $item->plant->nama_tanaman }} (Jumlah: {{ $item->quantity }}, Harga: {{ $item->sub_harga }})</li> <!-- Sesuaikan dengan perubahan model -->
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="/konfirmasi-pesanan/{{ $ord->id }}" class="btn btn-success btn-confirm">Konfirmasi</href=>
                        <a href="/hapus-pesanan/{{ $ord->id }}" class="btn btn-danger btn-lg btn-delete">Batalkan</href=>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <h2>Konfirmasi Hapus</h2>
            <p>Apakah Anda yakin ingin menghapus pesanan ini?</p>
            <div class="modal-buttons">
                <button class="modal-button confirm" id="confirmDelete">Hapus</button>
                <button class="modal-button cancel" id="cancelDelete">Batal</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modalPesanan">
        <div class="modal">
            <h2>Konfirmasi Pesanan</h2>
            <p>Apakah Anda yakin ingin mengkonfirmasi pesanan ini?</p>
            <div class="modal-buttons">
                <button class="modal-button confirm" id="confirmPesanan">Konfirmasi</button>
                <button class="modal-button cancel" id="cancelPesanan">Batal</button>
            </div>
        </div>
    </div>
</body>
@endsection