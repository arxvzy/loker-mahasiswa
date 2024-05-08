-- CreateTable
CREATE TABLE `ketentuan_loker` (
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `loker_id` INTEGER NOT NULL,
    `posisi` VARCHAR(255) NOT NULL,
    `industri` VARCHAR(255) NOT NULL,
    `deskripsi` TEXT NULL,
    `pendidikan` VARCHAR(255) NOT NULL,
    `gender` VARCHAR(255) NULL,
    `durasi` VARCHAR(255) NOT NULL,
    `lokasi` VARCHAR(255) NOT NULL,
    `daftar` TEXT NOT NULL,
    `kategori` VARCHAR(255) NOT NULL,
    `createdAt` DATETIME(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),

    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `deskripsi_pekerjaan` (
    `deskripsi_id` INTEGER NOT NULL AUTO_INCREMENT,
    `jobdesk` TEXT NULL,
    `loker_id` INTEGER NOT NULL,

    PRIMARY KEY (`deskripsi_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `syarat_pekerjaan` (
    `syarat_id` INTEGER NOT NULL AUTO_INCREMENT,
    `syarat` VARCHAR(255) NOT NULL,
    `loker_id` INTEGER NOT NULL,

    PRIMARY KEY (`syarat_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
