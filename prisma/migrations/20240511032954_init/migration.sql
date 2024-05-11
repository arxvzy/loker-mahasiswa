-- CreateTable
CREATE TABLE "lokers" (
    "id" BIGSERIAL NOT NULL,
    "created_at" TIMESTAMPTZ(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "nama_perusahaan" VARCHAR,
    "posisi" VARCHAR,
    "deskripsi_perusahaan" TEXT,
    "pendidikan" VARCHAR,
    "gender" VARCHAR,
    "jenis_waktu" VARCHAR,
    "alamat" TEXT,
    "panduan_daftar" TEXT,
    "jobdesk" TEXT[] DEFAULT ARRAY['']::TEXT[],
    "syarat" TEXT[] DEFAULT ARRAY['']::TEXT[],
    "kategori" VARCHAR,

    CONSTRAINT "lokers_pkey" PRIMARY KEY ("id")
);

-- CreateIndex
CREATE UNIQUE INDEX "lokers_id_key" ON "lokers"("id");
