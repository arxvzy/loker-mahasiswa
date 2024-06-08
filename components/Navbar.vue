<script setup>
const props = defineProps(["user"]);
const route = useRoute();
const path = ref(route.path.split("/")[1]);
const toast = useToast();

const logout = async () => {
  const { error } = await useSupabaseClient().auth.signOut();
  if (!error) {
    toast.add({
      title: "Logout Berhasil!",
      color: "primary",
      icon: "i-heroicons-check-circle",
    });
  }
};
</script>
<template>
  <div class="drawer z-[999] text-slate-300">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
      <!-- Navbar -->
      <div class="w-full navbar bg-slate-800">
        <div class="flex-none lg:hidden">
          <label
            for="my-drawer-3"
            aria-label="open sidebar"
            class="btn btn-square btn-ghost"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              class="inline-block w-6 h-6 stroke-current"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              ></path>
            </svg>
          </label>
        </div>
        <div class="flex justify-between mx-auto w-3/4">
          <div class="px-2 mx-2 font-montserrat font-bold text-2xl">
            <NuxtLink to="/"> Loker Mahasiswa </NuxtLink>
          </div>
          <div class="hidden lg:block">
            <ul class="menu menu-horizontal">
              <!-- Navbar menu content here -->
              <li v-if="props.user">
                <NuxtLink to="/admin/post" active-class="active"
                  >Posting Loker</NuxtLink
                >
              </li>
              <li v-if="props.user">
                <NuxtLink to="/admin" active-class="active"
                  >Manage Loker</NuxtLink
                >
              </li>
              <li v-if="!props.user">
                <NuxtLink to="/login" active-class="active">Login</NuxtLink>
              </li>
              <li v-if="props.user">
                <button onclick="my_modal_1.showModal()">Logout</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="drawer-side">
      <label
        for="my-drawer-3"
        aria-label="close sidebar"
        class="drawer-overlay"
      ></label>
      <ul class="menu p-4 w-80 min-h-full bg-base-200">
        <!-- Sidebar content here -->
        <li><a>Sidebar Item 1</a></li>
        <li><a>Sidebar Item 2</a></li>
      </ul>
    </div>
  </div>
  <dialog id="my_modal_1" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Konfirmasi Log Out</h3>
      <p class="py-4">Apakah anda yakin ingin Log Out?</p>
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn btn-ghost mr-2">Tidak</button>
          <button class="btn btn-error px-6" @click="logout">Ya</button>
        </form>
      </div>
    </div>
  </dialog>
</template>
