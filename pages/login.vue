<script setup>
const supabase = useSupabaseClient();
const toast = useToast();
const router = useRouter();
const loginForm = ref({
  email: "",
  password: "",
});

const login = async () => {
  const { error } = await supabase.auth.signInWithPassword({
    email: loginForm.value.email,
    password: loginForm.value.password,
  });
  if (error) {
    toast.error(error.message);
  } else {
    toast.success("Login Berhasil!");
    router.push("/admin");
  }
};
</script>
<template>
  <div class="mx-auto max-w-screen-xl w-full md:w-1/2 px-4 py-16 sm:px-6">
    <div class="mx-auto max-w-lg text-center">
      <h1 class="text-2xl font-bold sm:text-3xl text-indigo-600">
        Login Ke Loker Mahasiswa!
      </h1>
    </div>

    <form action="#" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
      <label class="input input-bordered flex items-center gap-2">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 16 16"
          fill="currentColor"
          class="w-4 h-4 opacity-70"
        >
          <path
            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"
          />
        </svg>
        <input type="text" class="grow" placeholder="Username" />
      </label>
      <label class="input input-bordered flex items-center gap-2">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 16 16"
          fill="currentColor"
          class="w-4 h-4 opacity-70"
        >
          <path
            fill-rule="evenodd"
            d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
            clip-rule="evenodd"
          />
        </svg>
        <input type="password" class="grow" placeholder="Password" />
      </label>

      <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">
          No account?
          <a class="underline" href="#">Sign up</a>
        </p>

        <button
          type="submit"
          class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
        >
          Sign in
        </button>
      </div>
    </form>
  </div>
</template>
