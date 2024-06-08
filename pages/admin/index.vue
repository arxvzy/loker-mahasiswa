<script setup>
definePageMeta({
  middleware: ["auth"],
});
const loker = ref([]);
const toast = useToast();
const router = useRouter();
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
    label: "Tanggal Diposting",
    sortable: true,
    class: "text-center ",
  },
];

const isLoading = ref(false);
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

const handleDelete = async (list) => {
  try {
    isLoading.value = true;
    const deleteId = [];
    list.forEach((el) => {
      deleteId.push({ id: el.id });
    });
    await fetch("/api/loker", {
      method: "DELETE",
      body: JSON.stringify(deleteId),
    });

    loker.value.data = loker.value.data.filter((el) => {
      return !list.includes(el);
    });
    toast.add({
      title: "Data berhasil Dihapus!",
      color: "primary",
      icon: "i-heroicons-check-circle",
    });
    isLoading.value = false;
  } catch (e) {
    toast.add({
      title: "Data Gagal Dihapus!",
      color: "red",
      icon: "i-heroicons-x-circle",
    });
    isLoading.value = false;
    console.log(e);
    throw e;
  }
};
const handleUpdate = async () => {
  const id = selected.value[0].id;
  router.push(`/admin/edit/${id}`);
};
onMounted(async () => {
  const response = await fetch("/api/loker").then((res) => res.json());
  loker.value = response;
  if (loker.value.success) {
    loker.value.data.forEach((el, index) => {
      el.nomor = index + 1;
      el.class = "text-center";
      el.created_at = new Date(el.created_at).toLocaleString("id-ID", {
        timeZone: "Asia/Jakarta",
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
        hour12: false,
      });
    });
  }
});
</script>

<template>
  <!-- Open the modal using ID.showModal() method -->
  <UCard class="w-4/5 mx-auto border shadow-md">
    <h1 class="text-center text-xl">Data Loker</h1>
  </UCard>
  <UCard class="w-4/5 mx-auto border shadow-md">
    <div class="mx-auto mt-10">
      <div class="flex px-3 justify-between">
        <UInput
          v-model="q"
          name="q"
          placeholder="Cari..."
          icon="i-heroicons-magnifying-glass-20-solid"
          autocomplete="off"
          :ui="{ icon: { trailing: { pointer: '' } } }"
        />
        <div class="flex justify-end gap-4">
          <UButton
            color="primary"
            size="lg"
            variant="solid"
            class="px-5"
            @click.prevent="handleUpdate"
            :disabled="selected.length != 1"
            >Edit</UButton
          >
          <UButton
            color="red"
            size="lg"
            onclick="my_modal_5.showModal()"
            variant="solid"
            :disabled="selected.length === 0"
            >Hapus</UButton
          >
        </div>
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
          <div class="modal-box">
            <h3 class="font-bold text-lg">Konfirmasi Penghapusan</h3>
            <p class="py-4">
              Apakah anda yakin ingin menghapus data yang dipilih?
            </p>
            <div class="modal-action">
              <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn btn-ghost mr-2">Tidak</button>
                <button
                  class="btn btn-error px-6"
                  @click="handleDelete(selected)"
                >
                  Ya
                </button>
              </form>
            </div>
          </div>
        </dialog>
      </div>
    </div>
    <div class="border mt-3"></div>
    <div>
      <UTable :columns="columns" v-model="selected" :rows="filteredRows" />
    </div>
  </UCard>
</template>
