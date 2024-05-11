<script setup>
const toast = useToast();
const route = useRouter();

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
const nama_perusahaan = ref("");
const deskripsi_perusahaan = ref("");
const pendidikan = ref("");
const gender = ref("");
const jenis_waktu = ref("");
const alamat = ref("");
const panduan_daftar = ref("");
const kategori = ref("");
const jobdesks = ref([]);
const syarats = ref([]);

let jobdeskCount = ref(1);
let syaratCount = ref(1);
const postLoker = async () => {
  const generaldb = {
    posisi: posisi.value,
    nama_perusahaan: nama_perusahaan.value,
    deskripsi_perusahaan: deskripsi_perusahaan.value,
    pendidikan: pendidikan.value,
    gender: gender.value,
    jenis_waktu: jenis_waktu.value,
    alamat: alamat.value,
    panduan_daftar: panduan_daftar.value,
    kategori: kategori.value,
  };
  const jobdeskdb = [];
  jobdesks.value.forEach((el) => {
    jobdeskdb.push({ jobdesk: el });
  });
  const syaratdb = [];
  syarats.value.forEach((el) => {
    syaratdb.push({ syarat: el });
  });
  console.log({
    general: generaldb,
    jobdesk: jobdeskdb,
    syarat: syaratdb,
  });
  try {
    await fetch("/api/loker/post", {
      method: "POST",
      body: JSON.stringify({
        general: generaldb,
        jobdesk: jobdeskdb,
        syarat: syaratdb,
      }),
    })
      .then((json) => json.json())
      .then((res) => {
        if (res.success) {
          toast.add({ title: "Loker Berhasil Diposting!", color: "primary" });
          route.push("/admin");
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
  <UCard class="w-1/2 mx-auto mt-10 border shadow-md">
    <h1 class="text-center text-xl text-black">Pasang Loker</h1>
  </UCard>
  <UCard class="w-1/2 mx-auto mt-10 border shadow-xl">
    <div class="text-black mt-3 mx-auto">
      <form class="m-auto mt-5">
        <div class="mb-3">
          <label>Posisi Pekerjaan</label>
          <UInput size="md" variant="outline" v-model="posisi" />
        </div>
        <div class="mb-3">
          <label>Nama Perusahaan</label>
          <UInput size="md" variant="outline" v-model="nama_perusahaan" />
        </div>
        <div class="mb-3">
          <label>Deskripsi Perusahaan</label>
          <UTextarea variant="outline" v-model="deskripsi_perusahaan" />
        </div>
        <div class="mb-3">
          <label>Minimal Pendidikan</label>
          <USelect
            v-model="pendidikan"
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
            variant="outline"
            :options="allGender"
            placeholder="Pilih Jenis Kelamin"
            size="md"
          />
        </div>
        <div class="mb-3">
          <label>Jenis Waktu Kerja</label>
          <USelect
            v-model="jenis_waktu"
            variant="outline"
            :options="allWaktu"
            placeholder="Pilih Jenis Waktu kerja"
            size="md"
          />
        </div>
        <div class="mb-3">
          <label>Alamat</label>
          <UTextarea variant="outline" v-model="alamat" />
        </div>
        <div class="mb-3">
          <label>Panduan Mendaftar</label>
          <UTextarea variant="outline" v-model="panduan_daftar" />
        </div>
        <div class="mb-3">
          <label>Kategori Wilayah</label>
          <USelect
            v-model="kategori"
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
            variant="outline"
            v-model="jobdesks[index]"
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
            variant="outline"
            v-model="syarats[index]"
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
  </UCard>
</template>
