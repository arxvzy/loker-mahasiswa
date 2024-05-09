import { prisma } from "~/server/prisma";
export default defineEventHandler(async (event) => {
  const body = await readBody(event);
  try {
    const lokerdb = await prisma.ketentuan_loker.create({
      data: {
        posisi: body.posisi,
        nama_perusahaan: body.nama_perusahaan,
        deskripsi_perusahaan: body.deskripsi_perusahaan,
        pendidikan: body.pendidikan,
        gender: body.gender,
        durasi: body.durasi,
        alamat: body.alamat,
        daftar: body.daftar,
        kategori: body.kategori,
      },
    });
    if (lokerdb.id) {
      const jobdesk = [];
      body.jobdesk.forEach((el) => {
        jobdesk.push({ jobdesk: el, loker_id: lokerdb.id });
      });
      const jobdeskdb = await prisma.deskripsi_pekerjaan.createMany({
        data: jobdesk,
      });
      if (jobdeskdb.count) {
        const syarat = [];
        body.syarat.forEach((el) => {
          syarat.push({ syarat: el, loker_id: lokerdb.id });
        });
        const syaratdb = await prisma.syarat_pekerjaan.createMany({
          data: syarat,
        });
        if (syaratdb.count) {
          return await {
            success: true,
            dataLoker: lokerdb,
            jobdeskCount: jobdeskdb,
            syaratCount: syaratdb,
          };
        } else return { success: false, message: "Gagal Create Table Syarat" };
      } else return { success: false, message: "Gagal Create Table Jobdesk" };
    } else return { success: false, message: "Gagal Create Table Loker" };
  } catch (err) {
    throw err;
  }
});
