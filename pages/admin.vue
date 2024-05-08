<template>
  <form class="w-50 m-auto mt-5">
    <h1 class="text-center">Pasang Loker</h1>
    <div class="mb-3">
      <label for="posisi" class="form-label">Posisi Pekerjaan</label>
      <input type="text" class="form-control" id="posisi" />
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Badan Usaha</label>
      <input type="text" class="form-control" id="nama" />
    </div>
    <div class="mb-3">
      <label for="deskripsiUsaha" class="form-label">Deskripsi Usaha</label>
      <input type="text" class="form-control" id="deskripsiUsaha" />
    </div>
    <div class="mb-3">
      <label for="pendidikan" class="form-label">Minimal Pendidikan</label>
      <select
        class="form-select"
        id="pendidikan"
        aria-label="Default select example"
      >
        <option selected disabled>Pilih Pendidikan</option>
        <option value="1">SD</option>
        <option value="2">SMP</option>
        <option value="3">SMA/SMK</option>
        <option value="4">S1</option>
        <option value="5">Tidak Ada Minimal Pendidikan</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Jenis Kelamin</label>
      <select
        class="form-select"
        id="gender"
        aria-label="Default select example"
      >
        <option selected disabled>Pilih Jenis Kelamin</option>
        <option value="1">Pria</option>
        <option value="2">Wanita</option>
        <option value="3">Pria/Wanita</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="waktu" class="form-label">Waktu Pekerjaan</label>
      <select
        class="form-select"
        id="waktu"
        aria-label="Default select example"
      >
        <option selected disabled>Pilih Jenis Waktu Kerja</option>
        <option value="1">Full-Time</option>
        <option value="2">Part-Time</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="lokasi" class="form-label">Lokasi</label>
      <input type="text" class="form-control" id="lokasi" />
    </div>
    <div class="mb-3">
      <label for="daftar" class="form-label">Panduan Mendaftar</label>
      <textarea class="form-control" id="daftar" rows="3"></textarea>
    </div>
    <div class="mb-3">
      <label for="kategori" class="form-label">Kategori Wilayah</label>
      <select
        class="form-select"
        id="kategori"
        aria-label="Default select example"
      >
        <option selected disabled>Pilih Kategori</option>
        <option value="1">Semarang</option>
        <option value="2">Jogja</option>
        <option value="3">Medan</option>
        <option value="4">Se-Indonesia</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</template>

<script setup>
useHead({
  link: [
    {
      rel: "stylesheet",
      href: "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css",
    },
  ],
});
</script>
