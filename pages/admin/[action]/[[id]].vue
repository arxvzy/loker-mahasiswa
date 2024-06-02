<script setup>
const toast = useToast();
const router = useRouter();
const route = useRoute();

const allGender = ["Pria", "Wanita", "Pria/Wanita"];
const allWaktu = ["Full Time", "Part Time", "Magang", "Freelance"];
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

const jobdesks = ref([]);
const syarats = ref([]);
const formData = ref({
  general: {
    posisi: "",
    nama_perusahaan: "",
    deskripsi_perusahaan: "",
    pendidikan: "",
    gender: "",
    jenis_waktu: "",
    alamat: "",
    panduan_daftar: "",
    kategori: "",
  },
  jobdesk: [],
  syarat: [],
});

const handlePost = async () => {
  isLoading.value = true;
  jobdesks.value.forEach((el) => {
    formData.value.jobdesk.push({ jobdesk: el });
  });
  syarats.value.forEach((el) => {
    formData.value.syarat.push({ syarat: el });
  });
  try {
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
          router.push("/admin");
        } else {
          toast.add({
            title: "Loker Gagal Diposting!",
            color: "red",
            icon: "i-heroicons-x-circle",
          });
        }
      });
  } catch (error) {
    isLoading.value = false;
    console.log(error);
  }
};

const handleUpdate = async () => {
  isLoading.value = true;
  jobdesks.value.forEach((el) => {
    formData.value.jobdesk.push({ jobdesk: el });
  });
  syarats.value.forEach((el) => {
    formData.value.syarat.push({ syarat: el });
  });
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
          router.push("/admin");
        } else {
          isLoading.value = false;
          toast.add({
            title: "Loker Gagal Di-Update!",
            color: "red",
            icon: "i-heroicons-x-circle",
          });
        }
      });
  } catch (error) {
    throw error;
  }
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
    formData.value.general.posisi = response.data.posisi;
    formData.value.general.nama_perusahaan = response.data.nama_perusahaan;
    formData.value.general.deskripsi_perusahaan =
      response.data.deskripsi_perusahaan;
    formData.value.general.pendidikan = response.data.pendidikan;
    formData.value.general.gender = response.data.gender;
    formData.value.general.jenis_waktu = response.data.jenis_waktu;
    formData.value.general.alamat = response.data.alamat;
    formData.value.general.panduan_daftar = response.data.panduan_daftar;
    formData.value.general.kategori = response.data.kategori;
    response.data.jobdesk.forEach((el) => {
      jobdesks.value.push(el.jobdesk);
    });
    response.data.syarat.forEach((el) => {
      syarats.value.push(el.syarat);
    });
  }
});
</script>

<template>
  <div class="font-normal">
    <UCard class="w-1/2 mx-auto mt-10 border shadow-md">
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
            <label>Jenis Waktu Kerja</label>
            <USelect
              v-model="formData.general.jenis_waktu"
              variant="outline"
              :options="allWaktu"
              placeholder="Pilih Jenis Waktu kerja"
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
