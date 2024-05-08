import { prisma } from "~/server/prisma";
export default defineEventHandler(async (event) => {
  const id = Date.now();
  const body = await readBody(event);
  const ketentuan = await prisma.ketentuan_loker.create({
    data: {
      loker_id: id,
      posisi: body.posisi,
      industri: body.industri,
      deskripsi: body.deskripsi,
      pendidikan: body.pendidikan,
      gender: body.gender,
      durasi: body.durasi,
      lokasi: body.lokasi,
      daftar: body.daftar,
      kategori: body.kategori,
    },
  });
  const deskripsi = await prisma.deskripsi_pekerjaan.createMany({
    jobdesk: body.jobdesk,
    loker_id: id,
  });
  const syarat = await prisma.syarat_pekerjaan.createMany({
    syarat: body.syarat,
    loker_id: id,
  });
  return await { ketentuan, deskripsi, syarat };
});
