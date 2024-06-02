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
    // const loker = lokerQuery.map((entry) => ({
    //   ...entry,
    //   id: parseInt(entry.id),
    // }));
    return {
      success: true,
      data: response,
    };
  } catch (e) {
    console.log(e);
    throw e;
  }
});
