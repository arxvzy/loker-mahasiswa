import { prisma } from "~/server/prisma";
export default defineEventHandler(async () => {
  try {
    const lokerQuery = await prisma.general.findMany();
    const loker = lokerQuery.map((entry) => ({
      ...entry,
      id: parseInt(entry.id),
    }));
    return {
      success: true,
      data: loker,
    };
  } catch (e) {
    console.log(e);
    throw e;
  }
});
