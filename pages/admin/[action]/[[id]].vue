<script setup>
definePageMeta({
  middleware: ["auth"],
});
const supabase = useSupabaseClient();
const toast = useToast();
const route = useRoute();

const allGender = ["Pria", "Wanita", "Pria/Wanita"];
const allStatus = ["Full Time", "Part Time", "Magang", "Freelance"];
const allKategori = ["Semarang", "Jogja", "Medan", "Semua Daerah"];
const allPendidikan = [
  "SD",
  "SMP",
  "SMA/SMK",
  "D3",
  "S1",
  "Tidak Ada Minimal Pendidikan",
];
const jobdeskCount = ref(1);
const syaratCount = ref(1);
const isLoading = ref(false);
const isUpdate = ref(route.params.action == "edit");
const imageFile = ref();

const jobdesks = ref([]);
const syarats = ref([]);
const formData = ref({
  general: {
    posisi: "",
    nama_perusahaan: "",
    deskripsi_perusahaan: "",
    pendidikan: "",
    gender: "",
    status_kerja: "",
    alamat: "",
    panduan_daftar: "",
    kategori: "",
    image_link: "",
  },
  jobdesk: [],
  syarat: [],
});

const handlePost = async () => {
  if (imageFile.value) {
    isLoading.value = true;
    setFormData();
    const ext = imageFile.value.name.split(".").pop();
    try {
      const { data, error } = await supabase.storage
        .from("loker-image")
        .upload(`images/${Date.now()}.${ext}`, imageFile.value);

      formData.value.general.image_link = `https://dgcezwctryooeaujgfzp.supabase.co/storage/v1/object/public/${data.fullPath}`;

      await fetch("/api/loker", {
        method: "POST",
        body: JSON.stringify(formData.value),
      })
        .then((json) => json.json())
        .then((res) => {
          if (res.success) {
            toast.add({
              title: "Loker Berhasil Diposting!",
              color: "primary",
              icon: "i-heroicons-check-circle",
            });
            navigateTo.push("/admin");
          } else {
            toast.add({
              title: "Loker Gagal Diposting!",
              color: "red",
              icon: "i-heroicons-x-circle",
            });
          }
        });
    } catch (error) {
      throw error;
    } finally {
      isLoading.value = false;
    }
  } else {
    toast.add({
      title: "Kesalahan Input!",
      color: "red",
      icon: "i-heroicons-x-circle",
    });
  }
};

const handleUpdate = async () => {
  isLoading.value = true;
  setFormData();
  try {
    await fetch(`/api/loker/${route.params.id}`, {
      method: "PATCH",
      body: JSON.stringify(formData.value),
    })
      .then((json) => json.json())
      .then((res) => {
        if (res.success) {
          toast.add({
            title: "Loker Berhasil Di-Update!",
            color: "primary",
            icon: "i-heroicons-check-circle",
          });
          navigateTo.push("/admin");
        } else {
          toast.add({
            title: "Loker Gagal Di-Update!",
            color: "red",
            icon: "i-heroicons-x-circle",
          });
        }
      });
  } catch (error) {
    throw error;
  } finally {
    isLoading.value = false;
  }
};

const setFormData = () => {
  jobdesks.value.forEach((el) => {
    formData.value.jobdesk.push({ jobdesk: el });
  });
  syarats.value.forEach((el) => {
    formData.value.syarat.push({ syarat: el });
  });
};

const setImageFile = (e) => {
  imageFile.value = e.target.files[0];
};

onMounted(async () => {
  if (route.params.action == "edit") {
    const response = await fetch(`/api/loker/${route.params.id}`).then((res) =>
      res.json()
    );
    if (response.data.syarat.length > 0) {
      syaratCount.value = response.data.syarat.length;
    }
    if (response.data.jobdesk.length > 0) {
      jobdeskCount.value = response.data.jobdesk.length;
    }

    formData.value = response.data;
    response.data.jobdesk.forEach((el) => {
      jobdesks.value.push(el);
    });
    response.data.syarat.forEach((el) => {
      syarats.value.push(el);
    });
  }
});
</script>

