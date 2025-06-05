@extends('layouts.guest')

@section('title', 'Selamat Datang di SiDamen')

@section('styles')
    {{-- Tautkan ke CSS halaman landing spesifik Anda --}}
    {{-- Asumsikan Anda memindahkan blok <style> landing.html ke file CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing-style.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('img/logo Sidamen.png') }}" alt="Logo Sidamen" />
            <p>Si <span>Damen</span></p>
        </div>

        <div class="nav-links">
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#features">Fitur</a></li>
            <li><a href="#news">Berita</a></li>
          </ul>
        </div>

        @guest <div class="login">
              <a href="{{ route('login') }}" class="login-button">Login</a>
            </div>
        @endguest
        @auth <a href="{{ route('dashboard') }}"> <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="profil" class="profile">
            </a>
            @endauth
    </div>

    <div id="home">
        <div class="content-home">
          <h1>SELAMAT DATANG DI SI <span>DAMEN</span></h1>
          <h2>Petani Cerdas, Panen Berkualitas</h2>
          <p>
            Dapatkan rekomendasi tanaman, analisis tanah & iklim, serta estimasi
            panen secara real-time melalui sistem informasi berbasis peta
            digital. Si Damen hadir untuk meningkatkan efisiensi dan hasil
            pertanian Indonesia.
          </p>
          @guest
            <a href="{{ route('login') }}"><button>Mulai</button></a>
          @else
             <a href="{{ route('dashboard') }}"><button>Dashboard</button></a>
          @endguest
        </div>
    </div>

    {{-- ... bagian lain (Tentang Kami, Fitur, Berita, Footer) ... --}}
    {{-- Ingatlah untuk menggunakan asset() untuk semua path gambar --}}
    {{-- contoh: <img src="{{ asset('img/carrot.png') }}" ... /> --}}
    {{-- Gambar item berita bersifat eksternal, jadi tidak masalah apa adanya --}}

</div>
@endsection