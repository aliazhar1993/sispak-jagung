-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jan 2020 pada 08.44
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `idgej` varchar(4) NOT NULL,
  `nama_gej` varchar(300) NOT NULL,
  `gambar_gej` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgej`, `nama_gej`, `gambar_gej`) VALUES
('G001', 'Adanya bekas gigitan pada daun', ''),
('G002', 'Pucuk daun layu', ''),
('G003', 'Batangnya patah dekat permukaan tanah', ''),
('G004', 'Adanya bekas gigitan pada batangnya', ''),
('G005', 'Akar rusak karena gigitan lundi', ''),
('G006', 'Tanaman menjadi layu', ''),
('G007', 'Daun berklorosis sebagian atau seluruh daun', ''),
('G008', 'Tanaman menjadi kerdil', ''),
('G009', 'Tidak berbuah', ''),
('G010', 'Tongkolnya tidak normal', ''),
('G011', 'Daun berwarna hijau dan diselingi garis kuning', ''),
('G012', 'Daun tampak bercak bergaris kuning', ''),
('G013', 'Adanya garis-garis pendek terputus-putus pada tulang daun', ''),
('G014', 'Daun tampak bergaris kuning panjang', ''),
('G015', 'Bercak coklat kelabu pada permukaan daun', ''),
('G016', 'Permukaan daun berwarna coklat', ''),
('G017', 'Bercak melebar pada daun', ''),
('G018', 'Pelepah berwarna merah keabu-abuan', ''),
('G019', 'Adanya butiran berwarna putih', ''),
('G020', 'Tulang daun rusak', ''),
('G021', 'Batang busuk', ''),
('G022', 'Bagian atas layu dan mengering', ''),
('G023', 'Rusaknya tongkol', ''),
('G024', 'Terdapat titik merah kecoklatan seperti karat', ''),
('G025', 'Tongkol pembungkus rusak', ''),
('G026', 'Ada ulat ditongkol jagung', ''),
('G027', 'Warna daun dari hijau normal menjadi kekuning-kuningan', ''),
('G028', 'Daun tanaman muda rusak', ''),
('G029', 'Pada pagi hari disisi bawah daun jagung terdapat lapisan beledu putih', ''),
('G030', 'Daun bagian bawah dan atas dipegang tidak terasa adanya serbuk spora', ''),
('G031', 'Lubang kecil pada daun', ''),
('G032', 'Lubang gorokan pada batang', ''),
('G033', 'Batang dan tassel yang mudah patah', ''),
('G034', 'Tumpukan tassel yang rusak', ''),
('G035', 'Biji akan rusak dan busuk,bahkan tongkol dapat gugur', ''),
('G036', 'Permukaan biji tertutupi miselium berwarna abu-abu sampai hitam', ''),
('G037', 'Tanaman cepat mati atau mengering', ''),
('G038', 'Daun menjadi transparan', ''),
('G039', 'Berlubang bahkan tinggal tulang-tulang saja', ''),
('G040', 'Pangkal batang atau tongkol berwarna merah jambu, merah kecoklatan atau coklat', ''),
('G041', 'Apakah tanaman mudah rebah', ''),
('G042', 'Apakah bagian batang kulit luarnya tipis', ''),
('G043', 'Terdapat serbuk berwarna kuning kecoklatan', ''),
('G044', 'Biji jagung yang bengkak berwarna hitam', ''),
('G045', 'Sebagian biji jagung yang bengkak tersembul keluar', ''),
('G046', 'Terdapat kotoranï¿½kotoran di tongkol jagung', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE IF NOT EXISTS `konsultasi` (
  `idkon` varchar(6) NOT NULL,
  `iduser_kon` int(11) NOT NULL,
  `tgl_kon` datetime NOT NULL,
  `idpen_kon` varchar(3) NOT NULL,
  `cf_kon` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`idkon`, `iduser_kon`, `tgl_kon`, `idpen_kon`, `cf_kon`) VALUES
('K00003', 15, '2020-01-09 15:44:29', 'P01', '0.29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi_gejala`
--

