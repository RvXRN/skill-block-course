<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'], 'https://manufactured-retailer-isle-handbook.trycloudflare.com')
    <style>
        /* Kustomisasi untuk kursor berkedip */
        .cursor {
            border-right: 2px solid white;
            animation: blink 0.7s step-end infinite;
            white-space: nowrap;
            overflow: hidden;
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }
          .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            background-color: white;
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #4A4A4A;
        }
        .card-value {
            font-size: 32px;
            font-weight: bold;
            color: #1D4ED8;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="flex w-full h-15 justify-between items-center bg-slate-300">
            <div class="flex items-center ">
                <img src="{{ asset('img/logo.png') }}" alt="" class="w-19" srcset="">
                <span class="font-bold text-2xl">SKILLBLOCK</span>
            </div>
            <div class=" hidden md:flex lg:flex font-bold">
                <a class="hover:bg-blue-300 lg:px-4 lg:py-2 md:px-4 md:py-2 rounded-xl hover:text-white" href="#">Beranda</a> 
                <a class="hover:bg-blue-300 lg:px-4 lg:py-2 md:px-4 md:py-2 rounded-xl hover:text-white" href="#">Tentang</a>
                <a class="hover:bg-blue-300 lg:px-4 lg:py-2 md:px-4 md:py-2 rounded-xl hover:text-white" href="#">Tentang</a>
                <a class="hover:bg-blue-300 lg:px-4 lg:py-2 md:px-4 md:py-2 rounded-xl hover:text-white" href="/login">Masuk</a>
                <a class="hover:bg-blue-300 lg:px-3 lg:py-2 md:px-4 md:py-2 rounded-xl hover:text-white" href="/register">Daftar</a>
            </div>
        </header>
        <section class="bg-[url('/img/sec-one.jpg')] bg-cover bg-center w-full h-[91.9vh] flex flex-col justify-center items-center">
             <div class="text-center">
    
        <h1 id="typed-title" class="text-4xl font-bold text-white cursor"></h1>
        <h3 id="typed-text" class="text-lg text-white cursor mt-4"></h3>
    </div>
    <a href="dashboard" class="bg-slate-400 px-3 py-2 mt-6 rounded text-2xl hover:bg-blue-300 hover:text-white font-bold">Mulai Sekarang</a>
     </section>
    <section class="w-full h-140 font-bold mt-5">
        <h2 class="text-3xl text-center ">Tentang</h2>
        <p class="text-center mt-4">Platform e-learning yang memungkinkan Anda berinteraksi dengan guru dan teman sekelas, meskipun Anda tidak <br>berada di ruang kelas yang sama. Dirancang untuk meningkatkan pembelajaran melalui pelajaran interaktif, diskusi, dan penilaian</p>
        <div class="grid grid-cols-2 mt-6 gap-8 p-8">
        <!-- Card User -->
        <div class="card">
            <div class="card-title">Total Users</div>
            <div id="user-count" class="card-value">0</div>
        </div>

        <!-- Card Mapel -->
        <div class="card">
            <div class="card-title">Total Mata Pelajaran</div>
            <div id="mapel-count" class="card-value">0</div>
        </div>
    </div>
    </section>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script>
   // Elemen-elemen HTML
const titleElement = document.getElementById("typed-title");
const textElement = document.getElementById("typed-text");

// Teks yang ingin ditampilkan
const titleText = "SKILL BLOCK";
const subtitleText = "E-learning memungkinkan Anda berkomunikasi langsung dengan guru dan teman sekelas, bahkan jika Anda tidak berada di kelas yang sama.";

// Kecepatan mengetik dan menghapus
const typingSpeed = 100;  // Kecepatan mengetik (ms per karakter)
const deletingSpeed = 50; // Kecepatan menghapus (ms per karakter)
const pauseTime = 1500;   // Waktu tunggu setelah mengetik selesai

// Fungsi mengetik (typing effect)
function typeWriter(element, text, cursorElement, callback) {
    let i = 0;
    element.textContent = '';  // Pastikan teks kosong sebelum mengetik

    function type() {
        if (i < text.length) {
            element.textContent += text.charAt(i); // Menambahkan satu karakter
            i++;
            setTimeout(type, typingSpeed); // Delay antar karakter
        } else {
            setTimeout(callback, pauseTime); // Tunggu sebelum menghapus
        }
    }
    type();

    // Menambahkan kursor untuk elemen yang mengetik
    cursorElement.classList.add("cursor");
}

// Fungsi menghapus (deleting effect)
function deleteWriter(element, callback, cursorElement) {
    let currentText = element.textContent;
    let i = currentText.length;

    function erase() {
        if (i > 0) {
            element.textContent = currentText.substring(0, i); // Menghapus satu karakter
            i--;
            setTimeout(erase, deletingSpeed); // Delay antar karakter
        } else {
            setTimeout(callback, pauseTime); // Tunggu setelah selesai menghapus
            cursorElement.classList.remove("cursor"); // Hapus kursor setelah selesai
        }
    }
    erase();
}

// Fungsi untuk animasi judul (SKILL BLOCK) - hanya sekali dan tidak dihapus
function startTitleAnimation() {
    typeWriter(titleElement, titleText, titleElement, function() {
        // Tidak ada penghapusan untuk titleElement, jadi kursor tetap hilang
        titleElement.classList.remove("cursor"); // Hapus kursor setelah selesai mengetik
    });
}

// Fungsi untuk animasi deskripsi (terus berulang)
function startSubtitleAnimation() {
    typeWriter(textElement, subtitleText, textElement, function() {
        deleteWriter(textElement, function() {
            // Setelah menghapus deskripsi, mulai ulang animasi deskripsi
            startSubtitleAnimation();
        }, textElement);
    });
}

// Mulai animasi untuk title dan subtitle
startTitleAnimation();
startSubtitleAnimation();

    </script>
</body>
</html>