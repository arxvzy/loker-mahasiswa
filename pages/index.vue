<script setup>
import Card from "../components/Card.vue";
import Skeleton from "../components/Skeleton.vue";
const lokers = ref([]);
const isFetching = ref(true);

function timeSince(timestamp) {
  const now = new Date();
  const past = new Date(timestamp);
  const secondsPast = Math.floor((now - past) / 1000);

  if (secondsPast < 60) {
    return `${secondsPast} detik lalu`;
  }

  const minutesPast = Math.floor(secondsPast / 60);
  if (minutesPast < 60) {
    return minutesPast + " menit lalu";
  }

  const hoursPast = Math.floor(minutesPast / 60);
  if (hoursPast < 24) {
    return hoursPast + " jam lalu";
  }

  const daysPast = Math.floor(hoursPast / 24);
  if (daysPast < 30) {
    return daysPast + " hari lalu";
  }

  const monthsPast = Math.floor(daysPast / 30);
  if (monthsPast < 12) {
    return monthsPast + " bulan lalu";
  }

  const yearsPast = Math.floor(monthsPast / 12);
  return yearsPast + " tahun lalu";
}

onMounted(async () => {
  const response = await fetch("/api/loker").then((res) => res.json());
  isFetching.value = false;
  lokers.value = response.data;
  lokers.value.forEach((element) => {
    element.title = `Lowongan Kerja ${element.posisi} di ${element.nama_perusahaan} - ${element.kategori}`;
    element.waktu_post = timeSince(element.created_at);
  });
});
</script>
<template>
  <div class="md:w-3/4 lg:w-1/2 w-4/5 mx-auto">
    <h2 class="text-2xl"><b>Lowongan Terbaru</b></h2>

    <div v-if="isFetching" v-for="i in 3" class="my-3">
      <Skeleton />
    </div>

    <div class="flex flex-col" v-for="loker in lokers">
      <a :href="`/loker/${loker.id}`" :title="loker.title">
        <Card
          class="mt-3"
          :posisi="loker.posisi"
          :nama_perusahaan="loker.nama_perusahaan"
          :pendidikan="loker.pendidikan"
          :status_kerja="loker.status_kerja"
          :gender="loker.gender"
          :kategori="loker.kategori"
          :waktu_post="loker.waktu_post"
          :image_link="loker.image_link"
        />
      </a>
    </div>
  </div>
</template>
