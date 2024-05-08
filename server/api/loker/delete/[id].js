import { prisma } from "~/server/prisma";
export default defineEventHandler(async (event) => {
  const id = getRouterParams(event, "id");
  const ketentuan = await prisma.ketentuan_loker.delete({
    where: {
      loker_id: id,
    },
  });
  const deskripsi = await prisma.deskripsi_pekerjaan.deleteMany({
    where: {
      loker_id: id,
    },
  });
  const syarat = await prisma.syarat_pekerjaan.deleteMany({
    where: {
      loker_id: id,
    },
  });
  return {
    success: true,
    message: "Data Deleted",
  };
});
