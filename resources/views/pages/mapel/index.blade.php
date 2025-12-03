@extends('templates.template')
@section('title','Daftar Mapel')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Daftar Mapel</h1>
    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')
        <a href="{{ route('mapels.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
            + Tambah Mapel
        </a>
    @endif
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($data as $mapel)
    <div class="bg-white rounded-lg shadow p-4 flex flex-col justify-between">
        <div>
            <h2 class="text-xl font-semibold">{{ $mapel->subject_name }}</h2>
            <p class="mt-2 text-gray-700">{{ $mapel->curiculum ?? '-' }}</p>
        </div>

        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')
        <div class="mt-4 flex justify-between items-center">
            <a href="{{ route('mapels.edit', $mapel->subject_id) }}" 
               class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-sm">
               Edit
            </a>
            <form action="{{ route('mapels.destroy', $mapel->subject_id) }}" method="POST"
                  onsubmit="return confirm('Hapus mapel ini?');">
                @csrf @method('DELETE')
                <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-sm">Hapus</button>
            </form>
        </div>
        @endif
    </div>
    @empty
    <p class="col-span-full text-center text-gray-500">Belum ada mapel tersedia.</p>
    @endforelse
</div>
@endsection
