@extends('layouts.app') {{-- Atau layout dashboard spesifik Anda --}}

@section('title', 'Sambung Niaga')

@section('styles')
    {{-- Salin gaya dari blok <style> sambung-niaga.html ke file CSS --}}
    {{-- dan tautkan di sini atau letakkan langsung di tag <style> jika kecil --}}
    <style>
      /* Tempel CSS dari sambung-niaga.html di sini atau tautkan ke file eksternal */
      /* Pastikan semua path gambar di CSS menggunakan helper asset yang sesuai jika lokal */
      body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background-color: #f0f0f0;
      }
      .heading {
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;
        background-color: #2e7d32;
        color: white;
        margin: 0;
        padding: 15px;
      }
      .heading img {
        margin-right: 10px;
      }
      .heading-text {
        font-family: "poppins";
        font-weight: bold;
        font-size: 2rem;
        margin: 0;
      }
      .container-content {
        margin: 20px 10%;
      }
      .product {
        display: flex;
        flex-direction: row;
        margin: 30px 0;
        align-items: center;
        background-color: #fff; /* Latar belakang ditambahkan untuk kejelasan */
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      .product .img {
        min-width: 220px;
        min-height: 220px;
        max-width: 220px;
        max-height: 220px;
        border-radius: 20px;
        margin-right: 20px;
        object-fit: cover;
      }
      .product h1 {
        margin: 5px 10px;
        font-family: "Poetsen One", sans-serif;
        font-size: 2rem;
        color: #2e7d32;
        background-color: #ffeb3b;
        padding: 5px 10px;
        border-radius: 10px;
        width: fit-content;
        font-weight: normal;
      }
      .product p {
        margin: 5px 10px;
        font-family: "Poppins", sans-serif;
        font-size: 1rem;
        color: #333;
        max-width: 700px;
        text-align: justify;
      }

      .product .contact-icons img {
        margin-left: 10px;
        padding: 5px;
        width: 30px;
        height: 30px;
        transition: transform 0.3s ease;
        background-color: #2e7d32;
        border-radius: 10px;
        cursor: pointer;
      }

      .product .contact-icons img:hover {
        transform: scale(1.1);
      }

      @media (max-width: 768px) {
        .product {
          flex-direction: column;
          align-items: center;
        }
        .product .img {
          margin-right: 0;
          margin-bottom: 15px;
          min-width: 200px;
          min-height: 200px;
        }
        .product h1 {
          align-self: center;
          font-size: 1.5rem;
        }
        .product p {
          text-align: center;
          font-size: 0.9rem;
        }
        .product .contact-icons {
          text-align: center;
        }
      }

      .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.6);
      }

      .modal-dialog {
        background-color: #2e7d32;
        color: white;
        margin: 15% auto;
        padding: 30px 20px;
        border-radius: 15px;
        width: 85%;
        max-width: 380px;
        text-align: center;
        font-family: "Poppins", sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      }

      .modal-icon-whatsapp,
      .modal-icon-instagram {
        width: 60px;
        height: 60px;
        margin-bottom: 20px;
      }

      .modal-text {
        font-size: 1.1rem;
        margin-bottom: 25px;
        line-height: 1.5;
      }

      .modal-button-proceed {
        background-color: white;
        color: #2e7d32;
        font-family: "Poppins", sans-serif;
        font-weight: bold;
        font-size: 1rem;
        padding: 12px 30px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.2s ease;
      }

      .modal-button-proceed:hover {
        background-color: #f0f0f0;
      }
    </style>
@endsection

@section('content')
    <div class="heading">
      <img src="{{ asset('img/Shop-icon.png') }}" alt="ikon toko" width="40" height="40" />
      <p class="heading-text">Sambung Niaga</p>
    </div>

    <div class="container-content">
      <div class="content">
        @if($products->isEmpty())
            <p>Tidak ada produk tersedia saat ini.</p>
        @else
            @foreach($products as $product)
            <div class="product">
              <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="img" />
              <div>
                <h1>{{ $product->name }}</h1>
                <p style="font-weight: bold;">{{ $product->location_city }}</p>
                <p>{{ $product->description }}</p>
                <div class="contact-icons">
                  @if($product->whatsapp_link)
                  <img src="{{ asset('img/WhatsApp.png') }}" alt="WhatsApp" class="contact-link-wa" data-link="{{ $product->whatsapp_link }}"/>
                  @endif
                  @if($product->instagram_link)
                  <img src="{{ asset('img/Instagram.png') }}" alt="Instagram" class="contact-link-ig" data-link="{{ $product->instagram_link }}"/>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
        @endif
      </div>
    </div>

    <div id="whatsappPopup" class="modal">
      <div class="modal-dialog">
        <img src="{{ asset('img/WhatsApp.png') }}" alt="Ikon WhatsApp" class="modal-icon-whatsapp"/>
        <p class="modal-text">Lanjut Menghubungi pemasok Melalui WhatsApp</p>
        <button id="proceedWhatsappBtn" class="modal-button-proceed">Lanjutkan</button>
      </div>
    </div>

    <div id="instagramPopup" class="modal">
      <div class="modal-dialog">
        <img src="{{ asset('img/Instagram.png') }}" alt="Ikon Instagram" class="modal-icon-instagram"/>
        <p class="modal-text">Lanjut Menghubungi pemasok Melalui Instagram</p>
        <button id="proceedInstagramBtn" class="modal-button-proceed">Kunjungi</button>
      </div>
    </div>
@endsection

@section('scripts')
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const whatsappPopup = document.getElementById("whatsappPopup");
    const instagramPopup = document.getElementById("instagramPopup");

    const proceedWhatsappBtn = document.getElementById("proceedWhatsappBtn");
    const proceedInstagramBtn = document.getElementById("proceedInstagramBtn");

    const whatsappTriggers = document.querySelectorAll(".contact-link-wa");
    const instagramTriggers = document.querySelectorAll(".contact-link-ig");

    let currentWhatsappLink = '';
    let currentInstagramLink = '';

    whatsappTriggers.forEach((trigger) => {
      trigger.addEventListener("click", (event) => {
        event.preventDefault();
        currentWhatsappLink = event.currentTarget.dataset.link;
        whatsappPopup.style.display = "block";
      });
    });

    instagramTriggers.forEach((trigger) => {
      trigger.addEventListener("click", (event) => {
        event.preventDefault();
        currentInstagramLink = event.currentTarget.dataset.link;
        instagramPopup.style.display = "block";
      });
    });

    proceedWhatsappBtn.onclick = () => {
      if(currentWhatsappLink) window.open(currentWhatsappLink, "_blank");
      whatsappPopup.style.display = "none";
    };

    proceedInstagramBtn.onclick = () => {
      if(currentInstagramLink) window.open(currentInstagramLink, "_blank");
      instagramPopup.style.display = "none";
    };

    window.addEventListener("click", (event) => {
      if (event.target === whatsappPopup) {
        whatsappPopup.style.display = "none";
      }
      if (event.target === instagramPopup) {
        instagramPopup.style.display = "none";
      }
    });
  });
</script>
@endsection