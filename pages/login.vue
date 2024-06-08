<script setup>
const supabase = useSupabaseClient();
const isLoading = ref(false);
const toast = useToast();
const loginForm = ref({
  email: "",
  password: "",
});

const login = async () => {
  try {
    isLoading.value = true;
    const { data, error } = await supabase.auth.signInWithPassword({
      email: loginForm.value.email,
      password: loginForm.value.password,
    });
    if (error) {
      toast.add({
        title: "Email atau Password Salah!",
        color: "red",
        icon: "i-heroicons-x-circle",
      });
    } else {
      toast.add({
        title: "Login Berhasil!",
        color: "primary",
        icon: "i-heroicons-check-circle",
      });
      navigateTo("/admin");
    }
  } catch (err) {
    throw err;
  } finally {
    isLoading.value = false;
  }
};
</script>
<template>
  <div class="hero min-h-screen bg-base-200 rounded-lg shadow-lg">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold text-blue-600">
          Login ke loker mahasiswa!
        </h1>
        <p class="py-6">
          Login ke akun loker mahasiswa untuk menambahkan, mengedit, dan
          menghapus postingan lowongan pekerjaan!
        </p>
      </div>
      <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input
              type="email"
              placeholder="email"
              class="input input-bordered"
              required
              v-model="loginForm.email"
            />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input
              type="password"
              placeholder="password"
              class="input input-bordered"
              required
              v-model="loginForm.password"
            />
            <label class="label">
              <a href="#" class="label-text-alt link link-hover"
                >Forgot password?</a
              >
            </label>
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary" @click.prevent="login">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
