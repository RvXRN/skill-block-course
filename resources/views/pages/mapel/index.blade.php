@extends('templates.template')
@section('title','Daftar Mapel')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Daftar Mapel</h1>

    {{-- Tombol Tambah hanya untuk Admin --}}
    @if(auth()->user()->role == 'admin')
    <a href="{{ route('mapels.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
        + Tambah Mapel
    </a>
    @endif
</div>

<div class="overflow-x-auto">
<table class="w-full border border-gray-300 rounded">
    <thead class="bg-gray-100">
        <tr class="[&>th]:py-3 [&>th]:px-4 text-left">
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Deskripsi</th>
            <th class="text-center w-40">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @forelse($data as $m)
        <tr class="[&>td]:py-3 [&>td]:px-4">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->name }}</td>
            <td>{{ $m->description ?? '-' }}</td>
            <td class="flex gap-2 justify-center">
                {{-- Hanya admin yang bisa edit/hapus --}}
                @if(auth()->user()->role == 'admin')
                    <a href="{{ route('mapels.edit',$m->subject_id) }}" 
                       class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-sm">
                       Edit
                    </a>
                    <form action="{{ route('mapels.destroy',$m->subject_id) }}" method="POST" 
                          onsubmit="return confirm('Hapus mapel ini?');">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-sm">Hapus</button>
                    </form>
                @else
                    <span class="text-gray-400 text-sm">Tidak ada aksi</span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data mapel.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
