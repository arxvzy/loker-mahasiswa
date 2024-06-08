import { prisma } from "~/server/prisma";
export default defineEventHandler(async (event) => {
  const param = getRouterParams(event, "id");
  const id = parseInt(param.id);
  const body = await readBody(event);
  const loker = JSON.parse(body);
  const data = {
    jobdesk: {
      create: loker.jobdesk,
    },
    syarat: {
      create: loker.syarat,
    },
    ...loker.general,
  };

  try {
    const response = await prisma.$transaction([
      prisma.general.delete({
        where: {
          id: id,
        },
      }),
      prisma.general.create({
        data: {
          id: id,
          ...data,
        },
        include: {
          jobdesk: true,
          syarat: true,
        },
      }),
    ]);
    return {
      success: true,
      message: "Data Updated",
    };
  } catch (error) {
    console.error("Error updating data:", error);
    throw new Error("Failed to update data");
  }
});
