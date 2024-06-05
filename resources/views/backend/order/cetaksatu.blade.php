<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Penjualan</title>
    <link href="{{ asset('css/cetak.css') }}" rel="stylesheet">
    <link href="{{ asset('font.css') }}" rel="stylesheet">
</head>

<body>
    <div class="layout">
        <h1 class="judulhead">Laporan DetailPenjualan</h1>
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
        <h4>ID Pesanan: {{ $order->id }}</h4>
        <h4>Nama Pembeli: {{ $order->user->name }}</h4>
        <h4>Tanggal Pesanan: {{ $order->created_at->format('d-m-Y') }}</h4>
        <table>
            <thead>
                <tr>
                    <th>Nama Tanaman</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->plant->nama_tanaman }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->sub_harga }}</td>
                        <td>Rp{{ number_format($order->orderItems->sum('sub_harga'), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Total Harga</td>
                    <td class="total">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
{{-- <script>
    window.print();
</script> --}}

</html>
