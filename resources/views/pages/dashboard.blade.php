@extends('templates.template')
@section('content')
    {{-- TITLE --}}
<h1 class="text-2xl font-semibold mb-6">Hai, </h1>

{{-- TOP CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

    {{-- Progress Keseluruhan --}}
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
    <div>
        <h2 class="text-lg font-semibold">Progress Keseluruhan</h2>
    </div>

    @php
        $progress = 75;  // or whatever value you pass
        $radius = 40;
        $circumference = 2 * pi() * $radius;
        $offset = $circumference - ($progress / 100 * $circumference);
    @endphp

    <div class="relative w-28 h-28">
        <svg class="w-full h-full transform -rotate-90">
            <!-- Background circle -->
            <circle
                cx="56" cy="56" r="{{ $radius }}"
                stroke="#cfe2ff"
                stroke-width="10"
                fill="transparent"
            />

            <!-- Progress circle -->
            <circle
                cx="56" cy="56" r="{{ $radius }}"
                stroke="#3b82f6"
                stroke-width="10"
                fill="transparent"
                stroke-linecap="round"
                stroke-dasharray="{{ $circumference }}"
                stroke-dashoffset="{{ $offset }}"
            />
        </svg>

        <div class="absolute inset-0 flex items-center justify-center">
            <span class="text-xl font-semibold">{{ $progress }}%</span>
        </div>
    </div>
</div>


    {{-- Total Jam Belajar --}}
    <div class="bg-white rounded-xl shadow p-6 flex flex-col justify-center items-center">
        <h2 class="text-lg font-semibold">Total Jam Belajar</h2>
        <p class="text-5xl font-bold mt-2">{{ $totalHours }}</p>
    </div>

</div>

{{-- LIST MAPEL --}}
<h2 class="text-xl font-semibold mb-3">Daftar Mapel</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @foreach ($mapels as $mapel)
    <div class="p-5 rounded-xl shadow text-white"
         style="background-color: {{ $mapel->color }}">

        <h3 class="text-lg font-semibold">{{ $mapel->name }}</h3>
        

        {{-- Progress Bar --}}
        <div class="w-full bg-white/30 rounded-full h-2 mt-3">
            <div class="bg-white h-2 rounded-full" style="width: {{ $mapel->progress }}%"></div>
        </div>

        <button class="mt-4 w-full bg-white text-black py-2 rounded-lg text-sm font-medium">
            Lanjutkan Belajar
        </button>

    </div>
    @endforeach

</div>
@endsection 