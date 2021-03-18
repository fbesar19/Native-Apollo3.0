-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2020 pada 22.17
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apolo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `email_peserta` varchar(255) NOT NULL,
  `penalaran_umum` varchar(255) NOT NULL,
  `pemahaman_bacaan_dan_menulis` int(100) NOT NULL,
  `pengetahuan_dan_pemahaman_umum` int(100) NOT NULL,
  `pengetahuan_kuantitatif` int(100) NOT NULL,
  `total_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `email_peserta`, `penalaran_umum`, `pemahaman_bacaan_dan_menulis`, `pengetahuan_dan_pemahaman_umum`, `pengetahuan_kuantitatif`, `total_nilai`) VALUES
(2, 'darkavenua19@gmail.com', '40', 10, 0, 0, 13),
(3, 'fikri.firdaus17@gmail.com', '10', 10, 10, 10, 10),
(4, 'fikrifirdaus@student.telkomuniversity.ac.id', '30', 40, 50, 60, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `email_peserta` varchar(255) NOT NULL,
  `password_peserta` varchar(255) NOT NULL,
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) NOT NULL,
  `penalaran_umum` tinyint(4) NOT NULL,
  `pemahaman_bacaan_dan_menulis` tinyint(4) NOT NULL,
  `pengetahuan_dan_pemahaman_umum` tinyint(4) NOT NULL,
  `pengetahuan_kuantitatif` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `email_peserta`, `password_peserta`, `isEmailConfirmed`, `token`, `penalaran_umum`, `pemahaman_bacaan_dan_menulis`, `pengetahuan_dan_pemahaman_umum`, `pengetahuan_kuantitatif`) VALUES
(40, 'darkavenua19@gmail.com', '123', 1, 'dFYTPBtlfN', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `nomer_soal` varchar(11) NOT NULL,
  `soal` longtext NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `opt5` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `kategori_soal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `nomer_soal`, `soal`, `opt1`, `opt2`, `opt3`, `opt4`, `opt5`, `jawaban`, `kategori_soal`) VALUES
