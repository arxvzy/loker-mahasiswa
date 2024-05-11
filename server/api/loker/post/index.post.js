import { prisma } from "~/server/prisma.js";
export default defineEventHandler(async (event) => {
  const raw = await readBody(event);
  const body = JSON.parse(raw);
  const data = {
    jobdesk: {
      create: body.jobdesk,
    },
    syarat: {
      create: body.syarat,
    },
    ...body.general,
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
