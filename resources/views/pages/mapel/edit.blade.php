@extends('templates.template')
@section('title','Edit Mapel')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit Mapel</h1>

<form action="{{ route('mapels.update',$mapel->subject_id) }}" method="POST" class="space-y-4">
    @csrf @method('PUT')

    <div>
        <label class="font-medium">Nama Mata Pelajaran</label>
        <input name="name" value="{{ $mapel->name }}" required
            class="w-full mt-1 px-3 py-2 border rounded focus:outline-blue-600">
    </div>

    <div>
        <label class="font-medium">Deskripsi</label>
        <textarea name="description" class="w-full mt-1 px-3 py-2 border rounded">
            {{ $mapel->description }}
        </textarea>
    </div>

    <div class="flex gap-2">
        <button class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Update</button>
        <a href="{{ route('mapels.index') }}" class="px-5 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded">
            Batal
        </a>
    </div>
</form>
@endsection
