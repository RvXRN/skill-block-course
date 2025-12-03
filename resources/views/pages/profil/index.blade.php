@extends('templates.template') {{-- layout utama kamu --}}
@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-2xl font-bold mb-4">Profile</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Foto Profil -->
        <div class="flex flex-col items-center mb-4">
            <img src="{{ asset('profile/' . $user->profil_pic) }}" 
                class="w-24 h-24 rounded-full object-cover border mb-3">

            <input type="file" name="profil_pic" class="w-full text-sm">
        </div>

        <!-- Username -->
        <label class="block mb-1 font-medium">Username</label>
        <input type="text" name="name" value="{{ $user->name }}"
            class="w-full border p-2 rounded mb-3">

        <!-- Email -->
        <label class="block mb-1 font-medium">Email</label>
        <input type="email" name="email" value="{{ $user->email }}"
            class="w-full border p-2 rounded mb-3">

        <!-- Password -->
        <label class="block mb-1 font-medium">Password (kosongkan jika tidak ingin ubah)</label>
        <input type="password" name="password" placeholder="******"
            class="w-full border p-2 rounded mb-4">

        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update Profile
        </button>

    </form>
</div>

@endsection

