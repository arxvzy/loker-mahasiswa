<header class="bg-[#82bfab] shadow-lg">
    <div class="w-11/12 md:w-10/12 flex justify-between h-16 items-center md:gap-4 mx-auto">
        <a class="block text-teal-600" href="/">
            <span class="sr-only">Home</span>
            <img src="/images/logo.png" class="h-8 md:h-14 object-scale-down" alt="" />
        </a>

        <div class="min-h-screen flex items-center justify-center">
            <div class="relative inline-block text-left">
                <button id="dropdown-button"
                    class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white rounded-md shadow-xl border-2 transition active:shadow active:scale-95">
                    Menu
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-menu"
                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-slate-600 ring-1 ring-black ring-opacity-5">
                    <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                        <a href="/pasang-loker" class="block px-4 py-2 text-sm text-white hover:bg-gray-100"
                            role="menuitem">
                            Pasang Lowongan
                        </a>
                        <a href="/tentang-kami" class="block px-4 py-2 text-sm text-white hover:bg-gray-100"
                            role="menuitem">
                            Tentang Kami
                        </a>
                        <a href="/kontak" class="block px-4 py-2 text-sm text-white hover:bg-gray-100" role="menuitem">
                            Hubungi Kami
                        </a>
                        <a href="/artikel" class="block px-4 py-2 text-sm text-white hover:bg-gray-100" role="menuitem">
                            Artikel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');
    let isDropdownOpen = true; // Set to true to open the dropdown by default, false to close it by default

    // Function to toggle the dropdown
    function toggleDropdown() {
        isDropdownOpen = !isDropdownOpen;
        if (isDropdownOpen) {
            dropdownMenu.classList.remove('hidden');
        } else {
            dropdownMenu.classList.add('hidden');
        }
    }

    // Initialize the dropdown state
    toggleDropdown();

    // Toggle the dropdown when the button is clicked
    dropdownButton.addEventListener('click', toggleDropdown);

    // Close the dropdown when clicking outside of it
    window.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            isDropdownOpen = false;
        }
    });
</script>
