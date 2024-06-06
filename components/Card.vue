<script setup>
const props = defineProps([
  "posisi",
  "nama_perusahaan",
  "pendidikan",
  "status_kerja",
  "kategori",
  "gender",
  "gambar_loker",
  "waktu_post",
]);
</script>
<template>
  <article
    class="flex bg-white transition hover:shadow-xl p-4 rounded-lg max-h-48"
  >
    <div class="hidden sm:block sm:basis-56">
      <img
        alt=""
        :src="props.gambar_loker"
        class="aspect-square h-full w-full object-cover"
      />
    </div>

    <div class="flex flex-1 flex-col justify-between">
      <div
        class="border-s border-gray-900/10 p-2 sm:border-l-transparent sm:p-4"
      >
        <div class="text-sm font-medium text-gray-700 flex justify-between">
          <p>Dibutuhkan</p>
          <div class="flex justify-end gap-1">
            <Icon name="heroicons:clock" />
            <p class="text-xs">{{ props.waktu_post }}</p>
          </div>
        </div>
        <h3 class="font-bold uppercase text-gray-900">{{ props.posisi }}</h3>

        <div
          class="mt-2 text-base/relaxed text-gray-700 flex flex-wrap gap-x-4 gap-y-2"
        >
          <div class="flex items-center gap-1">
            <Icon name="heroicons:building-office-2" />
            <p>{{ props.nama_perusahaan }}</p>
          </div>
          <div class="flex items-center gap-1">
            <Icon name="heroicons:academic-cap" />
            <p>{{ props.pendidikan }}</p>
          </div>
          <div class="flex items-center gap-1">
            <Icon name="material-symbols:work-history-outline" />
            <p>{{ props.status_kerja }}</p>
          </div>
          <div class="flex items-center gap-1">
            <Icon name="bi:gender-ambiguous" />
            <p>{{ props.gender }}</p>
          </div>
          <div class="flex items-center gap-1">
            <Icon name="tabler:map-pin-2" />
            <p>{{ props.kategori }}</p>
          </div>
        </div>
      </div>
    </div>
  </article>
</template>