(1, '1', '<b><i>Teks berikut ini digunakan untuk menjawab soal 1 sampai dengan 7</i></b>\r\n<br>\r\n<br>Keberhasilan komponen sistem pendidikan dalam melaksanakan sistem fungsinya bergantung dengan sarana penunjang satuan-satuan pendidikan. Sarana penunjang sistem tersebut, antara lain kurikulum, tenaga kependidikan, serta sumber daya pendidikan dan pengelolaan. Penyediaan sumber daya pendidikan meliputi gedung dan perlengkapannya, sumber belajar, seperti buku dan alat bantu mengajar, serta dana pengelolaan yang memadai.<br>\r\n<br>\r\nPemerintah menunjang keberhasilan sistem pendidikan tersebut dengan menetapkan UU Nomor 20 Tahun 2003. Pada pasal 49 ayat (1) dinyatakan bahwa dana pendidikan selain gaji pendidik dan biaya pendidikan kedinasan dialokasikan minimal 20% dari Anggaran Pendapatan dan Belanja Negara (APBN) pada sektor pendidikan dan minimal 20% dari Anggaran Pendapatan dan Belanja Daerah (APBD). Alokasi dan untuk anggaran pendidikan tahun 2019 sebesar Rp492,5 triliun atau 20% dari belanja negara yang mencapai Rp2.461,1 triliun. Adapun target yang dicapai tahun ini adalah penerima Program Indonesia Pintar sebanyak 20,1 juta siswa, Bantuan Operasional Sekolah (BOS) 57 juta siswa, dan beasiswa Bidik Misi 472 ribu mahasiswa. Selain itu, untuk pembangunan 56 ribu ruang kelas melalui Kementerian Pendidikan, Kementerian Agama, Kementerian PUPR maupun melalui Dana Alokasi Khusus. Data anggaran pendidikan Indonesia tahun 2011-2019 sesuai gambar 1. <br><br>\r\n<img src=\"fotosoal/PenalaranUmum1.jpg\"><br><br>\r\n1. Berdasarkan paragraf 1, manakah di bawah ini pernyataan yang BENAR?', 'Kurikulum termasuk sumber daya pendidikan.', 'Buku-buku pelajaran merupakan kurikulum pendidikan.', 'Alat bantu mengajar termasuk sumber daya pendidikan.', 'Tenaga kependidikan termasuk sumber daya pendidikan.', 'Dana pengelolaan yang memadai termasuk satuan pendidikan.', 'Tenaga kependidikan termasuk sumber daya pendidikan.', 'Penalaran Umum'),
(2, '2', '2. Berdasarkan paragraf 1, jika dana pengelolaan tidak memadai. Manakah di bawah ini simpulan yang BENAR?', 'Komponen-komponen sistem pendidikan tidak dapat berfungsi.', 'Sistem pendidikan tidak memiliki satuan-satuan pendidikan.', 'Sumber daya pendidikan tidak memiliki kelengkapan.', 'Tenaga kependidikan tetap dapat berfungsi.', 'Sistem pendidikan tidak memiliki kurikulum.', 'Tenaga kependidikan tetap dapat berfungsi.', 'Penalaran Umum'),
(3, '3', '3. Berdasarkan paragraf 2, jika tahun 2019 anggaran pendidikan mencapai Rp492,5 triliun, manakah di bawah ini simpulan yang PALING MUNGKIN benar?', 'Pemerintah melaksanakan isi konstitusi negara.', 'Pemerintah tidak memperbaiki ruang kelas yang rusak.', 'Pemerintah membayar gaji pendidik dengan dana APBD.', 'Pemerintah menaikkan anggaran pendidikan sebesar 20%.', 'Pemerintah menerapkan UU terbaru untuk menunjang sistem pendidikan.', 'Pemerintah menaikkan anggaran pendidikan sebesar 20%.', 'Penalaran Umum'),
(4, '4', '4. Berdasarkan paragraph 2, manakah pertanyaan di bawah ini yang PALING MUNGKIN benar mengenai anggaran pendidikan tahun 2019?', 'Anggaran pendidikan akan disimpan sebagai dana alokasi khusus.', 'Anggaran pendidikan akan diberikan kepada 20,1 juta siswa melalui dan BOS.', 'Anggaran pendidikan sebesar 57 persen akan dihibahkan ke Kementerian Agama.', 'Anggaran pendidikan akan digunakan untuk memperbaiki 56 ribu gedung sekolah.', 'Anggaran pendidikan akan diberikan kepada 472 ribu mahasiswa sebagai beasiswa.', 'Anggaran pendidikan akan digunakan untuk memperbaiki 56 ribu gedung sekolah.', 'Penalaran Umum'),
(5, '5', '5. Berdasarkan gambar 1, pada tahun berapa anggaran pendidikan melebihi Rp450 triliun?', '2015', '2016', '2017', '2018', '2019', '2017', 'Penalaran Umum'),
(6, '6', '6. Berdasarkan gambar 1, pada tahun berapa anggaran pendidikan menunjukkan angka terendah?', '2011', '2012', '2013', '2014', '2015', '2013', 'Penalaran Umum'),
(7, '7', '7. Berdasarkan gambar 1, manakah di bawah ini simpulan yang PALING MUNGKIN benar?', 'Anggaran pendidikan Indonesia tidak meningkat setiap tahun.', 'Anggaran pendidikan Indonesia mengalami penurunan sejak tahun 2016.', 'Anggaran pendidikan Indonesia berada pada rentang Rp200-Rp500 triliun.', 'Anggaran pendidikan Indonesia selalu mengalami peningkatan setiap tahun.', 'Anggaran pendidikan Indonesia tahun 2016-2017 tidak mengalami peningkatan.', 'Anggaran pendidikan Indonesia selalu mengalami peningkatan setiap tahun.', 'Penalaran Umum'),
(8, '8', '<b><i>Teks berikut ini digunakan untuk menjawab soal 8 sampai dengan 14.</i></b>\r\n<br>\r\n<br>Industry tekstil dan garmen saat ini menjadi industri strategis bagi perekonomian negara mengingat Indonesia memiliki 250 juta penduduk. Industri ini merupakan sector manufaktur terbesar ketiga dan menjadi salah satu industry yang paling banyak menyerap tenaga kerja. Pada tahun 2017, ekspor tekstil dan produk tekstil Indonesia mencapai US$12,4 miliar yang mana melebihi target Asosiasi Pertekstilan Indonesia (API) sebesar US$11,8 miliar. <br>\r\n\r\n<br>Pakaian jadi(koneksi) merupakan salah satu andalan ekspor nonmigas Indonesia. Nilai ekspor konveksi tekstil tersebut merupakan terbesar ketiga setelah batu bara US$20,63 miliar dan minyak sawit US$17,89 miliar. Data Badan Pusat Statistik mencatat nilai ekspor pakaian jadi nasional ke AS sepanjang 2018 mencapai US$3,78 miliar (Rp52,87 triliun) tumbuh 9,3% dari tahun sebelumnya. Negara tujuan ekspor konveksi terbesar kedua adalah Jepang dengan nilai US$372,48 juta. Data 10 negara tujuan utama ekspor pakaian jadi Indonesia disajikan dalam gambar 2. <br>\r\n\r\n<br> <img src=\"fotosoal/PenalaranUmum8.jpg\"> <br>\r\n\r\n(Diadaptasi dari www.tribunnews.com dan www.databoks.katadata.co.id) <br>\r\n\r\n<br>8. Berdasarkan paragraph 1, manakah di bawah ini penyataan yang BENAR?', 'Industri tekstil dan garmen menyerap 250 juta tenaga kerja.', 'Industri tekstil termasuk tiga besar sector manufaktur Indonesia.', 'Industri tekstil berhasil mengekspor produk senilai US$11,8 miliar. ', 'Industri tekstil merupakan kebutuhan pokok seluruh rakyat Indonesia.', 'Industri tekstil tanah air dipantau oleh Asosiasi Pertekstilan Indonesia (API).', 'Industri tekstil merupakan kebutuhan pokok seluruh rakyat Indonesia.', 'Penalaran Umum'),
(9, '9', '9. Berdasarkan paragraph 1, jika penduduk Indonesia berjumlah 250 juta jiwa, manakah di bawah ini simpulan yang BENAR? ', 'Setiap penduduk dapat memproduksi garmen.', 'Setiap penduduk membutuhkan produk pakaian jadi.', 'Setiap penduduk dapat memulai usaha di sector manufaktur.', 'Setiap penduduk harus bekerja di industry tekstil dan garmen.', 'Setiap penduduk dapat menjadi anggota Asosiasi Pertekstilan Indonesia (API).', '', 'Penalaran Umum'),
(10, '10', '10. Berdasarkan paragraph 1, manakah pernyatan di bawah ini yang PALING MUNGKIN benar mengenai industry konveksi?', 'Industry konveksi merupakan produk ekspor impor Indonesia.', 'Industri konveksi termasuk dalam pendapatan sector nonmigas.', 'Industry konveksi memiliki nilai ekspor lebih tinggi daripada batu bara.', 'Industry konveksi merupakan sector manufaktur terbesar di Indonesia.', 'Industry konveksi memiliki nilai ekspor lebih tinggi daripada kelapa sawit.', '', 'Penalaran Umum'),
(11, '11', '11. Berdasarkan paragraph 1, manakah di bawah ini simpulan yang PALING MUNGKIN benar mengenai ekspor pakaian jadi Indonesia?', 'Pertumbuhan pasar ekspor pakaian jadi Indonesia naik 9,3%.', 'Jepang merupakan pasar utama produk pakaian jadi Indonesia.', 'Pasar utama produk pakaian jadi Indonesia adalah Amerika Serikat.', 'Amerika Serikat dan Jerman merupakan dua negara dengan nilai ekspor tertinggi.', 'Nilai ekspor pakaian jadi Indonesia ke Amerika Serikat lebih sedikit daripada tahun lalu.', '', 'Penalaran Umum'),
(12, '12', '12. Berdasakan gambar 2, negara tujuan ekspor manakah yang memberikan nilai ekspor terendah ketiga?', 'Belgia', 'Inggris', 'Kanada', 'Malaysia', 'Australia', '', 'Penalaran Umum'),
(13, '13', '13. Berdasarkan gambar 2, negara tujuan ekspor manakah yang bernilai US$347,2 juta?', 'Jepang', 'Kanada', 'Australia', 'Korea Selatan', 'Amerika Serikat', '', 'Penalaran Umum'),
(14, '14', '14. Berdasarkan gambar 2, negara tujuan ekspor manakah yang memberikan nilai ekspor lebih dari US$500 juta?', 'Belgia', 'Jerman', 'Jepang', 'Tiongkok', 'Korea Selatan', '', 'Penalaran Umum'),
(15, '15', '15. Tentukan bilangan yang tepat pada kotak kosong!<br><br>\r\n<img src=\"fotosoal/PenalaranUmum15.jpg\" style=\"width:50%;\">', '4', '6', '8', '10', '12', '', 'Penalaran Umum'),
(16, '16', '16. Tentukan bilangan yang tepat pada kotak kosong!<br><br>\r\n<img src=\"fotosoal/PenalaranUmum16.jpg\" style=\"width:50%;\">', '12', '14', '15', '16', '17', '', 'Penalaran Umum'),
(17, '17', '17. <img src=\"fotosoal/PenalaranUmum17.jpg\" style=\"width:30%;\">', '0.02250', '0.15000', '0.16875', '0.33750', '0.67500', '', 'Penalaran Umum'),
(18, '18', '18. <img src=\"fotosoal/PenalaranUmum18.jpg\" style=\"width:30%;\">', '0.67', '0.7', '0.75', '0.77', '0.8', '', 'Penalaran Umum'),
(19, '19', '19. Sebuah bilangan terdiri dari empat buah angka yang berbeda. Jumlah keempat angka adalah 12. Angka pertama ditambah angka ketiga sama dengan angka keempat dikurangi angka kedua. Angka kedua sama dengan selisih angka pertama dan ketiga. Angka keempat dibagi angka ketiga sama dengan angka pertama dibagi angka kedua. Bilangan tersebut adalah...', '1236', '1326', '1632', '2136', '2316', '', 'Penalaran Umum'),
(20, '20', '20. Sekolah Populer memiliki sebuah asrama berisi sejumlah kamar. Jika setiap kamar diisi dua orang siswa, akan ada dua belas siswa yang tidak memperoleh kamar. Jika setiap kamar diisi oleh tiga orang siswa aka nada dua kamar yang kosong. Berapa banyak kamar yang tersedia di asrama Sekolah Populer?', '16', '18', '20', '22', '24', '', 'Penalaran Umum'),
(21, '1', '<i>Teks berikut digunakan untuk menjawab soal nomor 1 sampai dengan nomor 7.</i>\r\n<br>\r\n<br>\r\n(1) Akhir bulan lalu, KEIN (Komite Ekonomi dan Industri Nasional) mengeluarkan pernyataan resmi yang intinya indonesia siap \"go nuclear\". (2) Ini bukan untuk masalah persenjataan,... untuk ketenagalistrikan yang memanfaatkan tenaga nuklir sebagai energi primer mesin pembangkit listrik. (3) Ketua Kelompok Kerja Sektor Energi dan Sumber Daya Mineral pada KEIN, Zulnahar Usman, mengatakan bahwa nuklir dapat dimanfaatkan untuk memperkuat ketehanan energi nasional. (4) Teknologi nuklir kian canggih dengan tingkat keamanan yang terus membaik berdasarkan pengalaman yang didapat kunjungan kerja KEIN di Jepang Maret lalu. (5) Selain mencermati keberhasilan Jepang dalam pembangunan dan pengoperasian PLTN (pembangkit listrik tenaga nuklir), masalah yang tidak kalah pentingnya adalah sosialisasi kepada masyarakat mengenai rencana pembangunan PLTN di Indonesia yang dijamin aman. (6) Saat ini, jepang merupakan negara terdepan dan termaju dalam teknologi dunia, seperti halnya AS, teristimewa dalam perlistrikan dan pernukliran.<br><br>\r\n	(7) Nuklir sebenarnya bukan barang yang dilarang sebagai sumber tenaga listrik di dalam perundang-undangan RI. (8) .... (9) Tetapi, ada catatan atau persyaratan terkait pembangunan PLTN di Indonesia, yaitu menjadi opsi terakhir dan memperhatikan faktor keselamatan secara ketat. (10) Bahkan, dalam buku Outlook Energi Indonesia 2018 yang diterbitkan oleh BPPT (Badan Pengkajian dan Penerapan Teknologi) menyebutkan, nuklir berpotensi sebagai substitusi energi fosil dan akan memerkaya sumber energi baru yang dibarukan di Indonesia. (11) Nuklir - yang masuk sebagai kategori energi baru, tetapi tidak terbarukan - dipercaya mampu menggantikan peran energi fosil yang suatu saat cadangannya pasti habis, seperti minyak, gas bumi, dan batu bara. (12) Ketiga jenis energi fosil itu, potensi dan sumber dayanya di Indonesia masih melimpah meski tidak bisa disebut sangat melimpah. (13) Selain itu, Indonesia juga diberkahi sumber daya energi terbarukan, seperti tenaga hidro, bayu, surya, hingga jenis bahan bakar nabati.<br><br>\r\n\r\n1. Kalimat yang <i>tidak</i> mendukung isi teks tersebut adalah \r\n', 'Kalimat (4).', 'Kalimat (5).', 'Kalimat (6).', 'Kalimat (10).', 'Kalimat (11).', 'Kalimat (11).', 'Pemahaman Bacaan dan Menulis'),
(22, '2', '2. Bentukan kata yang tidak tepat dalam teks tersebut adalah', 'Kata <i>pembangkit</i> pada kalimat (2).', 'Kata <i>pernukliran</i> pada kalimat (6).', 'Kata <i>memperhatikan</i> pada kalimat (9).', 'Kata <i>memerkaya</i> pada kalimat (10).', 'Kata <i>diberkahi</i> pada kalimat (13).', 'Kata <i>diberkahi</i> pada kalimat (13).', 'Pemahaman Bacaan dan Menulis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_ujian`
--

CREATE TABLE `status_ujian` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_ujian`
--

INSERT INTO `status_ujian` (`id`, `status`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id` int(11) NOT NULL,
  `id_ujian` varchar(255) NOT NULL,
  `nama_ujian` varchar(255) NOT NULL,
  `waktu_ujian` varchar(255) NOT NULL,
  `jumlah_soal` int(255) NOT NULL,
  `status_ujian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id`, `id_ujian`, `nama_ujian`, `waktu_ujian`, `jumlah_soal`, `status_ujian`) VALUES
(1, 'penalaran_umum', 'Penalaran Umum', '2', 20, 'Pending'),
(2, 'pemahaman_bacaan_dan_menulis', 'Pemahaman Bacaan dan Menulis', '40', 20, 'Pending'),
(3, 'pengetahuan_dan_pemahaman_umum', 'Pengetahuan dan Pemahaman Umum', '45', 20, 'Pending'),
(4, 'pengetahuan_kuantitatif', 'Pengetahuan Kuantitatif', '30', 20, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_ujian`
--
ALTER TABLE `status_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `status_ujian`
--
ALTER TABLE `status_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
