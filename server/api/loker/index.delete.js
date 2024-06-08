import { prisma } from "~/server/prisma";
export default defineEventHandler(async (event) => {
  try {
    const body = await readBody(event);
    const data = await JSON.parse(body);
    data.forEach(async (el) => {
      await prisma.general.delete({
        where: {
          id: el.id,
        },
      });
    });
    return {
      success: true,
      message: "Data Deleted",
    };
  } catch (error) {
    throw error;
  }
});