<template>
  <div class="font-normal text-lg">
    <UCard class="w-1/2 mx-auto border shadow-md">
      <h1 class="text-center text-xl">Pasang Loker</h1>
    </UCard>
    <UCard class="w-1/2 mx-auto mt-10 border shadow-xl">
      <div class="mt-3 mx-auto">
        <form class="m-auto mt-5">
          <div class="mb-5">
            <label>Posisi Pekerjaan</label>
            <UInput
              size="md"
              variant="outline"
              v-model="formData.general.posisi"
            />
          </div>
          <div class="mb-5">
            <label>Nama Perusahaan</label>
            <UInput
              size="md"
              variant="outline"
              v-model="formData.general.nama_perusahaan"
            />
          </div>
          <div class="mb-5">
            <label>Deskripsi Perusahaan</label>
            <UTextarea
              variant="outline"
              v-model="formData.general.deskripsi_perusahaan"
            />
          </div>
          <div class="mb-5">
            <label>Minimal Pendidikan</label>
            <USelect
              v-model="formData.general.pendidikan"
              variant="outline"
              :options="allPendidikan"
              placeholder="Pilih Minimal Pendidikan"
              size="md"
            />
          </div>
          <div class="mb-5">
            <label>Jenis Kelamin</label>
            <USelect
              v-model="formData.general.gender"
              variant="outline"
              :options="allGender"
              placeholder="Pilih Jenis Kelamin"
              size="md"
            />
          </div>
          <div class="mb-5">
            <label>Status Pekerjaan</label>
            <USelect
              v-model="formData.general.status_kerja"
              variant="outline"
              :options="allStatus"
              placeholder="Pilih Status kerja"
              size="md"
            />
          </div>
          <div class="mb-5">
            <label>Alamat</label>
            <UTextarea variant="outline" v-model="formData.general.alamat" />
          </div>
          <div class="mb-5">
            <label>Panduan Mendaftar</label>
            <UTextarea
              variant="outline"
              v-model="formData.general.panduan_daftar"
            />
          </div>
          <div class="mb-5">
            <label>Kategori Wilayah</label>
            <USelect
              v-model="formData.general.kategori"
              variant="outline"
              :options="allKategori"
              placeholder="Pilih Kategori Wilayah"
              size="md"
            />
          </div>
          <label class="mb-5">Jobdesk</label>
          <div v-for="index in jobdeskCount" class="flex justify-start pb-5">
            <UInput
              size="md"
              variant="outline"
              v-model="jobdesks[index - 1]"
              class="w-full mr-2"
            />
            <button
              @click.prevent="jobdeskCount++"
              class="btn btn-sm btn-square btn-info my-auto"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                stroke="white"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"
                />
              </svg>
            </button>
          </div>
          <label class="mb-5">Syarat Melamar Pekerjaan</label>
          <div v-for="index in syaratCount" class="flex justify-start pb-5">
            <UInput
              size="md"
              variant="outline"
              v-model="syarats[index - 1]"
              class="w-full mr-2"
            />
            <button
              @click.prevent="syaratCount++"
              class="btn btn-sm btn-square btn-info my-auto"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                stroke="white"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"
                />
              </svg>
            </button>
          </div>
          <div class="mb-5 flex flex-col">
            <label>Gambar Loker</label>
            <div
              class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer"
            >
              <input id="upload" type="file" class="hidden" accept="image/*" />
              <label for="upload" class="cursor-pointer">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-8 h-8 text-gray-700 mx-auto mb-4"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"
                  />
                </svg>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">
                  Upload picture
                </h5>
                <p class="font-normal text-sm text-gray-400 md:px-6">
                  Choose photo size should be less than
                  <b class="text-gray-600">2mb</b>
                </p>
                <p class="font-normal text-sm text-gray-400 md:px-6">
                  and should be in
                  <b class="text-gray-600">Image</b> format.
                </p>
                <span
                  id="filename"
                  class="text-gray-500 bg-gray-200 z-50"
                ></span>
              </label>
            </div>
            <input
              type="file"
              class="file-input file-input-bordered file-input-sm file-input-primary w-full max-w-xs"
              @change="setImageFile"
            />
          </div>
          <div class="mt-5 flex justify-center">
            <UButton
              size="lg"
              @click.prevent="handlePost"
              :loading="isLoading"
              v-if="!isUpdate"
              >POST</UButton
            >
            <UButton
              size="lg"
              @click.prevent="handleUpdate"
              :loading="isLoading"
              v-if="isUpdate"
              >UPDATE</UButton
            >
          </div>
        </form>
      </div>
    </UCard>
  </div>
</template>
