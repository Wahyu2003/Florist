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
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{ asset('icon/logout.svg') }}" alt="">
                    </a>
                </li>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                               
            </ul>
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

    <!-- JavaScript scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('css/script.js') }}"></script>
</body>
</html>