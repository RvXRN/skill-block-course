@extends('templates.template')
@section('title','Tambah Mapel')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Tambah Mapel</h1>

<form action="{{ route('mapels.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="font-medium">Nama Mata Pelajaran</label>
        <input name="name" required
            class="w-full mt-1 px-3 py-2 border rounded focus:outline-blue-600">
    </div>

    <div>
        <label class="font-medium">Deskripsi</label>
        <textarea name="description" class="w-full mt-1 px-3 py-2 border rounded"></textarea>
    </div>

    <div class="flex gap-2">
        <button class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded">Simpan</button>
        <a href="{{ route('mapels.index') }}" class="px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded">
            Kembali
        </a>
    </div>
</form>
@endsection
