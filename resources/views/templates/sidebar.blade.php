<div class="flex flex-col h-screen w-1/4">
    <div class="flex items-center">
        <img src="{{ asset('img/logo.png') }}" alt="" class="w-19">
        <span class="font-bold text-2xl">SKILLBLOCK</span>
    </div>

    <div class="flex flex-col w-full h-full mt-10 gap-6 ml-3 outline-none">

        {{-- Menu yang bisa diakses semua user --}}
        <a href="#"><i class="fa-solid fa-file-lines text-3xl"></i><span class="ml-1 text-xl font-medium">Dashboard</span></a>
        <a href="/mapel"><i class="fa-solid fa-book text-3xl"></i><span class="ml-1 text-xl font-medium">Mapel</span></a>
        <a href="#"><i class="fa-solid fa-chart-column text-3xl"></i><span class="ml-1 text-xl font-medium">Nilai</span></a>
        <a href="#"><i class="fa-solid fa-certificate text-3xl"></i><span class="ml-1 text-xl font-medium">Sertifikat</span></a>
        <a href="#"><i class="fa-solid fa-user text-3xl"></i><span class="ml-1 text-xl font-medium">Profil</span></a>

        {{-- ========================= --}}
        {{-- MENU KHUSUS ROLE ADMIN    --}}
        {{-- ========================= --}}
        @auth
            @if(auth()->user()->role == 'admin')
                <a href="/mapels"><i class="fa-solid fa-book text-3xl"></i><span class="ml-1 text-xl font-medium">Kelola Mapel</span></a>
                <a href="/courses"><i class="fa-solid fa-layer-group text-3xl"></i><span class="ml-1 text-xl font-medium">Kelola Courses</span></a>
            @endif
        @endauth

        {{-- ========================= --}}
        {{-- MENU KHUSUS GURU/TEACHER  --}}
        {{-- ========================= --}}
        @auth
            @if(auth()->user()->role == 'teacher')
                <a href="/courses"><i class="fa-solid fa-book-open text-3xl"></i><span class="ml-1 text-xl font-medium">Buat Course</span></a>
                <a href="/mapels"><i class="fa-solid fa-list text-3xl"></i><span class="ml-1 text-xl font-medium">List Mapel</span></a>
            @endif
        @endauth

    </div>
</div>
