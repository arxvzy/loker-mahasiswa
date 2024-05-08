import { prisma } from "~/server/prisma";
export default defineEventHandler(async (event) => {
  const id = getRouterParams(event, "id");
  const ketentuan = await prisma.ketentuan_loker.findUnique({
    where: {
      loker_id: id,
    },
  });
  const deskripsi = await prisma.deskripsi_pekerjaan.findMany({
    where: {
      loker_id: id,
    },
  });
  const syarat = await prisma.syarat_pekerjaan.findMany({
    where: {
      loker_id: id,
    },
  });
  return await { ketentuan, deskripsi, syarat };
});
