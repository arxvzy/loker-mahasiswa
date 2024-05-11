import { prisma } from "~/server/prisma";
export default defineEventHandler(async (event) => {
  try {
    const body = await readBody(event);
    const data = await JSON.parse(body);
    console.log(data);

    data.forEach(async (el) => {
      await prisma.general.delete({
        where: {
          id: 4,
        },
      });
      await prisma.jobdesk.deleteMany({
        where: {
          general_id: 4,
        },
      });
      await prisma.syarat.deleteMany({
        where: {
          general_id: 4,
        },
      });
    });
    return {
      success: true,
      message: "Data Deleted",
      data: data,
    };
  } catch (error) {
    throw error;
  }
});
