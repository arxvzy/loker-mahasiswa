import { prisma } from "~/server/prisma";
export default defineEventHandler(async () => {
  const loker = await prisma.ketentuan_loker.findMany();
  return await loker;
});
