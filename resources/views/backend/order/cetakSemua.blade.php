<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Penjualan</title>
    <link href="{{ asset('css/cetak.css') }}" rel="stylesheet">
    <link href="{{ asset('font.css') }}" rel="stylesheet">
</head>

<body>
    <div class="layout">
        <h1 class="judulhead">Laporan Semua Penjualan</h1>
        <div class="nota">
            <div class="img">
                <img src="{{ asset('icon/logo_florist.png')}}" title="logo florist">
            </div>
            <div class="judul">
                <h2>Florist</h2>
                <p>jl.mastrip no 73 sumberkasih rawa indah</p>
                <p>08263762782819</p>
            </div>
        </div>
        <hr>
        <p>Periode: {{ $start_date }} - {{ $end_date }}</p>

        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pengguna</th>
                    <th>Tanggal Pesanan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($completedOrders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                        <td>Rp{{ number_format($order->orderItems->sum('sub_harga'), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Total Pendapatan</td>
                    <td class="total">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    
</body>
{{-- <script>
    window.print();
</script> --}}

</html>
