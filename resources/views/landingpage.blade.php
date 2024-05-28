<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Florist</title>
    <link rel="stylesheet" href="landing.css" />
</head>

<body>
    <section id="home">
        <div class="nav">
            <div class="logo">
                <img src="icon/logo_florist.png" alt="Florist Logo">
                <h3>Florist</h3>
            </div>
            <ul class="navigate">
                <li><a href="#home">HOME</a></li>
                <li><a href="#shop">SHOP</a></li>
                <li><a href="#about">ABOUT</a></li>
                <li><button id="loginBtn">LOGIN</button></li>
            </ul>
        </div>
        <div class="hero">
            <img src="mentahan/langit.png" class="last-img" alt="">
            <img src="mentahan/awan.png" class="cloud-img" alt="">
            <img src="mentahan/kumpulanburung.png" class="bird-img" alt="">
            <img src="mentahan/rumputsamping.png" class="rumputs-img" alt="">
            <img src="mentahan/pohon.png" class="pohon-img" alt="">
            <img src="mentahan/daun.png" class="daun-img" alt="">
            <img src="mentahan/daun2.png" class="daun-img2" alt="">
            <img src="mentahan/daun.png" class="daun-img3" alt="">
            <img src="mentahan/daun2.png" class="daun-img4" alt="">
            <img src="mentahan/toko.png" class="mid-img" alt="">
            <img src="mentahan/orang.png" class="focus-img" alt="">
            <img src="mentahan/rumputdepan1.png" class="focus-img" alt="">
            <img src="mentahan/kupukupu.png" class="kupu-img" alt="">
            <img src="mentahan/serbukdandelion.png" class="serbuk-img" alt="">
            <img src="mentahan/serbukdandelion.png" class="serbuk-img1" alt="">
            <img src="mentahan/serbukdandelion.png" class="serbuk-img2" alt="">
            <img src="mentahan/serbukdandelion.png" class="serbuk-img3" alt="">
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
            @foreach ($plants as $kategori_tanaman => $items)
                <h1>{{ $kategori_tanaman }}</h1>
                <div class="card-container">
                    @foreach ($items as $plant)
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
    </section>

    <section id="about">
        <div class="about-container">
            <h1>Tentang Kami</h1>
            <p>Selamat datang di Florist, destinasi terbaik untuk semua kebutuhan bunga Anda. Kami memiliki kegembiraan
                untuk membawa keindahan alam ke dalam hidup Anda melalui koleksi bunga dan tanaman yang eksklusif.</p>
            <p>Di Florist, kami memahami pentingnya setiap momen, baik itu perayaan kegembiraan maupun momen pengingat
                yang tulus. Itulah mengapa kami berusaha untuk menyediakan bunga-bunga segar terbaik dan rangkaian bunga
                yang paling menakjubkan untuk memenuhi setiap kebutuhan.</p>
            <p>Tim ahli tukang bunga kami berdedikasi untuk menciptakan desain-desain unik yang menangkap essensi dari
                setiap bunga, menciptakan rangkaian yang memukau dan tak terlupakan.</p>
            <p>Baik Anda mencari buket sempurna untuk menyemarakkan hari seseorang atau dekorasi bunga yang elegan untuk
                acara spesial Anda, Florist hadir untuk mewujudkan visi bunga Anda.</p>
        </div>
    </section>

    <div class="cs" title="Hubungi Kami" id="iconButton">
        <img id="chatIcon" src="icon/chat.png" alt="chat" />
        <h2 id="chatText">chat</h2>
    </div>
    <div id="icons">
        <a href="#" class="icon" id="igIcon" title="instagram"><img src="icon/ig.png" alt=""></a>
        <a href="#" class="icon" id="fbIcon" title="facebook"><img src="icon/fb.png" alt=""></a>
        <a href="#" class="icon" id="emailIcon" title="email"><img src="icon/email.png" alt=""></a>
        <a href="#" class="icon" id="waIcon" title="whatsapp"><img src="icon/wa.png" alt=""></a>
    </div>
    


    <div id="login-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-modal">&times;</span>
            <div class="layout-login">
                <div class="login-container">
                    <h2>Login</h2>
                    <form method="POST" action="/login">
                        @csrf
                        <input type="username" name="username" placeholder="Username" required><br>
                        <input type="password" name="password" placeholder="Password" required><br>
        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="submit" value="Login">
                    </form>
                    <h3>Hanya admin yang bisa login di web</h3>
                    <h4>Bukan admin?.. Silahkan <a href="#">download</a> aplikasi</h4>
                </div>
            </div>
        </div>
    </div>
    <script src="landing.js"></script>
</body>

</html>
