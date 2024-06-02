import { prisma } from "~/server/prisma.js";
export default defineEventHandler(async (event) => {
  const body = await readBody(event);
  const loker = JSON.parse(body);
  console.log(loker.jobdesk);
  console.log(loker);
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
    await prisma.general.create({
      data: data,
      include: {
        jobdesk: true,
        syarat: true,
      },
    });
    return {
      success: true,
      message: "Loker Berhasil Di Posting",
    };
  } catch (err) {
    throw err;
  }
});
