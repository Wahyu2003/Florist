</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ config('app.name') }} - Admin</title> --}}
    <title>@yield('title')</title>
    <!-- CSS stylesheets -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('font.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Admin Navbar content -->
        <nav class="navbar">
            <div class="navbar-brand">
                {{-- <a href="{{ url('/') }}">{{ config('app.name') }}</a> --}}
                <a href="{{ url('/') }}">@yield('title')</a>
            </div>
            <ul class="navbar-nav">
                {{-- <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                <li><a href="{{url('admin/plants')}}">Manage Plants</a></li>
                <li><a href="{{url('admin/orders')}}">Orders</a></li>
                <li><a href="{{url('admin/users')}}">Users</a></li> --}}
                {{-- <li><a href="{{url('keranjang')}}"><img src="{{ asset('icon/keranjang.svg') }}" alt=""></a></li> --}}
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" class="btn-logout">
                            <img src="{{ asset('icon/logout.svg') }}" alt="Logout">
                        </a>
                    </li>
                @endauth
            </ul>
                <!-- <li>
                    <a href="{{url('login')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{ asset('icon/logout.svg') }}" alt="">
                    </a>
                </li>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> -->
        </nav>
    </header>

    <div class="container">
        <aside class="sidebar">
            <!-- Admin Sidebar content -->
            <ul>
                {{-- <li><a href="{{url('client')}}">Pembeli</a></li> --}}
                {{-- <li><a href="{{url('plants')}}">Keranjang</a></li> --}}
                <li><a href="{{url('plants')}}">Data Tanaman</a></li>
                <li><a href="{{url('admin')}}">Data Admin</a></li>
                <li><a href="{{url('users')}}">Data Pengguna</a></li>
                <li><a href="{{url('konfirmasi-pesanan')}}">Konfirmasi Pesanan</a></li>
                <li><a href="{{url('laporan-penjualan')}}">Laporan Penjualan</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="scroll-content">
                @yield('content') <!-- This is where the content of each page will be inserted -->
            </div>
        </main>
    </div>

    <div class="modal-overlay" id="modalLogout" style="display: none;">
        <div class="modal">
            <h2>Konfirmasi Logout</h2>
            <p>Apakah Anda yakin ingin logout?</p>
            <div class="modal-buttons">
                <button class="modal-button confirm" id="confirmLogout">Konfirmasi</button>
                <button class="modal-button cancel" id="cancelLogout">Batal</button>
            </div>
        </div>
    </div>

    <!-- JavaScript scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('css/script.js') }}"></script>
</body>
</html>