@extends('welcome')
@section('title', 'Belanja')
@section('content')
<section id="shop">
    <div class="layout">
        <div class="search">
            <form action="/shop/cari" method="GET">
                <input type="text" name="cari" placeholder="Cari Produk .." value="{{ old('cari') }}">
                <input type="submit" value="CARI">
            </form>
        </div>
        @foreach($plants as $kategori_tanaman => $items)
            <h1>{{ $kategori_tanaman }}</h1>
            <div class="card-container">
                @foreach($items as $plant)
                    <div class="card">
                        <img src="{{ asset('images/' . $plant->image_tanaman) }}">
                        <div class="card-info">
                            <h2>{{ $plant->nama_tanaman }}</h2>
                            <p class="price">Rp {{ number_format($plant->harga, 0, ',', '.') }}</p>
                            <button class="btn-detail">Detail</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>
@endsection
