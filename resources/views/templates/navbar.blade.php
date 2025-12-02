<div class="flex w-full  h-13 items-center justify-between px-3">
    <h1 class="text-2xl font-medium">Hai, {{ auth()->user()->name }} &#128075;</h1>
    <div class="flex items-center">
        <i class="fa-solid fa-bell text-2xl"></i>
        <div class="relative inline-block text-left">
  <button id="userMenuButton" type="button" class="inline-flex items-center rounded-md px-3 w-70 py-2 text-sm font-medium hover:bg-blue-400 focus:outline-none focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="true" aria-haspopup="true">
    <img src="{{ asset('storage/profile/' . auth()->user()->profil_pic) }}" alt="User Avatar" class="h-8 w-8 rounded-full mr-2">
    <h1 id="userName" class="block max-w-[150px]">{{ auth()->user()->name }}</h1>
    <svg class="ml-12 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
    </svg>
  </button>

  <!-- Dropdown Menu -->
  <div id="userDropdown" class="hidden absolute right-0 mt-2 w-70 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50">
    <div class="py-1">
      <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
        <i class="fa fa-user mr-2"></i> Profile
      </a>
      <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
        <i class="fa fa-book mr-2"></i> Course
      </a>
      <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                    <i class="fa fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
    </div>
  </div>
</div>

<script>
  const userMenuButton = document.getElementById('userMenuButton');
  const userDropdown = document.getElementById('userDropdown');
  const userNameEl = document.getElementById('userName');

  // Batasi nama maksimal 25 karakter
  if(userNameEl.textContent.length > 25) {
    userNameEl.textContent = userNameEl.textContent.slice(0, 25) + '...';
  }

  // Toggle dropdown
  userMenuButton.addEventListener('click', () => {
    userDropdown.classList.toggle('hidden');
  });

  window.addEventListener('click', (e) => {
    if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
      userDropdown.classList.add('hidden');
    }
  });
</script>
    
    </div>
</div>