<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florist Landing Page</title>
    <link rel="stylesheet" href="combine.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Florist</a>
        <div class="menu-toggle" id="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <nav id="main-nav">
            <a href="#home">Home</a>
            <a href="#shop">Shop</a>
            <a href="#about">About</a>
            <a href="{{ route('login') }}">Login</a>
        </nav>
    </header>

    <section id="home">
        <div class="layouts">
            <div class="right">
                <h1>Florist</h1>
                <h6>Kembangkan Keindahan dengan Bunga</h6>
                <p>"Dapatkan pengalaman berbelanja yang memuaskan dengan layanan pelanggan kami yang ramah dan responsif. Kami selalu siap membantu Anda menciptakan momen yang tak terlupakan."</p>
                <p><a href="#" class="beli">Beli Sekarang</a></p>
            </div>
            <div class="left">
                <img src="logo_florist.png" alt="">
            </div>
        </div>
    </section>

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
                                <h2>{{ $plant->nama }}</h2>
                                <p class="price">Rp {{ number_format($plant->harga, 0, ',', '.') }}</p>
                                <button class="btn-detail">Detail</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    <section id="about">
        <div class="visimisi">
            <div class="column">
                <h1>Visi</h1>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis nobis, eaque ipsa, sunt praesentium nisi possimus</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis nobis, eaque ipsa, sunt praesentium nisi possimus</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis nobis, eaque ipsa, sunt praesentium nisi possimus</li>
                </ul>
            </div>
            <div class="column">
                <h1>Misi</h1>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis nobis, eaque ipsa, sunt praesentium nisi possimus</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis nobis, eaque ipsa, sunt praesentium nisi possimus</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis nobis, eaque ipsa, sunt praesentium nisi possimus</li>
                </ul>
            </div>
        </div>
        <div class="hubungikami">
            <h1>Hubungi Kami</h1>
            <p>WhatsApp: <a href="#">wa.link</a></p>
            <p>Facebook: <a href="#">fb.link</a></p>
            <p>Email: <a href="#">email.link</a></p>
        </div>
    </section>

    <div id="login-modal" class="modal">
        
        <div class="modal-content">
            <span class="close" id="close-modal">&times;</span>
            <h2>Login</h2>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
            <h3>Hanya admin yang bisa login di web</h3>
            <h4>Bukan admin?.. Silahkan <a href="#">download</a> aplikasi</h4>
        </div>
    </div>

    <script src="combine.js"></script>
</body>
</html>