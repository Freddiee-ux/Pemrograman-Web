
CREATE TABLE siswa (
    nis VARCHAR(10) PRIMARY KEY,
    nama_siswa VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    alamat TEXT,
    kelas VARCHAR(10) DEFAULT 'IX RPL',
    jurusan VARCHAR(50) DEFAULT 'Rekayasa Perangkat Lunak'
);

-- 2. Contoh data siswa
INSERT INTO siswa (nis, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) VALUES
('09001', 'Budi Santoso', 'Laki-laki', 'Malang', '2008-05-10', 'Jl. Merdeka No. 10'),
('09002', 'Citra Dewi', 'Perempuan', 'Surabaya', '2008-07-22', 'Jl. Pahlawan No. 5'),
('09003', 'Rudi Hermanto', 'Laki-laki', 'Bandung', '2008-01-01', 'Jl. Asia Afrika No. 15'),
('09004', 'Siti Aisyah', 'Perempuan', 'Jakarta', '2008-03-15', 'Jl. Sudirman No. 20');

