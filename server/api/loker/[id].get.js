import { prisma } from "~/server/prisma";
export default defineEventHandler(async (event) => {
  const id = getRouterParams(event, "id");
  try {
    const response = await prisma.general.findUnique({
      where: {
        id: parseInt(id.id),
      },
      include: {
        jobdesk: true,
        syarat: true,
      },
    });
    const formData = {
      general: {
        posisi: response.posisi,
        nama_perusahaan: response.nama_perusahaan,
        deskripsi_perusahaan: response.deskripsi_perusahaan,
        pendidikan: response.pendidikan,
        gender: response.gender,
        status_kerja: response.status_kerja,
        alamat: response.alamat,
        panduan_daftar: response.panduan_daftar,
        kategori: response.kategori,
        image_link: response.image_link,
      },
      jobdesk: [],
      syarat: [],
    };
    response.jobdesk.forEach((el) => {
      formData.jobdesk.push(el.jobdesk);
    });
    response.syarat.forEach((el) => {
      formData.syarat.push(el.syarat);
    });
    return {
      success: true,
      data: {
        ...formData,
      },
    };
  } catch (e) {
    console.log(e);
    throw e;
  }
});
