@extends('templates.template', ['noChrome' => true])
@section('content')
<div class="container flex justify-center items-center w-full h-screen">
    <div class="bg-[#6CA5F2] border h-140 w-120 rounded-4xl">
        <div class="flex flex-col items-center mt-10 w-full">
            <img src="/img/logon.png" alt="" class="w-20">
            <h1 class="text-white font-bold text-3xl mt-4">Register</h1>
        </div>
        <div class="mt-10 flex flex-col h-75">
            <form action="" method="post" class="flex flex-col gap-6">
                <div class="flex ml-2 items-center">
                    <label for="" class="text-white text-md">Nama:</label>
                    <input type="text" name="" id="" class="bg-white ml-22 w-[68%] rounded h-7 outline-none pl-2">
                </div>
                <div class="flex ml-2 items-center">
                    <label for="" class="text-white text-md">Email:</label>
                    <input type="text" name="" id="" class="bg-white ml-23 w-[68%] rounded h-7 outline-none pl-2">
                </div>
                <div class="flex ml-2 items-center relative">
                    <label for="" class="text-white text-md">Password:</label>
                    <input type="password" name="" id="password" class="bg-white ml-16 w-[68%] rounded h-7 outline-none pl-2">
                     <button 
                        id="togglePw" 
                        type="button"
                        class="absolute right-5 top-1/2 -translate-y-1/2 cursor-pointer"
                    >
                        <i id="eyeIcon" class="fa-solid fa-eye"></i>
                    </button>
                </div>
                <div class="flex ml-2 items-center relative">
                    <label for="" class="text-white text-md">Confirm Password:</label>
                    <input type="password" name="" id="password" class="bg-white ml-1 w-[68%] rounded h-7 outline-none pl-2">
                     <button 
                        id="togglePw"
                        type="button"
                        class="absolute right-5 top-1/2 -translate-y-1/2 cursor-pointer"
                    >
                        <i id="eyeIcon" class="fa-solid fa-eye"></i>
                    </button>
                </div>
                <div class="flex w-full justify-end px-2 items-center">
                    <a href="/login" class="justify-self-end">Sudah Punya Akun?</a>
                </div>
                <div class="w-full text-center">
                    <button type="submit" class="bg-white px-33 py-2  font-bold rounded-xl">Register</button>
                </div>
                
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