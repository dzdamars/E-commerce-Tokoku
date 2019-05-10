-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Okt 2018 pada 17.09
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lks_dam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'c93ccd78b2076528346216b3b2f701e6'),
(3, 'admin2', 'c84258e9c39059a89ab77d846ddab909');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama_item` varchar(250) NOT NULL,
  `merk` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id_item`, `id_kategori`, `id_lokasi`, `nama_item`, `merk`, `harga`, `qty`, `diskon`, `deskripsi`, `foto`, `terjual`) VALUES
(1, 6, 3, 'T-shirt NET. Indonesia', 'Baju', 310000, 11, 20, 'Baju paling super', 'baju_net.jpg', 9),
(2, 2, 3, 'Wardah Perfect Bright', 'Wardah', 40000, 35, 10, 'Wardah untuk muka', 'wardah.jpg', 5),
(3, 6, 3, 'Batman T-shirt Darkuu', 'Baju', 330000, 13, 20, 'T-shirt Batman kualitas tinggi dengan cotton', 'baju_batman.jpg', 28),
(4, 2, 3, 'Clean & Clear Foaming Fash Wash', 'Wardah', 45000, 40, 10, 'Clean and Clear Facial Wash untuk muka yang jerawatan', 'clean-clear.png', 1),
(5, 3, 3, 'Mouse Gaming Wireless Tecknet', 'Tecknet', 30000, 15, 30, 'Mouse Wireless untuk para pengguna gamer', 'mouse.jpg', 6),
(6, 4, 6, 'ASUS ROG GL703VM-i7', 'Asus', 12000000, 14, 30, 'laptop rog yang cocok untuk gaming, sangat cocok pokoknya', 'rog.jpg', 8),
(7, 4, 2, 'Pc Desktop Dell 20 Inch', 'Dell', 8000000, 15, 10, 'pc desktop Dell cocok untuk kamu yang pekerja kantoran', 'pc.jpg', 16),
(8, 5, 2, 'Samsung Galaxy S9 64 GB', 'Samsung', 9000000, 17, 30, 'Samsung Galaxy S9 yang dijual murah daripada yang laen', 's9.jpg', 5),
(9, 1, 2, 'Skull Gaming Headset', 'Sadaz', 80000, 18, 5, 'Headset gaming cocok untuk kamu para gamer', 'headset.jpg', 30),
(13, 3, 2, 'G-Skill Mechanic Keyboard Gaming', 'G-SKill', 500000, 23, 20, 'Keyboard mekanik G-Skill yang kualitas nya tidak perlu diragukan lagi,cocok bagi kalian para Gamer', 'key2.jpg', 24),
(14, 5, 4, 'Sony Experia XZ2 32Gb 4Gb Ram', 'Sony', 8000000, 17, 20, 'Produk terbaru sony xperia yang lebih unggul daripada pendahulunya yaitu xperia XZ, yang mempunyai kamera 20.1 MP dan mempunyai ram 4 GB', 'xperia.jpg', 3),
(15, 7, 2, 'SimWood Sweater', 'SimWood', 200000, 20, 30, 'Sweater yang cocok saat ingin berjalan-jelan dengan teman atau keluarga, dengan bahan yang sangat halus', 'men_fashion2.jpg', 0),
(16, 7, 3, 'BB Navy Grey Hoodie', 'BB', 100000, 17, 50, 'Jaket Hoodie dengan kualitas yang sangat bagus dan bahan yang sangat lembut.', 'men_fashion1.jpeg', 23),
(17, 9, 3, 'Parka Jacket Black', 'Horizon', 100000, 17, 10, 'Jaket yang bagus untuk anak-anak', 'kid_fashion4.jpg', 3),
(18, 9, 4, 'Tas Selendang Larva', 'SarangHeo', 200000, 25, 10, 'Tas lucu dengan karakter Larva berwarna kuning yang imut', 'kid_fashion3.jpg', 5),
(19, 9, 2, 'Short Yellow Dress', 'DC', 200000, 17, 50, 'Dress gaun berwarna kuning yang imut dan cocok untuk anakmu yang imut juga', 'kid_fashion2.jpg', 13),
(20, 10, 5, 'Jaket Pria Fleece Polos Navy Donker', 'Typisch', 75000, 26, 5, 'Jaket polos yang sangat cocok untuk kamu yang polos', 'jaket_cowo1.jpg', 4),
(21, 10, 6, 'Jaket Catenzo Brown', 'Catenzo', 110000, 15, 20, 'Jaket berwarna coklat muda yang sangat cocok untuk perempuan imut kaya kamu, iya kamu', 'jaket_cewe1.jpg', 5),
(22, 11, 2, 'Polo Long Shirt Women', 'Polo', 200000, 25, 70, 'T-shirt polo yang sangat cocok untuk kamu para perempuan', 'women_fashion.jpg', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Headset'),
(2, 'Kecantikan'),
(3, 'Keyboard & Mouse'),
(4, 'Pc & Laptop'),
(5, 'Handphone'),
(6, 'Baju'),
(7, 'Men Fashion'),
(9, 'Kid Fashion'),
(10, 'Jaket'),
(11, 'Women Fashion');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'Jakarta'),
(2, 'Bogor'),
(3, 'Depok'),
(4, 'Tangerang'),
(5, 'Bekasi'),
(6, 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id_member` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `telepon` int(11) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id_member`, `id_lokasi`, `nama`, `email`, `password`, `telepon`, `no_rekening`, `kode_pos`, `alamat`, `foto`) VALUES
(9, 2, 'Dzumaratin', 'damar0510@gmail.com', '482f396c45cf8157ced5cade6d04e148', 2147483647, 12121212, 16810, 'Rumah puri nirwana', '4956GAMBAR.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `judul_menu` varchar(250) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `judul_menu`, `caption`, `status`, `konten`) VALUES
(1, 'About', 'Tentang Kami', 1, 'Kami adalah perusahaan E-Commerce yang akan membantu segala kebutuhan anda dengan berbelanja online'),
(2, 'Contact', 'Hubungi Kami', 1, '<b>- CEO TOKOKU -</b> <br><br>\r\nDzumaratin Damar Sasongko <br><br>\r\n<b>No Telp : 0822-1919-4018</b>'),
(3, 'Legal', 'Legalitas Website', 2, 'Website ini punya legalitas'),
(4, 'Service', 'Ini Service', 2, 'keren service');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id_od` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_group`
--

CREATE TABLE `order_group` (
  `id_og` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bp` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bank` varchar(150) NOT NULL,
  `resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_od`);

--
-- Indexes for table `order_group`
--
ALTER TABLE `order_group`
  ADD PRIMARY KEY (`id_og`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_od` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `order_group`
--
ALTER TABLE `order_group`
  MODIFY `id_og` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
