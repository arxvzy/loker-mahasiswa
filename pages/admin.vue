<script setup>
const toast = useToast();
const allPendidikan = [
  "SD",
  "SMP",
  "SMA/SMK",
  "D3",
  "S1",
  "Tidak Ada Minimal Pendidikan",
];
const allGender = ["Pria", "Wanita", "Pria/Wanita"];
const allWaktu = ["Full-Time", "Part-Time"];
const allKategori = ["Semarang", "Jogja", "Medan", "Semua Daerah"];

const posisi = ref("");
const perusahaan = ref("");
const deskripsiPerusahaan = ref("");
const pendidikan = ref("");
const gender = ref("");
const waktu = ref("");
const alamat = ref("");
const daftar = ref("");
const kategori = ref("");
const jobdesk = ref([]);
const syarat = ref([]);

let jobdeskCount = ref(1);
let syaratCount = ref(1);
const postLoker = async () => {
  const body = {
    posisi: posisi.value,
    nama_perusahaan: perusahaan.value,
    deskripsi_perusahaan: deskripsiPerusahaan.value,
    pendidikan: pendidikan.value,
    gender: gender.value,
    durasi: waktu.value,
    alamat: alamat.value,
    daftar: daftar.value,
    kategori: kategori.value,
    jobdesk: [],
    syarat: [],
  };
  jobdesk.value.forEach((el) => {
    body.jobdesk.push(el);
  });
  syarat.value.forEach((el) => {
    body.syarat.push(el);
  });
  try {
    const response = await fetch("/api/loker/post", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(body),
    })
      .then((json) => {
        return json.json();
      })
      .then((res) => {
        if (res.success) {
          toast.add({ title: "Loker Berhasil Diposting!", color: "primary" });
        } else {
          toast.add({ title: "Loker Gagal Diposting!", color: "red" });
        }
      });
  } catch (error) {
    console.log(error);
  }
};
</script>

<template>
  <div class="text-black mt-3 w-1/2 mx-auto">
    <p>{{ jobdesk.value }}</p>
    <h1 class="text-center text-xl">Pasang Loker</h1>
    <form class="m-auto mt-5">
      <div class="mb-3">
        <label>Posisi Pekerjaan</label>
        <UInput size="md" color="blue" variant="outline" v-model="posisi" />
      </div>
      <div class="mb-3">
        <label>Nama Perusahaan</label>
        <UInput size="md" color="blue" variant="outline" v-model="perusahaan" />
      </div>
      <div class="mb-3">
        <label>Deskripsi Perusahaan</label>
        <UInput
          size="md"
          color="blue"
          variant="outline"
          v-model="deskripsiPerusahaan"
        />
      </div>
      <div class="mb-3">
        <label>Minimal Pendidikan</label>
        <USelect
          v-model="pendidikan"
          color="blue"
          variant="outline"
          :options="allPendidikan"
          placeholder="Pilih Minimal Pendidikan"
          size="md"
        />
      </div>
      <div class="mb-3">
        <label>Jenis Kelamin</label>
        <USelect
          v-model="gender"
          color="blue"
          variant="outline"
          :options="allGender"
          placeholder="Pilih Jenis Kelamin"
          size="md"
        />
      </div>
      <div class="mb-3">
        <label>Waktu Kerja</label>
        <USelect
          v-model="waktu"
          color="blue"
          variant="outline"
          :options="allWaktu"
          placeholder="Pilih Waktu kerja"
          size="md"
        />
      </div>
      <div class="mb-3">
        <label>Alamat</label>
        <UInput size="md" color="blue" variant="outline" v-model="alamat" />
      </div>
      <div class="mb-3">
        <label>Panduan Mendaftar</label>
        <UTextarea color="blue" variant="outline" v-model="daftar" />
      </div>
      <div class="mb-3">
        <label>Kategori Wilayah</label>
        <USelect
          v-model="kategori"
          color="blue"
          variant="outline"
          :options="allKategori"
          placeholder="Pilih Kategori Wilayah"
          size="md"
        />
      </div>
      <label class="mb-3">Jobdesk</label>
      <div v-for="index in jobdeskCount" class="flex justify-start pb-3">
        <UInput
          size="md"
          color="blue"
          variant="outline"
          v-model="jobdesk[index]"
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
      <label class="mb-3">Syarat Melamar Pekerjaan</label>
      <div v-for="index in syaratCount" class="flex justify-start pb-3">
        <UInput
          size="md"
          color="blue"
          variant="outline"
          v-model="syarat[index]"
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
      <div class="mt-3 flex justify-center">
        <UButton size="lg" @click.prevent="postLoker">POST</UButton>
      </div>
    </form>
  </div>
</template>
