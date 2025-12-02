@extends('templates.template', ['noChrome' =>    true])
@section('content')
<div class="container flex justify-center items-center w-full h-screen">
    <div class="bg-[#6CA5F2] border h-140 w-120 rounded-4xl">
        <div class="flex flex-col items-center mt-10 w-full">
            <img src="/img/logon.png" alt="" class="w-20">
            <h1 class="text-white font-bold text-3xl mt-4">Login</h1>
        </div>
        <div class="mt-10 flex flex-col h-75 gap-7">
            <form action="{{ route('login.process') }}" method="post" class="flex flex-col  gap-8">
                @csrf
                <div class="flex ml-2 items-center">
                    <label for="" class="text-white text-md">Nama/Email:</label>
                    <input type="email" name="email" id="" class="bg-white ml-9 w-[70%] rounded h-7 outline-none pl-2">
                </div>
                <div class="flex ml-2 items-center relative">
                    <label for="" class="text-white text-md">Password:</label>
                    <input type="password" name="password" id="password" class="bg-white ml-14 w-[70%] rounded h-7 outline-none pl-2">
                     <button 
                        id="togglePw"
                        type="button"
                        class="absolute right-5 top-1/2 -translate-y-1/2 cursor-pointer"
                    >
                        <i id="eyeIcon" class="fa-solid fa-eye"></i>
                    </button>
                </div>
                <div class="flex w-full justify-between px-2 items-center">
                   <div class="flex items-center">
                        <input id="default-checkbox" type="checkbox" value="" name="remember" class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                        <label for="default-checkbox" class="select-none ms-2 text-heading">Ingat Saya</label>
                    </div>
                    <a href="">Lupa Password?</a>
                </div>
                <div class="w-full text-center">
                    <button type="submit" class="bg-white px-33 py-2  font-bold rounded-xl">Login</button>
                </div>
                <a href="/register" class="text-center">Tidak Punya Akun?</a>
            </form>
        </div>
    </div>
</div>
<script>
const pw = document.getElementById("password");
const eye = document.getElementById("eyeIcon");

eye.addEventListener("click", () => {
    const hide = pw.type === "password";

    pw.type = hide ? "text" : "password";

    // ganti kelas fa-eye <-> fa-eye-slash
    eye.classList.toggle("fa-eye", !hide);
    eye.classList.toggle("fa-eye-slash", hide);
});

</script>
@endsection