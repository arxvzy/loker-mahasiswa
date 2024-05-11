<script setup>
const response = await fetch("http://localhost:3000/api/loker/get/all");
const loker = ref(await response.json());
if (loker.value.success) {
  loker.value.data.forEach((el, index) => {
    el.nomor = index + 1;
    el.class = "text-center";
  });
}
const columns = [
  {
    key: "nomor",
    label: "No.",
    class: "text-center ",
  },
  {
    key: "nama_perusahaan",
    label: "Nama Perusahaan",
    sortable: true,
    class: "text-center ",
  },
  {
    key: "posisi",
    label: "Posisi Pekerjaan",
    class: "text-center ",
  },
  {
    key: "deskripsi_perusahaan",
    label: "Deskripsi Perusahaan",
    class: "text-center ",
  },
  {
    key: "kategori",
    label: "Kategori Wilayah",
    class: "text-center ",
  },
  {
    key: "id",
    label: "loker_id",
    sortable: true,
    class: "text-center ",
  },
  {
    key: "created_at",
    label: "Tanggal Dibuat (UTC)",
    sortable: true,
    class: "text-center ",
  },
];

const q = ref("");
const selected = ref([]);
const filteredRows = computed(() => {
  if (!q.value) {
    return loker.value.data;
  }

  return loker.value.data.filter((data) => {
    return Object.values(data).some((value) => {
      return String(value).toLowerCase().includes(q.value.toLowerCase());
    });
  });
});

const deleteLoker = async (list) => {
  try {
    const deleteId = [];
    list.forEach((el) => {
      deleteId.push({ id: el.id });
    });
    await fetch("/api/loker/delete", {
      method: "DELETE",
      body: JSON.stringify(deleteId),
    });
  } catch (e) {
    console.log(e);
    throw e;
  }
};
</script>

<template>
  <UCard class="w-4/5 mx-auto mt-10 border shadow-md">
    <h1 class="text-center text-xl text-black">Data Loker</h1>
  </UCard>
  <UCard class="w-4/5 mx-auto mt-10 border shadow-md">
    <div class="flex px-3 justify-between">
      <UInput
        v-model="q"
        name="q"
        placeholder="Cari..."
        icon="i-heroicons-magnifying-glass-20-solid"
        autocomplete="off"
        :ui="{ icon: { trailing: { pointer: '' } } }"
      />
      <UButton
        color="red"
        @click.prevent="deleteLoker(selected)"
        variant="solid"
        >Hapus</UButton
      >
    </div>
  </UCard>
  <UCard class="w-4/5 mx-auto mt-5 border shadow-md">
    <div>
      <UTable :columns="columns" v-model="selected" :rows="filteredRows" />
    </div>
  </UCard>
</template>