CREATE TABLE IF NOT EXISTS `konsultasi_gejala` (
`idkg` int(11) NOT NULL,
  `idkon_kg` varchar(6) NOT NULL,
  `idgej_kg` varchar(4) NOT NULL,
  `cf_kg` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `konsultasi_gejala`
--

INSERT INTO `konsultasi_gejala` (`idkg`, `idkon_kg`, `idgej_kg`, `cf_kg`) VALUES
(1, 'K00001', 'G001', '1.00'),
(2, 'K00001', 'G002', '1.00'),
(3, 'K00001', 'G021', '1.00'),
(4, 'K00001', 'G027', '1.00'),
(5, 'K00001', 'G001', '1.00'),
(6, 'K00001', 'G002', '1.00'),
(7, 'K00001', 'G021', '1.00'),
(8, 'K00001', 'G027', '1.00'),
(9, 'K00002', 'G001', '1.00'),
(10, 'K00002', 'G002', '1.00'),
(11, 'K00002', 'G021', '1.00'),
(12, 'K00002', 'G027', '1.00'),
(13, 'K00003', 'G001', '0.20'),
(14, 'K00003', 'G002', '0.20'),
(15, 'K00003', 'G021', '0.20'),
(16, 'K00003', 'G027', '0.20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE IF NOT EXISTS `pengelola` (
`idpeng` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `passw` varchar(32) NOT NULL,
  `nama_peng` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pengelola`
--

INSERT INTO `pengelola` (`idpeng`, `email`, `passw`, `nama_peng`, `alamat`, `level`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Pengelola 1', 'Padang', 0),
(2, 'ali.azhar@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'ali azhar', 'padang', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE IF NOT EXISTS `penyakit` (
  `idpen` varchar(3) NOT NULL,
  `nama_pen` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `pencegahan` text NOT NULL,
  `penanganan` text NOT NULL,
  `gambar_pen` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`idpen`, `nama_pen`, `ket`, `pencegahan`, `penanganan`, `gambar_pen`) VALUES
('P01', 'Lalat bibit', 'lalat bibit adalah sekelompok lalat kecil yang memiliki sekitar 220 spesies dan sebagian anggotanya merupakan hama penting dan merusak pada pertanaman, terutama pada serealia.', 'Perawatan Tanaman, Penyemprotan Pestisida, Pengairan Tanaman, Pembersihan Gulma', 'penanganan hama ini dapat dilakukan dengan cara melakukan penyemprotan insektisida sesuai dengan dosis yang dianjurkan', 'P01.jpg'),
('P02', 'Ulat tanah', 'Ulat Tanah adalah ulat yang hidup di tanah biasa sebagai hama yang serangannya menyebabkan pangkal batang patah. Hama tersebut akan menyerang dengan cara memotong batang tanaman sehingga tanaman tersebut mati. Kemungkinan hama ulat tanah tersebut berasal dari penggunaan kotoran ayam dan sapi.', 'a. Penggunaan varietas bibit yang resisten\r\nb. Penggunaan teknik-teknik agronomi\r\nc. Penggunaan desinfektan pada benih yang akan ditanam\r\nd. Pemeliharaan dan pemanfaatan musuh-musuh alami\r\n', 'tanam serentak, dapat pula dilakukan penggenangan.', 'P02.jpg'),
('P03', 'Lundi (uret)', 'adalah serangga hama polifag (pemakan rupa-rupa) yang menyerang perakaran berbagai jenis tumbuhan. Fase hidup yang paling mengganggu pertanian adalah fase larva yang dikenal dengan nama umum hama uret atau gayas.', 'a. Penggunaan varietas bibit yang resisten\r\nb. Penggunaan teknik-teknik agronomi\r\nc. Penggunaan desinfektan pada benih yang akan ditanam\r\nd. Pemeliharaan dan pemanfaatan musuh-musuh alami\r\n', 'pergiliran tanaman atau mengolah tanah dengan baik untuk mematikan larva.', 'P03.jpg'),
('P04', 'Penyakit bulai', 'Penyakit bulai merupakan penyakit utama pada tanaman jagung yang disebabkan oleh jamur Peronosclerospora Maydis. Perkembangan penyakit ini dimulai dengan infeksi konidia (spora jamur) yang jatuh di permukaan daun jagung. Konidia tersebut kemudian berkembang dan masuk ke dalam jaringan tanaman muda melalui stomata dan selanjutnya berkembang hingga ke titik tumbuh tanaman.\r\n\r\nInfeksi jamur ini bisa dilihat cukup jelas pada pagi hari antara pukul 04.00-05.30, dimana pada daun yang terinfeksi akan terlihat spora jamur berbentuk butiran berwarna putih.', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'dengan cara memberikan Ridomil 35 SD pada saat masih benih agar tidak tumbuh jamur pada biji jagung.', 'P04.jpg'),
('P05', 'Virus mozaik Kerdil', 'Penyakit Jagung Mosaic Kerdil Virus merupakan suatu wabah penyakit tanaman jagung yang disebabkan oleh virus Maize Dwarf Mosaic (MDMV).\r\n\r\nVirus Maize Dwarf Mosaic (MDMV) merupakan virus tanaman pathogen dari keluarga Potyviridae.\r\n\r\nSerangan penyakit ini tergantung pada tahap pertumbuhan tanaman jagung. Umumnya penyakit Mosaic Kerdil ini dapat menyebabkan kerusakan yang parah dan merugikan secara ekonomi.', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'insektisida untuk mengendalikan vektor dengan yang berbahan aktif monokrotofos, tamaron atau thiodan dan melakukan eradikasi pada tanaman yang terserang', 'P05.jpg'),
('P06', 'Penggerek batang', 'adalah hama yang tergolong pengganggu utama. Hama ini menyerang tanaman padi pada semua fase pertumbuhan tanaman mulai dari persemaian hingga menjelang panen', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'dengan melakukan penyemprotan menggunakan insektisida yang sesuai dengan dosis yang di anjuran', 'P06.jpg'),
('P07', 'Penyakit bercak daun', 'Penyakit bercak daun adalah salah satu jenis penyakit yang umum menyerang beberapa jenis tanaman budidaya. Penyakit ini cukup meresahkan petani. Bukan hanya karena merugikan secara ekonomi, tapi juga sangat mudah menyebar.     Seperti umumnya jenis penyakit yang disebabkan oleh jamur, penyakit bercak daun juga sangat mudah menular ke tanaman sehat lainnya. Oleh sebab itu, jika tidak dikendalikan secara tepat, maka penyakit ini akan sangat merugikan. Biasanya penyakit ini mulai muncul saat musim hujan dan kondisi kelembaban cukup tinggi.', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'menggunakan varietas tahan untuk H. turcicum di dataran tinggi,  seperti Pioneer-8, NK-11.', 'P07.jpg'),
('P08', 'Penyakit hawar/upih daun', 'Pada kondisi alami, serangan terjadi pada fase sebelum pembungaan. Infeksi biasanya dimulai dari pelepah daun terbawah dan seterusnya hingga ke ujung. R. solani dapat hidup sebagai miselium dengan cara saprofit; sklerotia dan atau miselia yang berada di tanah atau jaringan tanaman tumbuh dan membentuk hifa yang dapat menginfeksi beberapa jenis tanaman. Struktur tanah yang jelek dan RH tinggi merupakan kondisi yang mendukung bagi pertumbuhan pathogen. ', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'dilakukan dengan cara melakukan penyemprotan fungisida atau dengan menggunakan thiram dan karboxin, serta pengasapan atau perawatan suhu panas selama 17 menit dengan suhu 55°C.', 'P08.jpg'),
('P09', 'Ulat grayak', 'Ulat Grayak merupakan salah satu hama yang menyerang tanaman jagung. Ulat ini tidak berbulu dan biasa disebut oleh petani sebagai ulat tentara karena menyerang dengan populasi tinggi. “Karena itu, petani rentan merugi,” terang Riyono Yekti Wibowo, koordinator Petugas Pemantau Organisme Pengganggu Tanaman (POPT) Kediri.  Siklus hidup ulat grayak dapat berlangsung dari 32 – 46 hari. Fase Telur selama 2-3 hari dengan jumlah telur dapat mencapai 1.046 telur. Fase larva selama 14-19 hari. Fase pupa selama 9-12 hari dan Fase Imago selama 7-12 hari.', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'melakukan penyemprotan menggunakan insektisida yang sesuai dan menggunakan dosis sesuai anjuran', 'P09.jpg'),
('P10', 'Penyakit busuk batang dan tongkol', 'Gejala penyakit ini umumnya terjadi setelah fase pembungaan. Pangkal batang yang terinfeksi berubah warna dari hijau menjadi kecokelatan, bagian dalam busuk, sehingga mudah rebah, pada bagian kulit luarnya tipis. Pada pangkal batang terinfeksi tersebut ada yang memperlihatkan warna merah jambu, merah kecokelatan atau coklat. Penyakit ini dapat disebarkan oleh angin, air hujan, dan serangga.', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'dengan menggunakan varietas tahan, pemupukan berimbang, hindari penanaman pada musim hujan, dan dapat pula menggunakan fungisida', 'P10.jpg'),
('P11', 'Penyakit karat', 'Gejala penyakit ini terjadi ketika timbul bercak-bercak kecil berbentuk bulat sampai oval terdapat pada permukaan daun jagung di bagian atas dan bawah. Bercak ini menghasilkan uredospora yang berbentuk bulat atau oval dan berperan penting sebagai sumber inokulum dalam menginfeksi tanaman jagung yang lain dan sebarannya melalui angin. Penyakit karat dapat terjadi di dataran rendah sampai tinggi dan infeksinya berkembang baik pada musim penghujan atau musim kemarau.', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'dapat dilakukan dengan cara menanam varietas tahan, menjaga sanitasi lingkungan di pertanaman tanaman jagung, aplikasi pestisida pada saat mulai tampak bisul karat pada daun.', 'P11.jpg'),
('P12', 'Penyakit gosong bengkak', 'Petani jagung pastinya tidak merasa asing ketika mendengar tanaman jagungnya terserang penyakit gosong bengkak. Penyakit ini bukanlah penyakit utama pada tanaman jagung, akan tetapi keberadaannya perlu untuk diperhatikan.  Jenis penyakit ini disebabkan oleh jamur Ustilago maydis yang dapat menyebabkan tongkol jagung mengalami pembengkakan dan mengeluarkan kelenjar (gall).  Penyakit dimulai dengan adanya infeksi spora jamur ke dalam biji pada tongkol jagung sehingga mengakibatkan terjadinya pembengkakan pada biji jagung. Pada awalnya, biji jagung tersebut berwarna putih bersih, akan tetapi lama kelamaan biji jagung menjadi berwarna hitam.', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'Melakukan pergiliran tanaman.\r\n- Melakukan pemupukan berimbang, menghindari pemberian N tinggi dan K rendah.\r\n- Drainase baik.\r\n- Pengendalian penyakit busuk batang (Fusarium) secara hayati dapat dilakukan dengan cendawan    antagonis Trichodermasp.\r\n\r\n', 'P12.jpg'),
('P13', 'belalang', 'Belalang pasti sudah tidak asing lagi bagi petani. Belalang bisa menjadi momok yang menakutkan bagi petani ketika mereka sudah membentuk sebuah kelompok atau koloni.  Serangan hebat oleh sekelompok belalang, dilaporkan pernah terjadi di Nusa Tenggara Timur, Sumba, Lampung, Sumatera Selatan, Kalimantan Tengah, Kalimantan Barat, Sulawesi Tenggara dan Provinsi Gorontalo. Serangan hama ini menyebabkan penurunan hasil panen dalam jumlah yang drastis.', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'dengan cara melepaskan predator alaminya yaitu berupa burung atau laba-laba, bisa juga dengan menggunakan biopestisida.', 'P13.jpg'),
('P14', 'Penggerek tongkol', 'Hama ini berupa serangga yang akan meletakkan telur pada silk jagung dan sesaat setelah menetas larva akan menginvasi masuk kedalam tongkol dan akan memakan biji yang sedang mengalami perkembangan. Serangga ini akan menurunkan kualitas dan kuantitas tongkol jagung. Serangan biasanya muncul di pertanaman pada umur 45-56 hari setelah tanam, bersamaan dengan munculnya rambut-rambut tongkol.', 'a. Penggunaan varietas bibit yang resisten\r\nb. Penggunaan teknik-teknik agronomi\r\nc. Penggunaan desinfektan pada benih yang akan ditanam\r\nd. Pemeliharaan dan pemanfaatan musuh-musuh alami\r\n', 'dengan menggunakan parasit Trichogramma sp.,, menggunakan insektisida bila ditemui 3 tongkol rusak per 50 tanaman pada saat tanaman baru terbentuk buah dengan mengaplikasikan insektisida Carbofuran 3% pada saat menjelang berbunga.   ', 'P14.jpg'),
('P15', 'Wereng jagung', 'Bentuk dan ukuran serangga dewasa mirip dengan hama wereng coklat dewasa yang meyerang padi. Siklus hidup 25 hari, masa telur 8 hari, telurnya berbentuk bulat panjang dan agak membengkok (seperti buah pisang), warna putih bening yang diletakkan pada jaringan pelepah daun secara terpisah atau berkelompok (Lilies 1991). ', '•  Perlakuan Benih, Sebelum ditanam sebaiknya benih dicampur terlebih dahulu dengan fungisida yang berbahan aktif dimetomorf (Renon, akrobat, Sirkus, dll) \r\n•  Lakukan Penyemprotan ketika tanaman jagung berumur 1 minggu hingga 35 hst dengan fungisida berbahan aktif iprodium dan menggunakan obat carbio dengan dosis 15-25cc setiap 17 liter air, semprotkan dengan jarak 7 hari \r\n•  Pemupukan pertama sebaiknya jangan menggunakan urea, gunakan Phonska + SP, atau bisa juga ditambah ZA dan Organik. Selanjutnya pemupukan tahap kedua gunakan pupuk ZA+Ponska+organik dan pemupukan terakhir gunakan Urea. \r\n•  Taburi lahan dengan bahan organik seperti pupuk kandang, Bhokasi, sebelum lahan ditanami\r\n', 'waktu tanam serempak, waktu tanam dilakukan pada akhir musim hujan dan bila menggunakan insektisida gunakan insektisida Carbofuran 3%.', 'P15.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pg`
--

CREATE TABLE IF NOT EXISTS `pg` (
`idpg` int(11) NOT NULL,
  `idpen_pg` varchar(3) NOT NULL,
  `idgej_pg` varchar(4) NOT NULL,
  `cf_gej` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=668 ;

--
-- Dumping data untuk tabel `pg`
--

INSERT INTO `pg` (`idpg`, `idpen_pg`, `idgej_pg`, `cf_gej`) VALUES
(582, 'P01', 'G001', '0.20'),
(583, 'P01', 'G002', '0.40'),
(584, 'P01', 'G027', '0.20'),
(585, 'P01', 'G021', '0.80'),
(586, 'P01', 'G079', '0.40'),
(587, 'P02', 'G003', '0.40'),
(588, 'P02', 'G004', '0.80'),
(589, 'P02', 'G028', '0.20'),
(590, 'P03', 'G005', '0.40'),
(591, 'P03', 'G006', '0.40'),
(592, 'P04', 'G007', '0.20'),
(593, 'P04', 'G008', '0.20'),
(594, 'P04', 'G009', '0.60'),
(595, 'P04', 'G010', '0.40'),
(596, 'P04', 'G029', '0.20'),
(597, 'P05', 'G008', '0.40'),
(598, 'P05', 'G011', '0.20'),
(599, 'P05', 'G030', '0.20'),
(600, 'P06', 'G012', '0.20'),
(601, 'P06', 'G013', '0.40'),
(602, 'P06', 'G006', '0.20'),
(603, 'P06', 'G014', '0.20'),
(604, 'P06', 'G008', '0.20'),
(605, 'P06', 'G006', '0.20'),
(606, 'P06', 'G031', '0.20'),
(607, 'P06', 'G032', '0.20'),
(608, 'P06', 'G033', '0.20'),
(609, 'P06', 'G034', '0.20'),
(610, 'P07', 'G015', '0.20'),
(611, 'P07', 'G016', '0.20'),
(612, 'P07', 'G035', '0.20'),
(613, 'P07', 'G036', '0.20'),
(614, 'P07', 'G006', '0.20'),
(615, 'P08', 'G017', '0.20'),
(616, 'P08', 'G018', '0.20'),
(617, 'P08', 'G019', '0.20'),
(618, 'P08', 'G037', '0.20'),
(621, 'P09', 'G008', '0.20'),
(622, 'P09', 'G020', '0.20'),
(623, 'P09', 'G038', '0.20'),
(624, 'P09', 'G039', '0.20'),
(628, 'P10', 'G021', '0.20'),
(629, 'P10', 'G022', '0.20'),
(630, 'P10', 'G023', '0.20'),
(631, 'P10', 'G040', '0.20'),
(632, 'P10', 'G041', '0.20'),
(633, 'P10', 'G042', '0.20'),
(634, 'P10', 'G040', '0.20'),
(635, 'P11', 'G024', '0.20'),
(636, 'P11', 'G016', '0.20'),
(637, 'P11', 'G043', '0.20'),
(640, 'P12', 'G024', '0.20'),
(641, 'P12', 'G045', '0.20'),
(642, 'P12', 'G016', '0.20'),
(643, 'P12', 'G043', '0.20'),
(645, 'P13', 'G001', '0.20'),
(646, 'P13', 'G004', '0.20'),
(647, 'P13', 'G006', '0.20'),
(648, 'P13', 'G020', '0.20'),
(654, 'P14', 'G026', '0.20'),
(655, 'P14', 'G023', '0.20'),
(656, 'P14', 'G046', '0.20'),
(661, 'P15', 'G012', '0.20'),
(662, 'P15', 'G002', '0.20'),
(663, 'P15', 'G014', '0.20'),
(665, 'P15', 'G008', '0.20'),
(666, 'P15', 'G006', '0.20'),
(667, 'id ', 'id g', '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`iduser` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `passw` varchar(32) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `email`, `passw`, `nama_user`, `jk`, `alamat`, `tgl_daftar`, `level`) VALUES
(15, 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ali azhar', 'Laki-laki', 'padang12', '2018-12-28 21:19:59', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
 ADD PRIMARY KEY (`idgej`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
 ADD PRIMARY KEY (`idkon`);

--
-- Indexes for table `konsultasi_gejala`
--
ALTER TABLE `konsultasi_gejala`
 ADD PRIMARY KEY (`idkg`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
 ADD PRIMARY KEY (`idpeng`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
 ADD PRIMARY KEY (`idpen`);

--
-- Indexes for table `pg`
--
ALTER TABLE `pg`
 ADD PRIMARY KEY (`idpg`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsultasi_gejala`
--
ALTER TABLE `konsultasi_gejala`
MODIFY `idkg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
MODIFY `idpeng` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pg`
--
ALTER TABLE `pg`
MODIFY `idpg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=668;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
