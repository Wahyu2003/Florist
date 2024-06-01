@extends('welcome')
@section('title', 'Belanja')
@section('content')
<section id="shop">
    <div class="layout">
        <div class="search">
            <form action="{{ route('shop.cari') }}" method="GET">
                <input type="text" id="search-input" name="cari" placeholder="Cari Produk .." value="{{ request('cari') }}">
                <input type="submit" value="CARI">
            </form>
            <div id="search-results"></div>
        </div>
        <div id="plants-container">
            @foreach($plants as $kategori_tanaman => $items)
                <h1>{{ $kategori_tanaman }}</h1>
                <div class="card-container">
                    @foreach($items as $plant)
                        <div class="card">
                            <img src="{{ asset('images/' . $plant->image_tanaman) }}" alt="{{ $plant->nama_tanaman }}">
                            <div class="card-info">
                                <h2>{{ $plant->nama_tanaman }}</h2>
                                <p class="price">Rp {{ number_format($plant->harga_tanaman, 0, ',', '.') }}</p>
                                <button class="btn-detail">Detail</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-input').on('keyup', function() {
        var query = $(this).val();
        if (query.length > 2) { // Mulai pencarian setelah pengguna mengetik lebih dari 2 karakter
            $.ajax({
                url: "{{ route('shop.ajaxCari') }}",
                type: "GET",
                data: {'cari': query},
                success: function(data) {
                    $('#search-results').empty();
                    if (data.length > 0) {
                        data.forEach(function(plant) {
                            $('#search-results').append(`
                                <div class="card">
                                    <img src="{{ asset('images/') }}/` + plant.image_tanaman + `" alt="` + plant.nama_tanaman + `">
                                    <div class="card-info">
                                        <h2>` + plant.nama_tanaman + `</h2>
                                        <p class="price">Rp ` + new Intl.NumberFormat('id-ID').format(plant.harga_tanaman) + `</p>
                                        <button class="btn-detail">Detail</button>
                                    </div>
                                </div>
                            `);
                        });
                    } else {
                        $('#search-results').append('<p>Tanaman tidak ditemukan</p>');
                    }
                }
            });
        } else {
            $('#search-results').empty();
        }
    });
});
</script>
@endsection
