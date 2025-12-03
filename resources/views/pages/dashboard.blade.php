@extends('templates.template')
@section('content')
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

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
@foreach($courses as $course)
    <div class="p-4 bg-white shadow rounded-lg">
        <h2 class="font-semibold text-lg mb-2">{{ $course->title }}</h2>

        <div class="w-full bg-gray-200 rounded-full h-3 mb-3">
            <div class="bg-blue-500 h-3 rounded-full" 
                style="width: {{ $course->pivot->progress }}%">
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-3">{{ $course->pivot->progress }}% Selesai</p>

        <a href="{{ route('course.show', $course->subject_id) }}" 
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm">
            Lanjutkan Materi →
        </a>
    </div>
@endforeach
</div>

@endsection 