-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Sep 2023 pada 16.01
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi_berita` text NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(20) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `jam`, `tanggal`, `hari`, `gambar`) VALUES
(21, '10 ALASAN ANDA MASUK PONDOK PESANTREN', 'Pondok pesantren merupakan tempat yang indah sekaligus horor untuk menuntut ilmu. Menjadi indah karena lingkungan untuk belajar sangat mendukung. Suasananya selalu sejuk karena hati selalu tersiram dengan tausyiah, lisan yang selalu mengucap basmalah, dan pola pikir yang selalu terarah. Namun juga menjadi horor karena peraturan dan disiplinnya yang mendidik para santri agar menjadi orang yang berguna, mental baja dan karakter pemimpin.<br /><br />Berduyun-duyun orang masuk ke pondok pesantren untuk menyandang sebuah nama yaitu santri. Ada apa dengan santri? Kenapa mereka memilih menjadi santri?. Pertanyaan-pertanyaan ini Insya Allah akan terjawab di artikel ini. Mereka masuk pondok pesantren tentunya dengan latar belakang yang berbeda dan alasan yang berbeda.<br /><br />Setidaknya ada dua pengaruh yang menjadikan seseorang masuk pondok pesantren yaitu, pengaruh internal dan pengaruh eksternal. Pengaruh internal adalah seseorang yang masuk pondok pesantren karena kemauannya sendiri, dan sebaliknya pengaruh eksternal adalah seseorang yang masuk pondok pesantren karena bukan atas dasar kemauannya (kemauan yang tidak datang dari kepribadiannya sendiri).<br /><br />Berikut ini telah kami rangkum menjadi 10 alasan mengapa seseorang masuk pondok pesantren. Dari 10 alasan itu terdiri dari 5 pengaruh internal dan 5 pengaruh eksternal. &nbsp;<br /><br />1. Dipaksa<br /><br />Dipaksa, terpaksa lalu terbiasa. Inilah mungkin kata-kata yang selalu kita dapat di pesantren. Tidaklah sedikit orang yang masuk pondok pesantren dengan latar belakang dipaksa. Belum diketahui berapa persentase-nya, karena tiap pondok pesantren pasti berbeda-beda. Orang-orang yang masuk pondok pesantren karena dipaksa, biasanya dipaksa oleh orang tua mereka. Alasan orang tua memaksa anaknya untuk mondok juga beragam. Ada yang karena orang tuanya dulu juga mondok di pesantren, ada juga yang orang tuanya tidak pernah mondok tapi mau anaknya mondok dan belajar ilmu agama.<br /><br />Santri yang dipaksa untuk masuk pondok pesantren biasanya tidak kerasan (tidak betah). Ketika mereka belum juga bisa beradaptasi, mereka condong melakukan hal-hal yang melanggar peraturan pondok, seperti: kabur dari pondok, malas dalam belajar, malas dalam mengikuti kegiatan pondok, dan lain-lain. Tapi itu tidak terjadi di semua santri yang masuk pondoknya karena dipaksa. Banyak juga dari santri-santri yang dipaksa justru menjadi santri yang berprestasi baik ilmu, amal dan akhlaqnya.<br />&nbsp;<br />Masih ingat kan sosok penulis novel Negeri Lima Menara. Dialah Ahmad Fuadi yang telah berhasil mendapatkan 9 beasiswa untuk belajar di luar negeri. Ia berhasil menggapai mimpi-mimpinya setelah mengenyam pendidikan di sebuah pondok pesantren. Tempat dimana dulu ia tidak kehendaki tapi karena perintah dari orang tuanya akhirnya dia terpaksa mondok. Sebagaimana yang ia ungkapkan,<br />"Saya sangat berterima kasih kepada Ibu, yang memaksa saya masuk pondok pesantren. Awalnya saya merasa terpaksa, karena waktu itu nilai sekolah saya bagus dan ingin masuk SMA, tapi malah disuruh melanjutkan ke pesantren," tutur Fuadi kepada muslimdaily.net (rabu, 01/2013)<br /><br />Jadi, Ahmad Fuadi adalah contoh mantan santri yang dipaksa dan telah meraih kesuksesannya. Ini menunjukkan bahwa Ahmad Fuadi adalah orang yang patuh kepada orang tuanya. Sehingga meskipun dipaksa masuk pondok ia mencoba untuk ikhlas dan menjalaninya dengan sungguh-sungguh. Luar biasa!<br /><br />2. Tidak Diterima di Sekolah Negeri Favorit<br /><br />Alasan kedua kenapa masuk pondok pesantren adalah gengsi karena tidak diterima di sekolah negeri favorit. Mungkin ada beberapa orang yang terlalu membanggakan sekolah negeri favorit. Yaa, itu wajar karena tidak mudah masuk sekolah negeri favorit, seleksi super ketat dan banyak saingan. Ditambah lagi program pemerintah yang meringankan beban biaya sekolah kepada para siswanya seperti di kota-kota besar Jakarta, dsb. Oleh karena itu sekolah negeri favorit menjadi gengsi tersendiri bagi para siswa, baik itu lulusan SD maupun lulusan SMP.<br /><br />Karena menjadi gengsi, ada beberapa orang yang malu kalau tidak sekolah di sekolah negeri favorit. Dengan begitu pondok pesantren adalah tempat pelampiasannya. Mungkin tidak sepenuhnya juga karena gengsi, banyak faktor lain seperti kisah yang penulis alami (mau tau? Baca disini).<br /><br />3. Dapat Beasiswa<br /><br />Saat ini banyak juga program pemerintah terutama pemerintah daerah yang memberikan beasiswa kepada anak daerah untuk belajar di pondok pesantren. Tujuan mereka adalah untuk menambah jumlah SDM yang mendalami masalah ilmu agama islam. Dan sekaligus edukasi bagi anak-anak daerah tentang belajar keorganisasian dan kepemimpinan.<br />&nbsp;<br />Pemerintah kini semakin tahu bahwa didikan pondok pesantren menghasilkan orang-orang yang berkarakter, bermoral dan beragama yang baik. Sehingga patut untuk menjadi pemimpin dan penggerak bagi daerahnya kelak. Hal ini dikarenakan banyaknya pejabat-pejabat di pemerintahan yang berstatus mantan santri alias jebolan pondok pesantren.<br /><br />Santri yang masuk pesantren karena mendapatkan beasiswa atau mungkin dipilih langsung karena potensinya, maka mau tidak mau, suka tidak suka, ia harus menerimanya meskipun terpaksa.<br /><br />4. Rekomendasi<br /><br />Dari beberapa santri yang pernah penulis temui, ada yang masuk ke pondok pesantren karena rekomendasi. Misalnya, suatu majelis ta&rsquo;lim atau organisasi remaja masjid merekomendasikan beberapa anggotanya untuk mondok di pesantren. Hal demikian dilakukan untuk meningkatkan SDM mereka di bidang ilmu agama. Dan supaya proses dakwahnya terus meningkat.<br /><br />5. Ikut-ikutan<br /><br />Masuk pondok karena ikut-ikutan juga kadang terjadi pada seseorang. Entah bagaimana prosesnya, awalnya tidak ada niatan untuk mondok, tapi melihat temannya mondok jadi ikutan mondok. Seperti yang pernah ditemui penulis, ia masuk pesantren karena teman baiknya juga masuk pesantren, sebelumnya mereka memang teman akrab dan tiada yang bisa memisahkan walau badai menghadang &ldquo;ciah alay banget". Ada lagi yang lebih alay, ia masuk pesantren karena cinta sejatinya masuk pesantren.<br /><br />Untuk teman-teman yang masuk pesantren karena ikut-ikutan harus segera move on ya. Perbaiki niat dan fokus untuk belajar. Jangan lupa untuk berdoa dan berusaha.<br />&nbsp; <br />6. Ingin Mendalami Ilmu Agama<br /><br />Tujuan seseorang masuk pondok pesantren adalah untuk mendalami ilmu agama. Alasan ini paling banyak digunakan para santri ketika ditanya &ldquo;kenapa masuk pesantren?" jawabannya ingin mendalami ilmu agama. Namun berbeda lagi ketika ditanya &ldquo;kenapa mendalami ilmu agama harus di pesantren?" jawabannya beraneka macam. Ada yang menjawab supaya fokus, mendapat keberkahan, agar lebih dekat dengan guru, guru-gurunya ahli dan lain-lain. Santri yang masuk pondoknya karena ingin mendalami ilmu agama Insya Allah niatnya sudah benar. Tinggal ditingkatkan lagi keistiqomahannya, berdoanya dan usahanya.<br /><br />7. Ingin Menguasai Bahasa Arab dan Inggris<br /><br />Sesuatu yang khas dari santri adalah dapat berbahasa arab dengan fasih. Bahkan banyak dari pondok pesantren modern yang menerapkan bahasa arab dan inggris dalam percakapan sehari-hari. Akhirnya alumni pondok pesantren terkenal dengan penguasaan bahasa arab dan inggrisnya. Dan inilah yang melatarbelakangi seseorang masuk pondok pesantren. Santri yang masuk pondok pesantren karena alasan ini biasanya kemampuan bahasanya sangat baik di bandingkan yang lain.<br />&nbsp;<br />8. Ingin Memiliki Banyak Teman<br /><br />Pondok pesantren biasanya tidak didominasi oleh satu daerah saja. Banyak santri yang berasal dari berbagai daerah, baik skala nasional maupun internasional. Ini juga menjadi ketertarikan sendiri bagi orang-orang yang ingin memiliki jaringan pertemanan yang luas. Santri yang masuk pondok pesantren karena alasan ini biasanya mampu bersosialisasi dengan baik, sehingga ia banyak dikenal dan banyak berorganisasi (muharrik, rois marhalah, dsb).<br /><br />9. Ingin Hidup Berdisiplin<br /><br />Pondok pesantren juga terkenal dengan disiplinnya, apalagi pondok-pondok pesantren modern. Santri yang masuk pondok pesantren karena alasan ini biasanya mengalir bagaikan air. Ia memiliki timing dan planning yang matang, sehingga tidak berleha-leha. Maka, jarang santri yang berdisiplin tinggi melanggar peraturan pondok pesantren.<br /><br />10. Insyaf<br /><br />Banyak orang-orang yang dulunya jauh dari Islam kemudian mereka bertaubat. Mereka buta akan Tuhan, tuli akan kebenaran, dan bisu akan qur&rsquo;an. Mereka yang kemudian bertaubat dan insyaf tidak setengah-setengah, bahkan dari mereka ada yang masuk pondok pesantren. Tujuan mereka masuk pondok pesantren adalah untuk berhijrah dari masa kegelapan menuju masa pencerahan. Santri yang masuk pondok pesantren karena insyaf, mereka biasanya lebih rajin ibadahnya dan lebih rajin belajar ilmu agamanya. Itu karena Allah SWT telah memberikan kepada mereka hidayah dan rahmatnya. Wallahu a&rsquo;lam.<br /><br />***', '15:58:25', '2017-07-02', 'Minggu', '751251sign.jpg'),
(22, 'MADRASAH DINIYYAH DAN MADRASAH FORMAL', '<p>Istrilah madrasah dipakai untuk dua sistem pendidikan yang sama sekali berbeda. Yang pertama, madrasah diniyah, sedang yang kedua madrasah formal.<br /><br /><strong>Persamaan Madrasah Diniyah dan Formal</strong><br /><br />Madrasah Diniyah Al-Fattah Ada sedikit persamaan antara madrasah diniyah dan formal walaupun persamaan ini bersifat periferal dan tidak signifikan. Berikut beberapa di antaranya:<br /><br /></p>\r\n<ol style="list-style-type: lower-alpha;">\r\n<li>Sama dalam segi nomenklatur tingkatannya. Baik madrasah diniyah maupun madrasah formal sama-sama memiliki tiga tingkatan pendidikan yaitu madrasah ibtidaiyah, madrasah tsanawiyah dan madrasah aliyah.</li>\r\n<li>Keduanya sama-sama bisa berada dalam naungan suatu pesantren. Karena sebuah pesantren bisa memiliki madrasah diniyah dan madrasah formal sekaligus. Umumnya ini terjadi pada sebuah pesantren yang menganut sistem salaf dan modern seperti Pesantren Al-Fattah.</li>\r\n</ol>\r\n<br /><br /><br /><strong>Perbedaan antara Madrasah Diniyah dan Formal</strong><br /><br />Persamaan antara Madrasah Diniyah dan Formal hanya terbatas pada nama. Secara substansi, kedua institusi pendidikan ini sama sekali berbeda. Berikut beberapa di antaranya:<br /><br />\r\n<ol style="list-style-type: lower-alpha;">\r\n<li>Madrasah diniyah hanya mengkaji ilmu agama sedangkan madrasah formal lebih banyak mengkaji ilmu umum (70%) sedangkan ilmu agamanya hanya 30% itupan memakai bahasa Indonesia.</li>\r\n<li>Madrasah diniyah memakai kurikulum sendiri dan karena itu materi kajiannya berbeda-beda pada setiap madrasah begitu juga kualitasnya, sedangkan madrasah formal memiliki kurikulum yang seragam dan berada di bawah naungan Kementerian Agama (Kemenag).</li>\r\n<li>Madrasah Diniyah pasti swasta karena dikelola swasta, sedangkan madrasah formal bisa negeri atau bisa juga swasta sebagaimana SMP, SMA, dan SMK.</li>\r\n<li>Madrasah Diniyah tidak memiliki persamaan dengan sekolah umum, sedangkan madrasah formal memiliki keseteraan dengan sekolah umum yang lain baik secara yuridis formal maupun pengakuan. Misalnya, Madrasah Ibtidaiyah (MI) formal setara dengan Sekolah Dasar (SD), Madrasah Tsanawiyah (MTs) setara dengan Sekolah Menengah Pertama (SMP), Madrasah Aliyah setara dengan Sekolah Menengah Atas (SMA) atau Sekolah Menengah Kejuruan (SMK), perguruan tinggi agama seperti IAIN atau UIN setara dengan Universitas dengan berbagai stratanya.</li>\r\n<li>Umumnya madrasah diniyah berada di dalam kompleks pesantren dan menjadi bagian integral dan tak terpisahkan dari sistem pendidikan pesantren salaf. Sedangkan madrasah formal umumnya berdiri sendiri dan tak terkait dengan pesantren atau kalau ada di dalam kompleks pesantren itu menjadi simbol dari sistem pesantren modern.</li>\r\n<li>Penentuan kelas di madrasah diniyah bagi siswa baru adalah berdasarkan tes kemampuan dasar ilmu agama, sedangkan di madrasah formal penempatan kelas ditentukan berdasarkan ijazah terakhir atau raport terkini bagi siswa yang pindah kelas dari sekolah yang berbeda sebagaimana biasa terjadi pada sekolah umum.</li>\r\n<li>Madrasah diniyah mengandalkan kualitas hasil yang didapat selama belajar tanpa mengharapkan ijazah atau sertifikat apapun, sedangkan madrasah formal lebih mengandalkan ijazah yang diperoleh.</li>\r\n<li>Ijazah Madrasah diniyah tidak diakui negara maupun institutsi pendidikan lain yang setara atau di atasnya, sedangkan madrasah formal diakui oleh negara dan lulusannya dapat melanjutkan pendidikan ke institusi pendidikan lain yang setara atau di atasnya. Misalnya, lulusan MTS (Madrasah Tsanawiyah) formal dapat melanjutkan ke SMA atau SMK. Lulusan MA formal dapat melanjutkan ke fakultas kedokteran atau teknis atau sosial di universitas negeri atau swasta manapun; sedangkan lulusan madrasah diniyah tidak bisa.</li>\r\n<li>Materi yang dikaji di madrasah diniyah umumnya berbahasa Arab (kitab kuning), sedangkan ilmu agama yang dikaji di madrasah formal memakai bahasa Indonesia.</li>\r\n</ol>', '20:46:17', '2017-07-02', 'Minggu', '24749789404.jpg');
INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `jam`, `tanggal`, `hari`, `gambar`) VALUES
(23, 'PERKEMBANGAN PESANTREN DI INDONESIA (SALAFI, KHALAFI, MODERN, DAN MA’HAD ‘ALY)', '<div class="clearfix">\r\n<div>\r\n<h2 class="_5clb">PERKEMBANGAN PESANTREN DI INDONESIA (SALAFI, KHALAFI, MODERN, DAN MA&rsquo;HAD &lsquo;ALY)</h2>\r\n</div>\r\n</div>\r\n<div class="_5k3v _5k3w clearfix">\r\n<div>\r\n<p><strong>Zainal Arifin</strong></p>\r\n<p><strong>email: derizzain@yahoo.co.id</strong></p>\r\n<p><strong>(Makalah ini pernah diterbitkan dalam Jurnal Pendidikan Agama Islam Fakultas Ilmu Tarbiyah dan Keguruan</strong></p>\r\n<p><strong>UIN Sunan Kalijaga Yogyakarta pada Vol.IX No.1 Juni 2012, hlm.40-53)</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>A.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Pendahuluan</strong></p>\r\n<blockquote>\r\n<p>Sutrisno mengutip pendapat Azyumardi Azra, pesantren yang biasa disebut dengan pondok pesantren atau juga dengan pendidikan tradisional, sekalipun sudah banyak pesantren modern, merupakan lembaga pendidikan Islam tertua di Indonesia. Pesantren dipandang sebagai lembaga pendidikan tradisional Islam <em>indigenos</em> karena tradisinya yang panjang di Indonesia. Pesantren pada masa modern dan komtemporer umumnya didirikan oleh Kiai yang berafiliasi pada Nahdlatul Ulama (NU).[1]</p>\r\n</blockquote>\r\n<p>Pesantren juga menarik diperbincangan karena beberapa argumen ini. <em>Pertama, </em>bahwa pesantren tumbuh dan berkembang pada masyarakat Islam. <em>Kedua, </em>pesantren di Indonesia telah melewati perjalanan panjang. Tidak lama setelah Islam masuk ke Kepulauan Nusantara, embrio cikal bakal munculnya pesantren mulai tumbuh. <em>Ketiga, </em>Indonesia bukan hanya negara yang penduduknya muslim terbesar, melainkan juga memiliki paling banyak pesantren di dunia. <em>Keempat, </em>banyak ilmuan dan tokoh nasional pernah belajar di pesantren, seperti Idham Khalid, A. Mukti Ali, Nurcholish Madjid, Abdurrahman Wahid (mantan Presiden RI ke-4), Hasyim Muzadi (mantan ketua PBNU), Din Syamsuddin (ketua umum PP Muhammadiyah), dan Hidayat Nur Wahid (mantan ketua MPR).[2]</p>\r\n<blockquote>\r\n<p>Seiring perkembangan ilmu pengetahuan dan teknologi, muncul beberapa pesantren yang mengembangkan dirinya untuk menghadapi perkembangan zaman. Dalam pertarungan tradisi era modernisme, banyak pesantren yang masih tetap mempertahankan tradisi utamanya sebagai pesantren tradisional, di sisi lain muncul beberapa pesantren yang mengembangkan dirinya menjadi pesantren modern agar dapat bersaing dalam pengembangan ilmu pengetahuan dan teknologi sebagaimana yang berkembang di lembaga pendidikan model sekolah. Dalam makalah ini, penulis mencoba akan mengupas perkembangan pesantren dari <em>Salafiah, Khalaf</em>, dan <em>Modern</em> hingga munculnya <em>Ma''had Aly</em> serta problematikanya dalam mempertahankan tradisi di tengah-tengah perubahan sosial serta perkembangan ilmu pengetahuan dan teknologi era modernisme.</p>\r\n</blockquote>\r\n<p><strong>B.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Istilah Pesantren</strong></p>\r\n<p>Sebelum tahun 1960-an, pusat-pusat pendidikan pesantren di Indonesia lebih dikenal dengan nama pondok. Istilah pondok barangkali berasal dari pengertian asrama-asrama para santri atau tempat tinggal yang dibuat dari bamboo, atau barangkali berasal dari kata Arab, <em>funduq,</em> yang artinya hotel atau asrama.[3] Hal senada juga disampaikan Manfred Ziemek mengutip pendapat Prasodjo S, pondok (kamar, gubuk, rumah kecil) dipakai dalam bahasa Indonesia dengan menekankan kesederhanaan bangunan.Mungkin juga &ldquo;pondok&rdquo; diturunkan dari kata Arab &ldquo;funduq&rdquo; (ruang tidur, wisma, hotel sederhana). [4] Dari pengertian ini, istilah pondok berarti sebagai tempat tinggal sederhana bagi santri yang belajar Islam.</p>\r\n<blockquote>\r\n<p>Perkataan pesantren berasal dari kata santri, yang dengan awalan <strong><em>pe</em></strong> di depan dan akhiran <strong><em>an</em></strong> berarti tempat tinggal para santri. Profesor Johns seperti dikutip oleh Zamakhsari Dhofier, berpendapat bahwa istilah santri[5] berasal dari bahasa Tamil yang berarti guru mengaji, sedang C.C. Berg yang juga dikutip Dhofier, berpendapat bahwa istilah tersebut berasal dari istilah <em>shastri</em> yang dalam bahasa India berarti orang yang tahu buku-buku suci Agama Hindu, atau seorang sarjana ahli kitab suci Agama Hindu. Menurut M. Chaturverdi dan BN Tiwari, yang juga dikutip Dhofier, kata <em>Shastri</em> berasal dari kata <em>shastra </em>yang berarti buku-buku suci, buku-buku agama atau buku-buku tentang ilmu pengetahuan.[6] Dari asal-usul kata santri pula banyak sarjana berpendapat bahwa lembaga pesantren pada dasarnya adalah <em>lembaga pendidikan keagamaan</em> bangsa Indonesia pada masa menganut agama Hindu Budha yang bernama &rdquo;<em>mandala&rdquo;</em> yang diislamkan oleh para kyai.[7] Dari beberapa pendapat ini, istilah pondok sama artinya dengan pesantren, yaitu sebagai tempat belajar santri. Sedangkan kata santri yang berasal dari <em>shastri</em> berarti guru agama, orang yang ahli dalam memahami kitab suci, ahli dalam ilmu agama.</p>\r\n</blockquote>\r\n<p>Ziemek mengutip pendapat Hamid A, kadang-kadang ikatan kata &ldquo;sant&rdquo; (manusia baik) dihubungkan dengan suku kata &ldquo;tra&rdquo; (suka menolong), sehingga pesantren dapat berarti &ldquo;tempat pendidikan manusia yang baik-baik.[8] Menurut keterangan Geertz yang dikutip Ziemek, santri mungkin diturunkan dari kata Sansekerta &ldquo;Shastri&rdquo; (ilmuwan Hindu yang pandai menulis), yang dalam pemakaian bahasa modern memiliki arti yang sempit dan yang luas:</p>\r\n<p>&ldquo;Artinya yang sempit ialah &lsquo;seorang pelajar sekolah agama yang disebut pondok atau pesantren&rsquo;&hellip; Dalam artinya yang luas dan lebih umum kata santri mengacu pada seorang anggota bagian penduduk Jawa yang menganut Islam dengan sungguh-sungguh &ndash; yang sembahyang, pergi ke masjid pada hari Jum&rsquo;at dan sebagainya&rdquo;[9]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Mengenai asal usul sistem pesantren, Kareel A. Steenbrink berpendapat bahwa pendidikan pesantren dilihat dari segi bentuk dan sistemnya berasal dari India.[10] Sebelum proses penyebaran Islam di Indonesia, sistem tersebut telah dipergunakan secara umum untuk pendidikan dan pengajaran agama Hindu di Jawa. Setelah Islam masuk dan tersebar di Jawa, sistem tersebut kemudian diambil oleh Islam. Istilah pesantren sendiri seperti halnya <em>mengaji</em> bukanlah berasal dari istilah Arab, melainkan dari India. Demikian juga istilah pondok, langgar di Jawa, surau[11] di Minangkabau dan <em>rangkang<strong>[12]</strong></em> di Aceh bukanlah merupakan istilah Arab, tetapi dari istilah yang terdapat di India.[13]</p>\r\n<p>&nbsp;</p>\r\n</blockquote>\r\n<p>Ramayulis berpendapat bahwa secara garis besar, ada dua pendapat tentang asal-usul pesantren sebagai institusi pendidikan Islam. <em>Pertama, </em>pesantren adalah institusi pendidikan Islam, yang berasal dari tradisi Islam. Mereka berkesimpulan, bahwa pesantren lahir dari pola kehidupan tasawuf, yang kemudian berkembang di wilayah Islam, seperti Timur Tengah dan Afrika Utara yang dikenal dengan sebutan <em>Zawiyat.<strong>[14]</strong></em> <em>Kedua, </em>pesantren merupakan kelanjutan dari tradisi Hindu Budha yang sudah mengalami proses islamisasi. Mereka melihat adanya hubungan antara perkataan pesantren dengan kata <em>shastri</em> dari bahasa Sanskerta.[15] Sebagaimana beberapa pendapat ahli yang dikutip Zamakhsari Dhofier dan Kareel A. Steenbrink di atas.</p>\r\n<p>Menurut Clifford Greertz, sebagaimana dikutip Ramayulis, terjadinya perbedaan di atas disebabkan adanya tinjauan yang berbeda. Pendapat <em>pertama </em>menekankan pada faktor latar belakang sejarah, sedangkan pendapat <em>kedua,</em> cenderung mengarahkan tinjauannya kepada asal usul kata. Meskipun demikian, kedua pendapat itu tidak memuat bantahan, bahwa pesantren sudah ada di Nusantara, sebelum bangsa Eropa datang ke wilayah Nusantara sekitar abad XVI.[16] Penulis lebih sepakat dengan pendapat kedua yang mengatakan bahwa asal-usul pesantren sebagai institusi pendidikan Islam merupakan proses islamisasi dari tradisi Hindu-Budha yang dilakukan oleh para kyai, sebagaimana yang dilakukan oleh para Wali Songo dalam melakukan islamisasi budaya Hindu-Budha yang sebelumnya telah berkembang dan mengakar di lapisan masyarakat Indonesia, misalnya: tradisi sekaten, wayangan, dan lain sebagainya.</p>\r\n<p><strong>C.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Pola Umum Pendidikan Islam Tradisional (Pesantren)</strong></p>\r\n<p>Menurut Haedari, dkk secara <em>etimologis</em>, kata &ldquo;tradisional&rdquo; berasal dari kata dasar tradisi yang berarti tatanan, budaya, atau adat yang hidup dalam sebuah komunitas masyarakat. Karenanya, tradisional diartikan konsensus bersama untuk ditaati serta dijunjung tinggi oleh sebuah komunitas masyarakat setempat. Kata tradisional juga selalu menunjuk pada hal-hal yang bersifat peninggalan kebudayaan klasik, kuno, dan konservatif.[17]</p>\r\n<p>Pesantren sebagai salah satu bentuk pendidikan Islam tradisional karena pesantren sebagai lembaga pendidikan yang menjunjung tinggi dan melestarikan tradisi, budaya, tatanan kehidupan islami dalam proses pendidikan kepada santrinya. Sehingga, pesantren memiliki pola pendidikan yang berbeda dengan sekolah maupun madrasah. Amin Haedari, dkk mengutip pendapat Mukti Ali, beberapa pola umum pendidikan Islam tradisional (pesantren) sebagai berikut:</p>\r\n<ol>\r\n<li>Adanya hubungan akrab antara kyai dan santri</li>\r\n<li>Tradisi ketundukan dan kepatuhan seorang santri terhadap kyai</li>\r\n<li>Pola hidup sederhana (<em>zuhud</em>)</li>\r\n<li>Kemandirian atau independensi</li>\r\n<li>Berkembangnya iklim dan tradisi tolong-menolong dan suasana persaudaraan</li>\r\n<li>Displin ketat</li>\r\n<li>Berani menderita untuk mencapai tujuan</li>\r\n<li>Kehidupan dengan tingkat religiusitas yang tinggi.[18]</li>\r\n</ol>\r\n<blockquote>\r\n<p>Pola pendidikan di pesantren ini sangat khas dan menjadi pembeda dengan lembaga pendidikan yang lain. Pola ini lebih menggambarkan bagaimana tradisi di lingkungan pesantren yang menekankan pada etika santri dalam belajar di pesantren. Akan tetapi, seiring perkembangan zaman, ada sebagian tradisi pesantren di atas yang sudah ditinggalkan oleh santri, misalnya: pola hidup sederhana. Hal ini dapat dibuktikan banyaknya kasus hidup mewah santri, khususnya para santri yang tinggal di pesantren modern. Ada sebagian pesantren modern yang memberikan fasilitas tempat tidur yang berbeda dengan santri yang lain, misalnya: ada yang 1 kamar dipakai 4 orang, ada juga 1 kamar digunakan 20 orang dengan fasilitas yang berbeda, dan hal ini tidak terdapat di pesantren tradisional. Fasilitas ini membuat para santri hidup layaknya di rumah sendiri, dan bahkan cenderung untuk hidup mewah. Tradisi hidup mewah pun kadang menjalar ke para pengasuh pesantren atau kyai, misalnya sebagian kyai yang memiliki mobil mewah, walaupun itu digunakan untuk urusan pesantren.</p>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<p>Menurut Mastuhu, sebagaimana dikutip Amin Haedari,dkk sebagai sebuah lembaga pendidikan Islam tradisional, pesantren mempunyai empat ciri khusus yang menonjol. Mulai dari hanya memberikan pelajaran agama versi kitab-kitab Islam klasik berbahasa Arab, mempunyai teknik pengajaran yang unik yang biasa dikenal dengan metode <em>sorogan</em> dan <em>bandongan</em> atau <em>wetonan<strong>[19]</strong>, </em>mengedepankan hafalan, serta menggunakan sistem <em>halaqah.<strong>[20]</strong> </em>Sampai sekarang, model pembelajaran ini masih tetap bertahan, khususnya di pesantren-pesantren tradisional, sebagai ciri khas bentuk pesantren yang masih mempertahankan tradisi-tradisi. Ada pepatah yang mengatakan bahwa &ldquo;mempertahankan tradisi lama yang baik dan mengambil tradisi baru yang lebih baik&rdquo;.</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Menurut penulis, metode pembelajaran di pesantren seperti <em>sorogan, bandongan</em> atau <em>wetonan</em> perlu direkonstruksi dengan cara mengembangkan budaya kritis bagi santri dalam proses belajar mengajar. Budaya kritis ini penting untuk membudayakan santri bersikap kritis tapi santun dalam menyampaikan pendapatnya, sehingga santri bukan hanya menerima apa adanya apa yang disampaikan oleh kyai-nya. Budaya kritis juga akan melatih santri untuk lebih progresif dalam mengembangkan ilmu pengetahuan, sehingga tidak terjadi kejumudan dalam berpikir, dan santri juga dapat menjadi <em>problem solver </em>bagi persolan masyarakat modern.</p>\r\n</blockquote>\r\n<p><strong>D.&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Elemen-ElemenTradisi Pesantren</strong></p>\r\n<p>Menurut Zamakhsari Dhofier, pondok, masjid, santri, pengajaran kitab Islam klasik (kitab kuning), dan kyai adalah lima elemen dasar tradisi pesantren. Ini berarti bahwa suatu lembaga pengajian yang telah berkembang hingga memiliki kelima elemen tersebut berubah statusnya menjadi pesantren.[21] Pesantren yang paling sederhana bentuknya, menurut Ramayulis, di mana kyai menggunakan masjid atau rumahnya sendiri untuk tempat mengajar. Santri datang dari daerah pesantren itu sendiri, namun mereka telah mempelajari ilmu agama secara kontinu dan sistematis.[22] Santri model seperti ini biasanya dinamakan pesantren <em>Kalong</em>, artinya santri yang tidak menetap di pesantren. Biasanya santri tersebut tinggal tidak jauh dari pesantren. Hal ini berbeda dengan santri Mukim, yang biasanya tinggal/menetap di pesantren.</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Dari kelima elemen tradisi pesantren tersebut, menurut Dhofier, kyai[23] merupakan elemen yang paling esensial dari suatu pesantren. Ia seringkali bahkan merupakan pendirinya. Sudah sewajarnya bahwa pertumbuhan suatu pesantren semata-mata bergantung pada kemampuan pribadi kyainya.[24] Kebanyakan para kyai beranggapan bahwa suatu pesantren dapat diibaratkan sebagai suatu kerajaan kecil di mana kyai merupakan sumber mutlak dari kekuasaan dan kewenangan (<em>power an authority</em>) dalam kehidupan dan lingkungan pesantren. Tidak seorang pun santri atau orang lain yang dapat melawan kekuasaan kyai (dalam lingkungan pesantrennya) kecuali kyai lain yang lebih besar pengaruhnya. Para santri selalu mengharap dan berpikir bahwa kyai yang dianutnya merupakan orang yang percaya penuh kepada dirinya sendiri (<em>self-confidence</em>), baik dalam soal-soal pengetahuan Islam, maupun dalam bidang kekuasaan dan manajemen pesantren.[25]</p>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<p>Dalam masyarakat tradisionil, seorang dapat menjadi kyai atau disebut kyai karena ia diterima oleh masyarakat sebagai kyai, karena orang datang minta nasehat kepadanya, atau mengirimkan anaknya supaya belajar kepada kyai. Untuk menjadi kyai, tidak ada kriteria formal. Namun, Aboebakar Atjeh, sebagaimana dikutip Karel, menyebutkan beberapa faktor yang menyebabkan seseorang menjadi kyai besar, yaitu: pengetahuannya, kesalehannya, keturunannya, dan jumlah muridnya. Vredenbregt memberikan skema yang hampir sama dengan Aboebakar Atjeh, yaitu: keturunan (seorang kyai besar mempunyai silsilah cukup panjang), pengetahuan agamanya, jumlah muridnya, dan cara dia mengabdikan dirinya pada masyarakat.[26]</p>\r\n<p>Menurut penulis, gelar kyai bukanlah gelar yang didapatkan dari pendidikan formal tapi merupakan gelar yang diberikan oleh masyarakat bagi orang yang ahli agama Islam dan umumnya memiliki pesantren. Gelar kyai diberikan masyarakat karena masyarakat percaya akan kompetensi seorang kyai dalam mengemban amanah untuk syiar agama Islam di masyarakat serta pengembangan ilmu agama Islam di pesantren. Sehingga, masyarakat percaya penuh bahwa kyai adalah orang yang paling tahu tentang ajaran Islam, sehingga para kyai menjadi tempat permohonan fatwa tentang persoalan agama maupun persoalan kehidupan sehari-hari, misalnya: menikahkan anaknya, memberikan nama, memimpin doa, dan sebagainya.</p>\r\n<p><strong>E.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Klasifikasi Pesantren: <em>Salafi, Khalafi</em>, dan <em>Modern</em></strong></p>\r\n<p>Pada umumnya, pesantren dibagi menjadi dua, yaitu <em>Salaf </em>dan <em>Modern</em>. Dalam makalah ini, penulis mengikuti pendapat Ramayulis yang mengklasifikasi pesantren dari segi cara menyikapi terhadap tradisi, dibedakan menjadi tiga kategori, yaitu: <em>Salafi, Khalafi</em>, dan pesantren <em>Modern</em>. [27] Ramayulis membedakan antara <em>Khalafi</em> dan <em>Modern,</em> yang biasanya oleh sebagian kalangan umat Islam disamakan. Pesantren-pesantren ini memiliki corak tradisi yang berbeda-beda yang dapat dijelaskan sebagai berikut:</p>\r\n<p><strong><em>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em></strong><strong>Pesantren <em>Salafi</em></strong></p>\r\n<p>Secara etimologis kata &ldquo;salaf&rdquo; dalam Kamus Besar Bahasa Indonesia (KBBI) berarti sesuatu atau orang yang terdahulu, ulama-ulama terdahulu yang saleh. [28] Abdul Mughist mengutip pendapat &lsquo;Irfan A. Hamid, secara terminologi khazanah Islam, &ldquo;salaf&rdquo; berarti ulama generasi sahabat<em>, tabi&rsquo;in</em>, dan <em>tabi&rsquo;at at-Tabi&rsquo;in </em>yang merupakan kurun terbaik pasca rasulullah saw.[29]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Menurut penulis, istilah pesantren <em>Salafi</em> di tengah-tengah masyarakat mengandung dua pemahaman yang berbeda. <em>Pertama,</em> pesantren <em>Salafi</em> dimaknai sebagai pesantren tradisional yang tetap mempertahankan kitab-kitab klasik serta mengapresiasi budaya setempat. <em>Kedua,</em> pesantren <em>Salafi </em>dimaknai sebagai pesantren yang secara konsisten mengikuti ajaran ulama generasi sahabat, <em>tabi''in, tabi''at tabi''in</em> yang memiliki kecenderungan pada penafsiran teks secara normatif dan tidak/kurang mengapresiasi budaya setempat, karena semua budaya harus sesuai dengan zaman para <em>Salafush-Sholih</em>, yaitu sahabat, <em>tabi''in, tabi''at tabi''in</em>.</p>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<p>Menurut Ramayulis, pesantren <em>Salafi</em>&ndash;model pesantren tradisional (pen.)&ndash;merupakan &nbsp;jenis pesantren yang tetap mempertahankan pengajaran kitab-kitab klasik sebagai inti pendidikannya. Di pesantren ini, mata pelajaran umum tidak diberikan. Tradisi masa lalu sangat dipertahankan. Pemakaian sistem madrasah hanya untuk memudahkan sistem sorogan seperti dilakukan di lembaga-lembaga pengajian bentuk lama. Pesantren Lirboyo dan Ploso di Kediri Jawa Timur serta Pesantren Maslakul Huda di Kajen Pati Jawa Tengah agaknya dapat disebut sebagai contoh pesantren <em>Salafi. </em>&nbsp;Pesantren <em>Salafi</em> kelihatannya menjadi dirinya sebagai benteng utama dalam mempertahankan tradisi.<em><strong>[30]</strong></em></p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Sedangkan pesantren Salafi model kelompok reformis, sebagaimana Abdul Mughist mengutip pendapat Brink, termonologi &ldquo;salaf&rdquo; menurut kaum reformis yang dipelopori oleh Jamal ad-Din al-Afghani, Muhammad Abduh di Mesir, dan Muhammad Abdul Wahab di Saudi Arabia bahwa paham <em>Salafiyyah </em>adalah ajaran ulama&rsquo; generasi pertama yang konsisten secara literer terhadap Al-Qur&rsquo;an dan Sunnah, mengikis habis <em>bid&rsquo;ah, khurafat, </em>dan <em>tahayyul </em>serta klenik, senantiasa membuka pintu ijtihad dan menolak taklid &ldquo;buta&rdquo;.[31] Dari pendapat ini, yang dinamakan pesantren <em>Salafi</em> adalah pesantren yang secara konsisten mengikuti ajaran ulama generasi pertama yang memiliki kecenderungan pada penafsiran teks yang bersifat literalistik/normatif.</p>\r\n</blockquote>\r\n<p>Menurut Arif Subhan,</p>\r\n<p>&nbsp;</p>\r\n<p><em>Salafi</em> disebut juga <em>Salafiyyah</em> mengandung pengertian &ldquo;pengikut generasi pertama muslim yang saleh&rdquo; (<em>as-salaf al-shalih</em>). Ini mengandung pengertian yang luas karena sebenarnya setiap muslim adalah pengikut generasi pertama muslim, yaitu Nabi Muhammad SAW, sahabat, tabi&rsquo;in, tabi&rsquo;it tabi&rsquo;in. Akan tetapi, terdapat aspek penting dalam ideologi keagamaan <em>Salafi</em> yang membedakan dengan yang lain, yaitu model penafsiran terhadap teks yang bersifat literalistik. Model penafsiran inilah yang mengantarkan gerakan <em>Salafi</em> menjadi gerakan radikal dalam Islam. Misalnya, dalam memberikan penafsiran tentang model pakaian Islami. Mereka berusaha sejauh mungkin mengikuti cara berpakaian yang dipraktikkan Nabi SAW. Bagi laki-laki biasanya mengenakan jubah dan kebanyakan memelihara jenggot, sementara bagi perempuan mengenakan jubah dan jilbab &ndash; model cadar&ndash; yang menutup seluruh tubuhnya kecuali mata dan telapak tangan. [32]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Salah satu model pesantren <em>Salafi</em> &ndash; sebagaimana perspektif kelompok reformis&ndash; di Indonesia adalah pesantren Hidayatullah yang didirikan oleh Abdullah Said pertama kali di Balik Papan dan diresmikan oleh Menteri Agama, Mukti Ali pada 5 Agustus 1976. Arief Subhan mencatat bahwa sejak semula tujuan pesantren Hidayatullah&ndash;yang dibayangkan pendirinya&ndash; adalah mencetak banyak kader dakwah dan membentuk sebuah komunitas yang mejadikan nilai-nilai Islam sebagai landasan dalam relasi-relasi sosial. Dalam bahasa Abdullah Said hal ini disebut dengan &ldquo;membentuk sebuah jamaah&rdquo;.[33]</p>\r\n</blockquote>\r\n<p>Dari beberapa pendapat dan contoh pesantren model <em>Salafi</em> di atas, ada perbedaan antara model pesantren <em>Salafi</em> corak tradisional dan <em>Salafi</em> corak Puritan. Abdul Mughits berpendapat, Definisi yang paling elegan untuk istilah &ldquo;pesantren <em>Salafi</em>&rdquo; adalah pesantren yang mengikuti jejak ajaran ulama generasi <em>Salaf</em> (abad I-III H) dan ulama sesudahnya sebagai pengembangan (penafsiran) terhadap ajarannya. Sedangkan definisi &ldquo;pesantren tradisional&rdquo; adalah pesantren yang masih melestarikan warisan tradisi atau ajaran ulama terdahulu dan tradisi lokal yang sudah melalui proses penyeleksian dengan standar ajaran para ulama terdahulu (normatifitas agama).[34]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Menurut penulis, di tengah-tengah masyarakat, istilah pesantren <em>Salafi </em>biasanya digunakan oleh kelompok reformis untuk memberikan penekanan pada pesantren yang secara konsisten mengikuti ajaran ulama <em>Salafush Sholih, </em>yaitu sejak zaman para sahabat, tabi''in, dan tabi''it tabi''in. Sedangkan untuk kelompok umat Islam tradisionalis, biasanya lebih suka menggunakan istilah pesantren <em>Salaf </em>atau <em>Salafiyyah</em>, karena <em>image</em> pesantren <em>Salafi</em> lebih dekat dengan pemahaman Islam yang literal. Atau untuk membedakannya, penulis memberikan istilah <em>Salafi-Modernis </em>bagi pesantren <em>Salafi </em>kaum reformis dan<em> Salafi-Tradisionalis </em>bagi pesantren tradisional.</p>\r\n</blockquote>\r\n<p><strong>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Pesantren <em>Khalafi</em></strong></p>\r\n<p>Pesantren <em>Khalafi</em> tampaknya menerima hal-hal yang baru yang dinilai baik di samping tetap memelihara tradisi lama yang baik.[35] Pesantren sejenis ini memberikan mata pelajaran umum di madrasah dengan sistem klasikal dan membuka sekolah-sekolah umum di lingkungan pesantren. Walau demikian, pengajaran kitab-kitab Islam klasik masih tetap dipertahankan. Pesantren Tebu Ireng, Tambak Beras dan Rejoso di Jombang Jawa Timur selain menyelenggarakan pendidikan madrasah, juga membuka sekolah-sekolah menengah umum seperti SMTP dan SMTA. Mereka juga memberikan pengajaran.[36]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Menurut penulis, pesantren <em>Khalafi</em> merupakan model pesantren yang mencoba mengikuti perkembangan zaman dengan tetap mempertahankan tradisinya, yaitu mengkaji kitab-kitab klasik. Upaya pesantren <em>Khalafi</em> agar dapat berkembang seiring dengan perkembangan ilmu pengetahuan dan teknologi adalah diajarkannya ilmu-ilmu umum di lingkungan pesantren, yang biasanya pesantren ini membuka lembaga pendidikan model madrasah maupun sekolah untuk mengajarkan pelajaran umum. Biasanya, santri tetap tinggal di pesantren untuk mengikuti kajian kitab-kitab klasik di sore, malam, dan pagi setelah Shubuh, setelah itu mereka mengikuti pelajaran umum di madrasah maupun sekolah.</p>\r\n</blockquote>\r\n<p><strong>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Pesantren Modern</strong></p>\r\n<p>Pesantren Modern di mana tradisi <em>Salaf </em>sudah ditinggalkan sama sekali. Pengajaran kitab-kitab Islam klasik tidak diselenggarakan. Sekalipun bahasa Arab diajarkan, namun penguasaanya tidak diarahkan untuk memahami bahasa Arab terdapat dalam kitab-kitab klasik. Penguasaan bahasa Arab dan Inggris cenderung ditujukan untuk kepentingan-kepentingan praktis. Pesantren Gontor Ponorogo walaupun sangat menekankan pengetahuan bahasa Arab dan Inggris, sudah cukup lama meninggalkan pengajaran kitab-kitab Islam klasik. Pesantren-pesantren yang bercorak kekotaan seperti pesantren As-Syafi&rsquo;iyah di Jakarta, Pesantren Prof. Dr. Hamka di Padang, pesantren Zaitun di Indramayu yang bercorak kampus modern dan diwarnai dengan corak khas Islam. Para siswa dan mahasiswa di berbagai jurusan ilmu dapat berdiskusi dalam lingkungan pesantren yang tidak lagi mengutamakan pengajian kitab-kitab kuning.[37]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Sebagaimana Arief Subhan merujuk pada pondok modern Gontor, bahwa referensi utama dalam materi keislaman bukan kitab kuning, melainkan kitab-kitab baru yang ditulis para sarjana muslim abad ke-20. Ciri khas pondok modern adalah tekanannya yang sangat kuat kepada pembelajaran bahasa, baik bahasa Arab maupun Inggris. Ciri khas lain adalah aspek displin mendapat tekanan. Para guru dan santri diwajibkan berpakaian rapi dan berdasi.[38]</p>\r\n</blockquote>\r\n<p>Menurut penulis, istilah <em>Khalafi</em> kadang juga diartikan sebagai <em>Modern</em>, antonim dari istilah <em>Salafi.</em> Pesantren <em>Khalafi</em> juga berarti pesantren <em>Modern</em>. Tapi, dalam hal ini Ramayulis membedakannya. Pendapat Ramayulis tersebut ditekankan pada tradisi kajian kitab-kitab klasik. Bagi pesantren <em>Khalafi, </em>mengikuti perkembangan ilmu pengetahuan dan memelihara tradisi (mengkaji kitab klasik) adalah ciri khasnya. Kitab klasik menjadi kajian utama di pesantren <em>Salafi/Khalafi</em> dan biasanya, ketika mengkaji kitab klasik tertentu sampai selesai (<em>khatam</em>). Misalnya: mengkaji kitab <em>Tafsir Jalalain </em>sampai <em>khatam.</em></p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Bagi pesantren modern, tidak lagi mengutamakan kajian kitab-kitab klasik dalam proses pembelajaran, tapi kitab-kitab berbahasa Arab yang ditulis oleh para tokoh muslim abad 20. Walaupun kadang di pesantren <em>Modern </em>masih menggunakan sebagian kitab-kitab klasik, tapi bukan menjadi kajian utamanya, tapi hanya menjadi referensi tambahan dan tidak dikaji sampai selesai (<em>khatam</em>). Di samping itu, pondok modern juga menekankan pada penguasaan bahasa asing, seperti bahasa Arab dan bahasa Inggris dan budaya kedisplinan yang sangat ketat. Penguasaan bahasa asing ini untuk membekali para santri agar dapat bersaing di dunia global dan dapat membaca kitab-kitab kontemporer baik yang menggunakan bahasa Arab maupun bahasa Inggris.</p>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<p><strong>F.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><em>Ma&rsquo;had Aly</em></strong></p>\r\n<p>Dalam perkembangan pesantren, muncul model perguruan tinggi Islam pasca pesantren yang dinamakan <em>Ma&rsquo;had Aly</em>. <em>Ma&rsquo;had</em> dapat diartikan sebagai pondok/pesantren, sedangkan <em>Aly</em> berarti tinggi. Pada umumnya, <em>Ma&rsquo;had Aly</em> sebagai pendidikan tahap lanjutan dari pesantren tradisional. Lembaga ini diperuntukan bagi para santri senior yang sudah mendapatkan modal awal materi keislaman dari kitab-kitab klasik, tapi mereka masih memiliki kelemahan dalam hal metodologi. Menurut Marwan Saridjo, program utama kegiatan <em>Ma&rsquo;had Aly </em>pada dasarnya menelaah dan membahas kitab-kitab klasik berbahasa Arab, baik dalam bentuk <em>bahtsul masail </em>atau dalam bentuk diskusi atau <em>halaqah </em>atas kandungan kitab-kitab dari berbagai perspektif sesuai dengan dinamika perkembangan situasi kontemporer.[39]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Agus Muhammad mengutip penelitian Marzuki Wahid, dkk tahun 2000, pendidikan tinggi yang diselenggarakan <em>Ma&rsquo;had Aly</em> tidak lebih dan tidak kurang seperti pondok pesantren dengan berbagai kultur dan tradisi yang melingkupinya. Hanya saja karena kekhususannya, dalam hal-hal tertentu <em>Ma&rsquo;had Aly</em> di berbagai pesantren diberi fasilitas khusus, seperti asrama, ruang kelas, perpustakaan, dan sarana aktualisasi seperti penerbitan atau ceramah di luar pondok pesantren. Yang membedakan dengan yang lain adalah metode pembelajarannya, yang melibatkan santri sebagi subyek belajar, dan tingkatan kitab kuning yang dikaji relatif tinggi, serta cara mengkajinya secara lebih kritis.[40]</p>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<p>Salah satu model <em>Ma&rsquo;had Aly</em> adalah Sekolah Tinggi Agama Islam (STAI) <em>Ma&rsquo;had Aly</em> Al-Hikam Malang yang berdiri pada tanggal 17 Desember 2003. Sebelum lembaga ini berdiri, Al-Hikam merupakan sebuah Pesantren Mahasiswa (PESMA). Lembaga ini merupakan lembaga pendidikan tinggi yang menerima santri dan mahasiswa dari pesantren salaf dan madrasah yang dijadikan fokus inputnya.[41] Setelah perjalanan Pesantren Mahasiswa al-Hikam sekitar 12 tahun, KH. A. Hasyim Muzadi yang berposisi sebagai pengasuh pesantren berkeinginan untuk mendirikan suatu lembaga yang bertujuan untuk memaksimalkan potensi yang telah dimiliki oleh alumni pesantren <em>Salaf</em>.[42]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Santri-santri (calon mahasiswa) yang diterima adalah santri-santri yang berasal dari lulusan pesantren <em>Salaf</em> atau yang mempunyai keahlian dalam membaca <em>kitab kuning. </em>Hal ini karena pesantren salaf secara dominan menggunakan sistem pengajaran tradisional (<em>sorogan </em>dan <em>bandongan</em>), pada akhirnya menghasilkan santri-santri yang dapat membaca <em>kitab kuning.</em> Santri-santri <em>Ma&rsquo;had Aly</em> Al-Hikam ini lebih dikenal dengan sebutan santri mahasiswa karena dinisbatkan atas tempat mereka belajar. Pada hakekatnya, mereka telah memiliki pengetahuan agama yang luas, akan tetapi di sisi lain mempunyai kekuarangan dalam bidang pengetahuan umum dan metodologi.[43]</p>\r\n</blockquote>\r\n<p>Awalnya, pesantren ini dinamakan <em>Ma&rsquo;had Aly</em> Al-Hikam. Akan tetapi menjelang pembukaan Ma&rsquo;had Aly dilaksanakan, berbagai permintaan dari para peminat agar lulusan Ma&rsquo;had Aly ini juga mendapat pengakuan dari pemerintah yang berupa ijazah persamaan. Pada tahun 2003 di-<em>lounching-</em>lah STAI <em>&ldquo;Ma&rsquo;had Aly </em>Al-Hikam&rdquo; Malang. [44] Ditinjau dari sejarah sosial berdirinya <em>Ma&rsquo;had Aly</em> ini karena didorong oleh keinginan untuk memaksimalkan potensi alumni dari pesantren salaf dengan penekanan pada peningkatan pengetahuan umum dan metodologi untuk menjawab tantangan zaman yang ditandai dengan kemajuan ilmu pengetahuan dan teknologi. &nbsp;Sebagaimana diungkapkan dalam dokumentasi <em>Ma&rsquo;had Aly</em> Al-Hikam sebagai berikut:</p>\r\n<p>Sebagai lembaga pendidikan agama, dengan sendirinya pesantren ikut tergugah untuk bersama-sama menjawab tantangan konkret (peng-integrasian ilmu dan moral). Modal untuk berpartisipasi kea rah tersebut memang dimiliki oleh pesantren. Kita bisa temukan bahwa sebagai lembaga pendidikan agama yang sudah berumur, pesantren memiliki khazanah keilmuan dan tradisi yang khas. Ini semua diperoleh dari hasil dialog yang kreatif dan penghayatan yang intensif terhadap nilai dan norma ajaran agama Islam dengan problem riil di masyarakat. Lebih jauh lagi, dalam perspektif futuristik, kita juga melihat bahwa khazanah keilmuan pesantren yang kaya itu dapat dimanfaatkan untuk memberikan keseimbangan, baik pada tataran konsep maupun dalam tataran praktis. Dalam tataran konsep, khazanah keilmuan pesantren sudah lebih dari cukup untuk mengintegrasikan ilmu dan moral, sedangkan dalam tataran praktis, khazanah keilmuan pesantren dapat memberikan rambu-rambu normatif bagi perkembangan ilmu pengetahuan dan teknologi yang menjamin kehidupan dan kehormatan umat manusia.[45]</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>STAI <em>Ma&rsquo;had Aly</em> Al-Hikam Malang ini mengkolaborasikan dua sistem pendidikan dan pengajaran, yaitu sistem pesantren dan kampus. Adapun Program Studi (prodi) yang diselenggarakan di lembaga ini adalah Prodi Pendidikan Agama Islam jurusan Tarbiyah program sarjana (S-1).[46] Kurikulum dalam artian materi yang diajarkan di STAI <em>Ma&rsquo;had Aly</em> Al-hikam terdiri dari ilmu agama dan ilmu umum. Yang tergolong pada ilmu-ilmu agama misalnya: <em>Fiqh</em> dan <em>Tasauf</em>, <em>Ushul Fiqh, Hadis</em>, Pendidikan &amp; Kajian Islam, <em>Qur&rsquo;an Hadis,</em> dan sebagainya. Sedangkan yang tergolong ilmu-ilmu umum misalnya: Bahasa Inggris, Manajemen &amp; Pendidikan, Bahasa Indonesia, Psikologi, Logika, komputer, dan sebagainya.[47]</p>\r\n</blockquote>\r\n<p>Menurut penulis, tujuan dibentuknya model perguruan tinggi Islam pasca pesantren (<em>Ma''had Aly</em>) sebagai tempat pengembangan santri lulusan dari pesantren <em>Salafi-Tradisionalis, </em>yang secara umum masih lemah dalam hal metodologi dan penguasaan ilmu umum dan teknologi. Dalam perkembangannya, <em>Ma''had Aly </em>mencoba menjadikan dirinya sebagai Sekolah Tinggi Agama Islam untuk mendapat pengakuan pemerintah berupa ijasah setara dengan Strata Satu (S1), sehingga lulusannya dapat diakui dan bekerja di lembaga pemerintahan.</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Akan tetapi, menurut Machasin, jika <em>Ma''had Aly </em>ingin mengembangkan dirinya menjadi Sekolah Tinggi Agama Islam, maka pengelolaan <em>Ma''had Aly </em>harus mengikuti aturan (UU Sisdiknas) dari pemerintah, misalnya terkait kurikulum. Tapi, pada umumnya, <em>Ma''had Aly</em> otonom dalam pengembangan kurikulumnya sebagaimana tradisi di pesantren, sehingga lulusannya tidak bisa disetarakan dengan S1 sebagaimana di UIN, IAIN, atau STAIN yang lain.[48] Di samping itu juga, muncul beberapa model pendidikan pesantren di kampus-kampus, seperti pesantren Sobron di UMS, pesantren di UIN Malang yang menamakan dirinya sebagai <em>Ma''had Aly,</em> tapi menurut Machasin, model seperti ini lebih cocok jika dinamakan sebagai <em>Ma''had Jami''ah </em>atau Perguruan Tinggi Islam yang berada di kampus, kalau <em>Ma''had Aly </em>merupakan pesantren lanjutan dari pesantren <em>Salafi-Tradisionalis.</em>[49]</p>\r\n</blockquote>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>G.&nbsp;&nbsp; </strong><strong>Simpulan</strong></p>\r\n<p><strong>&nbsp;</strong>Dari pembahasan di atas, pesantren di tinjau dari cara menyikapi tradisi dibagi menjadi tiga, yaitu <em>Salafi, Khalafi</em>, dan <em>Modern</em>. Setiap pesantren ini memiliki tradisi yang sedikit berbeda. Perbedaan ini hanya pada penekankan pada tradisi kajian kitab-kitab klasik dan upaya pesantren dalam menghadapi perkembangan ilmu pengetahuan dan teknologi. Dalam perkembangannya, muncul model perguruan tinggi Islam yang dinamakan <em>Ma&rsquo;had Aly</em>. Lembaga ini ingin memberikan bekal metodologi dan pengetahuan umum bagi lulusan santri dari pesantren <em>Salafi-Tradisionalis</em>, yang pada umumnya memiliki kelemahan dalam bidang metodologi dan ilmu-ilmu umum.</p>\r\n<blockquote>\r\n<p>Perkembangan pesantren <em>Salafi, Khalafi, </em>dan <em>Modern </em>kemudian <em>Ma''had Aly </em>ditinjau dari sejarah sosial dan kelembagaannya, dipengaruhi oleh perubahan sosial dan pengembangan ilmu pengetahuan dan teknologi di zaman modern. Pesantren sebagai lembaga pendidikan juga dituntut dapat memberikan kontribusi bagi pendidikan yang seimbang bagi para santrinya.</p>\r\n</blockquote>\r\n<p>Bagi pesantren <em>Salafi-Tradisionalis,</em> mempertahankan tradisi menjadi ciri utamanya. Pesantren ini cenderung tidak terpengaruh oleh perubahan sosial dan perkembangan ilmu pengetahuan dan teknologi, khususnya dalam pengembangan kurikulum, pesantren ini tetap mempertahankan kurikulum keislaman, bahkan tidak memasukkan ilmu-ilmu umum dalam proses belajar mengajar. Pesantren <em>Salafi-Tradisionalis </em>lebih mengutamakan lulusan yang ahli dalam bidang ilmu agama saja, sehingga menjadi tempat reproduksi ulama yang paling sukses. Kelemahan pesantren <em>Salafi-Tradisionalis </em>adalah lulusannya hanya menguasai ilmu-ilmu agama dan tidak menguasai ilmu-ilmu umum, sehingga mayoritas santri lulusan dari pesantren ini tidak dapat bekerja di tempat-tempat publik/pemerintahan, seperti Pegawai Negeri atau di perusahan/pabrik, karena mereka tidak memiliki ijasah sebagai wujud pengakuan pemerintah. Akan tetapi, biasanya, dalam proses pembelajaran di pesantren ini, santri dididik di samping menjadi ahli dalam berdakwah juga berwiraswasta, sehingga banyak lulusan dari pesantren ini selain jadi kyai/ustadz juga sebagai pengusaha.</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Bagi pesantren <em>Khalafi, </em>perubahan sosial dan pengembangan ilmu pengetahuan dan teknologi perlu diapresiasi, agar santri juga dapat mengikuti perkembangan zaman. Sehingga, pesantren ini membuka lembaga pendidikan model madrasah atau sekolah untuk memberikan bekal ilmu-ilmu umum bagi para santrinya, sedangkan ilmu agama di berikan di pesantren. Kelemahan model pesantren <em>Khalafi </em>adalah santri akan mendapatkan pelajaran yang lebih banyak, baik di pesantren maupun di madrasah/sekolah. Pelajaran agama di pesantren juga kurang maksimal sebagaimana di pesantren <em>Salafi-Tradisionalis.</em> Adapun kelebihannya, pesantren <em>Khalafi </em>dapat memberikan pendidikan yang seimbang bagi santrinya, yaitu ilmu agama dan ilmu umum. Di samping itu, santrinya dapat melanjutkan di sekolah/madrasah/perguruan tinggi formal setelah santri tersebut lulus dari pesantren karena mereka mendapatkan ijasah dari madrasah/sekolah yang didirikan pesantren.</p>\r\n</blockquote>\r\n<p>Bagi pesantren <em>Modern, </em>perubahan sosial dan pengembangan ilmu pengetahuan dan teknologi harus diapresiasi, bahkan harus dikuasai agar santri dapat berperan aktif dalam pembangunan Negara. Selain itu, pesantren modern juga berupaya keras agar santrinya memiliki wawasan yang luas tentang agama Islam dan ilmu pengetahuan, sehingga di pesantren ini diajarkan ilmu agama dari kitab-kitab kontemporer bukan hanya kitab klasik, dan juga penguasaan bahasa asing (khususnya bahasa Arab dan Inggris) menjadi ciri utamanya agar santri dapat bersaing di dunia global. Walaupun pesantren ini tidak mengikuti kurikulum pemerintah sehingga tidak mendapatkan ijasah formal sebagaimana di pondok <em>Modern </em>Gontor, tapi lulusannya diakui oleh pelbagai perguruan tinggi, khususnya perguruan tinggi Islam baik di Indonesia maupun Timur Tengah. Agar lulusannya diakui oleh pemerintah/Negara lain, biasanya para santri mengikuti ujian persamaan atau <em>Mu''adalah.</em> Dari hasil ujian ini, santri lulusan pesantren <em>Modern</em> dapat diterima oleh perguruan tinggi Islam baik di Indonesia maupun luar negeri. Sehingga, mereka dapat berperan aktif bagi pembangunan bangsa Indonesia, misalnya banyak lulusan santri Gontor yang menjadi pejabat/pimpinan Organisasi Masyarakat (Ormas) Islam. Contoh: Hidayat Nur Wahid mantan Ketua MPR dan mantan Ketua Umum Partai PKS, Din Syamsudin sebagai ketua umum Muhammadiyah, Nurcholis Madjid sebagai tokoh pembaharu muslim Indonesia, dan lain sebagainya.</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<p>Bagi <em>Ma''had Aly, </em>perubahan sosial dan pengembangan ilmu pengetahuan dan teknologi perlu diapresiasi, agar santri dapat bersaing dengan lulusan perguruan tinggi Islam yang lain. Tujuan utama didirikannya <em>Ma''had Aly </em>adalah untuk memberikan bekal metodologi dan pengetahuan umum bagi santri lulusan dari pesantren <em>Salafi-Tradisionalis. </em>Kelemahan <em>Ma''had Aly </em>terletak pada sikap otonomi dalam pengelolaannya, khususnya dalam merumuskan kurikulum, sehingga lulusan <em>Ma''had Aly </em>tidak bisa diakui oleh pemerintah, karena tidak mendapatkan ijasah. Sebagaimana pendapat Machasin, jika <em>Ma''had Aly </em>ingin diakui lulusannya oleh pemerintah, <em>Ma''had Aly </em>harus mengikuti UU Sisdiknas dalam merumuskan kurikulumnya, bukan seperti pesantren yang otonom.</p>\r\n</blockquote>\r\n<p>Dalam kajian ini, perubahan sosial dan pengembangan ilmu pengetahuan dan teknologi mempengaruhi perkembangan pesantren dari pesantren <em>Salafi, Khalafi, Modern </em>hingga <em>Ma''had Aly. </em>Setiap pesantren mencoba mengembangkan lembaganya agar lulusannya diakui oleh pemerintah. Hal ini penting, karena zaman modern menuntut adanya bukti (ijasah) pengakuan sah dari pemerintah terhadap kompetensi setiap lulusan dari lembaga pendidikan manapun. Dari ijasah itu pula dapat digunakan untuk mencari pekerjaan, baik di lingkungan pemerintah maupun swasta. Dalam hal ini, setiap pesantren telah mencoba agar santrinya dapat berperan bagi pembangunan Indonesia. <em>Wa Allah a''lam bi- ash-Showab.</em></p>\r\n<p>&nbsp;</p>\r\n<p><strong>DAFTAR PUSTAKA</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p>A. Steenbrink, Kareel,<em> Pesantren, Madrasah, Sekolah, Pendidikan Islam dalam Kurun Modern, </em>Jakarta: LP3ES, 1986</p>\r\n<p>Dhofier, Zamakhsari,<em> Tradisi Pesantren Studi tentang Pandangan Hidup Kyai dan Visinya Mengenai Masa Depan Indonesia,</em> Jakarta: LP3ES, 2011</p>\r\n<p>Haedari, dkk, Amin <em>Masa Depan Pesantren dalam Tantangan Kompleksitas Global, </em>Jakarta: IRD Press, 2004</p>\r\n<p>Maunah, Binti,<em> Tradisi Intelektual Santri,</em> Yogyakarta: Teras, 2009</p>\r\n<p>Mughits, Abdul, <em>Kritik Nalar Fiqh Pesantren,</em> Jakarta: Kencana, 2008</p>\r\n<p>Muhammad, Agus,<em> Ma&rsquo;had Aly: Pendidikan Tinggi Ala Pesantren, </em>dalam <em><a href="https://l.facebook.com/l.php?u=http%3A%2F%2Fwww.pondokpesantren.net%2Fponpren%2Findex.php%3Foption%3Dcom_content%26task%3Dview%26id%3D156&amp;h=ATMa_Z-z1KLI962wC_6tks8vhh_B81FdPvWVY2ZQOqb9MXQULJZq1p3H0PMq62W8t2tIwdTy2iQoPWD_XNTcNwKiUpomOiIP3ZxqayWKf0vhD6jyrKbtih4_x1a-UL5bDatUC8GMsA&amp;s=1" target="_blank" rel="nofollow">http://www.pondokpesantren.net/ponpren/index.php?option=com_content&amp;task=view&amp;id=156</a></em> [30 Desember 2012, jam. 14.51 WIB]</p>\r\n<p>Ramayulis, <em>Sejarah Pendidikan Islam, </em>Jakarta: Kalam Mulia, 2012</p>\r\n<p>Sutrisno, <em>Pembaharuan dan Pengembangan Pendidikan Islam, </em>Yogyakarta: Fadilatama, 2011.</p>\r\n<p>Subhan, Arief,<em> Lembaga Pendidikan Islam di Indonesia Abad ke-20, Pergumulan antara Modernisasi dan Identitas,</em> Jakarta: Kencana, 2012</p>\r\n<p>Saridjo, Marwan,<em> Pendidikan Islam Dari Masa Ke Masa Tinjauan Kebijkan Publik Terhadap Pendidikan Islam di Indonesia,</em> Bogor: Yayasan Ngali Aksara dan al Manar Press, 2011</p>\r\n<p>Tim Penyusun Kamus Pusat Bahasa, <em>Kamus Besar Bahasa Indonesia,</em> Jakarta: Balai Pustaka, 2002</p>\r\n<p>Ziemek, Manfred,<em> Pesantren Dalam Perubahan Sosial, </em>terj. oleh Butche B. Soendjojo, Jakarta: Perhimpunan Pengembangan Pesantren dan Masyarakat (P3M), 1986.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>[1]Sutrisno, <em>Pembaharuan dan Pengembangan Pendidikan Islam, </em>(Yogyakarta: Fadilatama, 2011), editor: Zainal Arifin, hlm. 56-57</p>\r\n<p>&nbsp;</p>\r\n<p>[2] <em>Ibid., </em>hlm. 56</p>\r\n<p>&nbsp;</p>\r\n<p>[3] Zamakhsari Dhofier, <em>Tradisi Pesantren Studi tentang Pandangan Hidup Kyai dan Visinya Mengenai Masa Depan Indonesia,</em> (Jakarta: LP3ES, 2011), edisi revisi, hlm. 41</p>\r\n<p>&nbsp;</p>\r\n<p>[4] Manfred Ziemek,<em> Pesantren Dalam Perubahan Sosial, </em>terj. oleh Butche B. Soendjojo, (Jakarta: Perhimpunan Pengembangan Pesantren dan Masyarakat (P3M), 1986), hlm.98-99</p>\r\n<p>&nbsp;</p>\r\n<p>[5] Manfred Ziemek mengutip pendapat Hamid A, kadang-kadang ikatan kata &ldquo;sant&rdquo; (manusia baik) dihubungkan dengan suku kata &ldquo;tra&rdquo; (suka menolong), sehingga pesantren dapat berarti &ldquo;tempat pendidikan manusia yang baik-baik. <em>Ibid.,</em> hlm. 99</p>\r\n<p>&nbsp;</p>\r\n<p>[6] Zamakhsari Dhofier, <em>Tradisi Pesantren&hellip;,</em>hlm. 41</p>\r\n<p>&nbsp;</p>\r\n<p>[7] <em>Ibid, </em>hlm. 41</p>\r\n<p>&nbsp;</p>\r\n<p>[8] Manfred Ziemek,<em> Pesantren Dalam&hellip;</em>hlm. 99</p>\r\n<p>&nbsp;</p>\r\n<p>[9] <em>Ibid., </em>hlm. 99 atau dibaca dalam bukunya C. Geertz, <em>The Religion of Java,</em> hlm. 178. Geertz berpendapat bahwa ada tiga kategori penduduk Jawa, yaitu priyayi, santri, dan abangan.</p>\r\n<p>&nbsp;</p>\r\n<p>[10] Kareel mengutip dari Amir Hamzah Wirjosukarto,<em> Pembaharuan, </em>hlm. 40, H. Aboebakar, <em>Wahid</em> <em>Hasjim, </em>hlm. 43, Soegarda Poerbakawatja,<em> Pendidikan,</em> hlm. 13-21</p>\r\n<p>&nbsp;</p>\r\n<p>[11] Secara bahasa kata Surau berarti &ldquo;tempat&rdquo; atau &ldquo;tempat penyembahan&rdquo;. Menurut pengertian asalnya, Surau adalah bangunan kecil yang dibangun untuk menyembah arwah nenek moyang. Beberapa ahli mengatakan bahwa Surau berasal dari India yang merupakan tempat yang digunakan sebagai pusat pengajaran dan pendidikan Hindu-Budha. Seiring perkembangan Islam di Minangkabau proses pendidikan Islam dimulai oleh Syeikh Burhanudin sebagai pembawa Islam dengan menyampaikan pengajarannya melalui lembaga pendidikan Surau. (Ramayulis, <em>Sejarah Pendidikan Islam, </em>(Jakarta: Kalam Mulia, 2012), hlm. 254. Pendapat lain mengatakan bahwa Surau bukan berasal dari budaya Hindu-Budha melainkan dari tradisi Islam. Ramayulis mengutip pendapat Zuber Usman, dimana Surau berasal dari Bahasa Arab &ldquo;syura&rdquo; yang artinya musyawarah. Pendapat ini dibantah oleh Sidi Gazalba, teori mengatakan Surau berasal dari tradisi Islam akan menimbulkan masalah diantaranya kenapa perayaan dan musyawarah dilakukan di Surau bukan di masjid, sehingga dua bangunan kudus itu menjadi tempat musyawarah padahlm di Minangkabau ada tempat musyawarah yaitu <em>Balai Adat.</em> Lihat, Sidi Gazalba,<em> Masjid Pusat Ibadah dan Kebudayaan Islam,</em> (Jakarta: Pustaka al-Husna, 1994), hlm. 317 atau Ramayulis,<em> Sejarah Pendidikan ...,</em> hlm. 276</p>\r\n<p>&nbsp;</p>\r\n<p>[12] Rangkang diselenggarakan di setiap mukim, merupakan masjid sebagai tempat berbagai aktifitas umat termasuk pendidikan. Rangkang adalah setingkat Madrasah Tsanawiyah. Materi yang diajarkan bahasa Arab, ilmu bumi, sejarah, berhitung (hisab), akhlak, fikih, dll. Sedangkan Meunasah (madrasah) berfungsi sebagai sekolah dasar, materi yang diajarkan yaitu menulis dan membaca huruf arab, ilmu agama, bahasa Jawi/melayu, akhlak dan sejarah Islam (Ramayulis, <em>Sejarah Pendidikan..., </em>hlm. 225)</p>\r\n<p>&nbsp;</p>\r\n<p>[13] Kareel A. Steenbrink, <em>Pesantren, Madrasah, Sekolah, Pendidikan Islam dalam Kurun Modern, </em>(Jakarta: LP3ES, 1986), cetakan pertama, hlm. 20-21</p>\r\n<p>&nbsp;</p>\r\n<p>[14] Pendapat ini dikutip Ramayulis dalam bukunya Nurcholis Madjid, <em>Tasauf dan Pesantren,</em> dalam M. Dawam Rahardjo (Ed.), <em>Pesantren dan Pembaharuan,</em> (Jakarta: LP3ES, 1985), hlm. 104. Menurut Ramayulis, Al-Zawiyah merupakan tempat berlangsungnya pengajian-pengajian yang mempelajari dan membahas dalil-dalil <em>naqliyyah</em> dan <em>aqliyyah</em> yang berkaitan dengan aspek agama serti digunakan oleh para <em>sufi </em>sebagai tempat untuk hlmaqah berzikir dan <em>tafakur</em> untuk mengingat dan merenungkan keagungan Allah Swt. Kata <em>Zawiyah</em> berasal dari kata <em>inzawa-yanzawi,</em> berarti mengambil tempat tertentu dari sudut masjid yang digunakan untuk I&rsquo;tikaf (diam) dan beribadah. Jenis lembaga pendidikan ini berkembang pada masa Daulah Abbasiyah. (Ramayulis, <em>Sejarah Pendidikan...,</em> hlm. 82-83)</p>\r\n<p>&nbsp;</p>\r\n<p>[15] <em>Ibid.,, </em>hlm. 263</p>\r\n<p>&nbsp;</p>\r\n<p>[16] <em>Ibid., </em>hlm. 263</p>\r\n<p>&nbsp;</p>\r\n<p>[17] Amin Haedari, dkk. <em>Masa Depan Pesantren dalam Tantangan Kompleksitas Global, </em>(Jakarta: IRD Press, 2004), hlm. 13</p>\r\n<p>&nbsp;</p>\r\n<p>[18] <em>Ibid.,</em> hlm. 15 atau lihat Mukti Ali,<em> Beberapa Persoalan Agama Dewasa ini, </em>(Jakarta: Rajawali Press, 1987), hlm. 5</p>\r\n<p>&nbsp;</p>\r\n<p>[19] <em>Sorogan</em> merupakan metode pengajaran individual yang dilaksanakan di pesantren. Dalam aplikasinya, metode ini terbagi menjadi dua cara, yaitu: pertama, bagi santri pemula, mereka mendatangi ustadz atau kyai yang akan membacakan kitab tertentu; kedua, bagi santri senior, mereka mendatangi seorang ustadz atau kyai supaya sang ustadz atau kyai mendengarkan sekaligus memberikan koreksi terhadap bacaan kitab mereka. Adapun <em>bandongan</em> atau <em>wetonan</em> adalah metode pengajaran kolektif di mana santri secara bersama-sama mendengarkan seorang ustadz atau kyai yang membaca, menerjemahkan, menerangkan, dan mengulas kitab berbahasa Arab tertentu. (Amin Haedari, dkk. <em>Masa Depan...,</em>hlm. 15</p>\r\n<p>&nbsp;</p>\r\n<p>[20] Amin Haedari, dkk. <em>Masa Depan&hellip;</em>hlm. 15-16. Menurut Amin Haedari, dkk, metode <em>hlmaqah </em>merupakan kelompok kelas dari sistem <em>bandongan. Hlmaqah</em> berarti lingkaran murid, atau sekelompok santri yang belajar di bawah bimbingan seorang ustadz dalam satu tempat.</p>\r\n<p>&nbsp;</p>\r\n<p>[21] Zamakhsari Dhofier, <em>Tradisi Pesantren&hellip;,</em> hlm. 79</p>\r\n<p>&nbsp;</p>\r\n<p>[22] Ramayulis, <em>Sejarah Pendidikan&hellip;,</em> hlm. 377</p>\r\n<p>&nbsp;</p>\r\n<p>[23] Menurut asal-usulnya, perkataan kyai dipakai untuk ketiga jenis gelar yang saling berbeda. <em>Pertama</em>, sebagai gelar kehormatan bagi barang-barang yang dianggap keramat, umpamanya, &ldquo;Kyai Garuda Kencana&rdquo; dipakai untuk sebutan Kereta Emas yang ada di Keraton Yogyakarta. <em>Kedua</em>, gelar kehormatan untuk orang-orang tua pada umumnya<em>. Ketiga</em>, gelar yang diberikan oleh masyarakat kepada seorang ahli agama Islam yang memiliki atau menjadi pemimpin pesanteren dan mengajarkan kitab-kitab klasik kepada santrinya. Selain gelar kyai, ia juga sering disebut seorang alim (orang yang dalam pengetahuan Islamnya). Zamakhsari Dhofier, <em>Tradisi Pesantren&hellip;</em>hlm. 93</p>\r\n<p>&nbsp;</p>\r\n<p>[24] <em>Ibid.</em>, hlm. 93</p>\r\n<p>&nbsp;</p>\r\n<p>[25] <em>Ibid.,</em> hlm. 94</p>\r\n<p>&nbsp;</p>\r\n<p>[26] Karel A. Steenbrink, <em>Pesantren Madrasah&hellip;</em>, hlm.109-110</p>\r\n<p>&nbsp;</p>\r\n<p>[27] Ramayulis, <em>Sejarah Pendidikan&hellip;,</em> hlm. 265</p>\r\n<p>&nbsp;</p>\r\n<p>[28] Tim Penyusun Kamus Pusat Bahasa, <em>Kamus Besar Bahasa Indonesia,</em> (Jakarta: Balai Pustaka, 2002),&nbsp; hlm. 982</p>\r\n<p>&nbsp;</p>\r\n<p>[29] Abdul Mughits, <em>Kritik Nalar Fiqh Pesantren,</em> (Jakarta: Kencana, 2008), hlm. 126. Abdul Mughist juga menjelaskan penjelaskan generasi ulama dengan mengutip dari buku <em>Mengenal Istilah dan Rumus Fuqaha&rsquo;, </em>bahwa dalam khazanah pesantren, generasi ulama dibagi empat, yaitu (1) <em>as-Salaf,</em> yaitu para ulama yang hidup pada abad III H yang terdiri dari generasi sahabat, tabi&rsquo;in dan tabi&rsquo;at tabi&rsquo;in; (2) <em>al-Khalaf,</em> yaitu para ulama yang hidup pasca III H; (3) <em>al-Mutaqaddimun </em>atau <em>al-ashab, </em>yaitu ulama yang hidup pada abad IV H. sebagai ciri khas generasi yang ketiga ini adalah memiliki kemampuan menggali hokum dengan kaidah-kaidah yang dirumuskan para imam madzab, seperti al-Ghazali dan al-Qaffal. Tetapi ulama generasi ini juga ada yang berijtihad tanpa menggunakan kaidah-kaidah tersebut seperti al-Muzani dan Ibn Saur. Dan (4) <em>al-Mutaakhhirun,</em> yaitu ulama yang hidup pasca IV H. Lihat tim penyusun, <em>Mengenal istilah dan Rumus Fuqaha&rsquo; </em>(Kediri: Madrasah &ldquo;Hidayatul Mubtadi-ien, 1997), hlm. 6 atau (Abdul Mughist,<em> Kritik Nalar,</em> hlm. 126)</p>\r\n<p>&nbsp;</p>\r\n<p>[30] Ramayulis, <em>Sejarah Pendidikan&hellip;,</em> hlm. 265-266</p>\r\n<p>&nbsp;</p>\r\n<p>[31] Abdul Mughits,<em> Kritik Nalar&hellip;</em>hlm. 127</p>\r\n<p>&nbsp;</p>\r\n<p>[32] Arief Subhan, <em>Lembaga Pendidikan Islam di Indonesia Abad ke-20, Pergumulan antara Modernisasi dan Identitas,</em> (Jakarta: Kencana, 2012), hlm. 281</p>\r\n<p>&nbsp;</p>\r\n<p>[33] <em>Ibid.,</em> hlm. 297</p>\r\n<p>&nbsp;</p>\r\n<p>[34] Abdul Mughits, <em>Kritik Nalar&hellip;,</em> hlm. 131</p>\r\n<p>&nbsp;</p>\r\n<p>[35] Ada istilah <em>Al-Muhafadzah &lsquo;ala al-Qadim al-Shlmih Wa al-Akhdzu bi-al-Jadid al-Ashlah</em> (menjaga Tradisi lama yang baik dan mengambil tradisi baru yang lebih baik)</p>\r\n<p>&nbsp;</p>\r\n<p>[36] Ramayulis, <em>Sejarah Pendidikan&hellip;,</em> hlm. 266</p>\r\n<p>&nbsp;</p>\r\n<p>[37] Ramayulis, <em>Sejarah Pendidikan&hellip;,</em> hlm. 266</p>\r\n<p>&nbsp;</p>\r\n<p>[38] Arief Subhan, <em>Lembaga Pendidikan&hellip;</em>,hlm.129-130</p>\r\n<p>&nbsp;</p>\r\n<p>[39] Marwan Saridjo,<em> Pendidikan Islam Dari Masa Ke Masa Tinjauan Kebijkan Publik Terhadap Pendidikan Islam di Indonesia,</em> (Bogor: Yayasan Ngali Aksara dan al Manar Press, 2011), edisi revisi, hlm. 227</p>\r\n<p>&nbsp;</p>\r\n<p>[40]Agus Muhammad,<em> Ma&rsquo;had Aly: Pendidikan Tinggi Ala Pesantren, </em>dalam <em><a href="https://l.facebook.com/l.php?u=http%3A%2F%2Fwww.pondokpesantren.net%2Fponpren%2Findex.php%3Foption%3Dcom_content%26task%3Dview%26id%3D156&amp;h=ATM5MnLCHDP7mGdgizf-SmLdBZLWY9Is9Jn0LnqX744F7jSdUlpGh2oG5DJSnMiQmzCANL8_HxIcaM785AWz4f_8M66FZN_LvLw4813jXtEyrMRh4eDFx1SOOO8WPdbVxhlxuELDUg&amp;s=1" target="_blank" rel="nofollow">http://www.pondokpesantren.net/ponpren/index.php?option=com_content&amp;task=view&amp;id=156</a></em> [30 Desember 2012, jam. 14.51 WIB]</p>\r\n<p>&nbsp;</p>\r\n<p>[41] Binti&nbsp; Maunah, <em>Tradisi Intelektual Santri,</em> (Yogyakarta: Teras, 2009), hlm.98</p>\r\n<p>&nbsp;</p>\r\n<p>[42] <em>Ibid., </em>hlm. 99-100</p>\r\n<p>&nbsp;</p>\r\n<p>[43] <em>Ibid.,</em> hlm. 99</p>\r\n<p>&nbsp;</p>\r\n<p>[44] <em>Ibid.,</em>hlm. 102</p>\r\n<p>&nbsp;</p>\r\n<p>[45] <em>Ibid.,</em> hlm. 102-103</p>\r\n<p>&nbsp;</p>\r\n<p>[46] <em>Ibid.,</em> hlm. 111</p>\r\n<p>&nbsp;</p>\r\n<p>[47] Baca Binti Maunah, <em>Tradisi Intelektual&hellip;</em>hlm.108-110</p>\r\n<p>&nbsp;</p>\r\n<p>[48] Hasil diskusi bersama dengan Machasin saat presentasi makalah ini pada 12 Januari 2013 di Program Doktor UIN Sunan Kalijaga Yogyakarta.</p>\r\n<p>&nbsp;</p>\r\n<p>[49] <em>Ibid.</em></p>\r\n</div>\r\n</div>', '23:30:40', '2017-07-02', 'Minggu', '5218581FAR2edfnL._SL1500_.jpg');
INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `jam`, `tanggal`, `hari`, `gambar`) VALUES
(24, 'Vidio', '<a title="Berita" href="https://www.youtube.com/watch?v=iL0L9Kq-nlE">https://www.youtube.com/watch?v=iL0L9Kq-nlE</a>', '08:23:53', '2023-08-28', 'Senin', ''),
(25, 'Berita', 'Berita', '10:54:56', '2023-09-01', 'Jumat', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biayapendidikan`
--

CREATE TABLE `biayapendidikan` (
  `id_biaya` int(11) NOT NULL,
  `nama_biaya` varchar(100) NOT NULL,
  `besar_biaya` int(11) NOT NULL,
  `deskripsi_biaya` text NOT NULL,
  `tingkat` varchar(30) NOT NULL,
  `tahunajaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biayapendidikan`
--

INSERT INTO `biayapendidikan` (`id_biaya`, `nama_biaya`, `besar_biaya`, `deskripsi_biaya`, `tingkat`, `tahunajaran`) VALUES
(1, 'makan', 170000, '2x sehari', 'Ulya', '2017/2018'),
(2, 'SPP PONDOK', 2400000, 'SPP PONDOK', 'Wustho I', '2017/2018'),
(4, 'BIAYA ZIAROH', 200000, 'BIAYA&nbsp; ZIAROH', 'Wustho I', '2017/2018'),
(5, 'xxxxx', 50000, '', 'Wustho I', '2017/2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biayapendidikandetail`
--

CREATE TABLE `biayapendidikandetail` (
  `id_detailbiaya` int(11) NOT NULL,
  `id_biaya` int(11) NOT NULL,
  `angsuran_ke` varchar(20) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `tgl_terlambat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biayapendidikandetail`
--

INSERT INTO `biayapendidikandetail` (`id_detailbiaya`, `id_biaya`, `angsuran_ke`, `tagihan`, `tgl_terlambat`) VALUES
(1, 2, '1', 200000, '2017-07-10'),
(2, 2, '2', 200000, '2017-08-10'),
(3, 2, '3', 200000, '2017-09-10'),
(4, 2, '4', 200000, '2017-10-10'),
(5, 2, '5', 200000, '2017-11-10'),
(6, 2, '6', 200000, '2017-12-10'),
(7, 2, '7', 200000, '2018-01-10'),
(8, 2, '8', 200000, '2018-02-10'),
(9, 2, '9', 200000, '2018-03-10'),
(10, 2, '10', 200000, '2018-04-10'),
(11, 2, '11', 200000, '2018-05-10'),
(12, 2, '12', 200000, '2018-06-10'),
(13, 4, '#1', 100000, '2017-09-10'),
(14, 4, '#2', 100000, '2018-04-10'),
(15, 5, '#1', 50000, '2017-08-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(4) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `kompetensi` text NOT NULL,
  `riwayat_pendidikan` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jenis_kelamin`, `alamat`, `notelp`, `kompetensi`, `riwayat_pendidikan`, `foto`, `username`, `password`) VALUES
(2, 'johnson', 'Laki-laki', 'Semarang', '994848848', 'x', 'x', '', 'johnson', '79ab945544e5bc017a2317b6146ed3aa'),
(1, 'Haikal', 'Laki-laki', 'Blora', '9383736222', 'Akidah', '0', '', 'Haikal', '967c0823cad1084501db462dca54ac1b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_guru` int(4) NOT NULL,
  `id_mapel` int(4) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `harimengajar` varchar(20) NOT NULL,
  `jammengajar` varchar(20) NOT NULL,
  `tahunajaran` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_guru`, `id_mapel`, `id_kelas`, `id_ruang`, `harimengajar`, `jammengajar`, `tahunajaran`) VALUES
(195, 1, 59, 74, 1, 'senin', '19.00-21.00', '2017/2018'),
(194, 9, 66, 74, 2, 'senin', '18.00-19.00', '2017/2018'),
(193, 9, 66, 74, 2, 'senin', '15.00-17.00', '2017/2018'),
(192, 1, 59, 74, 8, 'senin', '04.00-05.30', '2017/2018'),
(191, 10, 56, 68, 1, 'senin', '15.00-17.00', '2017/2018'),
(190, 9, 57, 68, 7, 'senin', '04.00-05.30', '2017/2018'),
(197, 16, 69, 79, 8, 'senin', '15.00-17.00', '2017/2018'),
(198, 17, 72, 79, 0, 'senin', '18.00-19.00', '2017/2018'),
(200, 19, 78, 79, 1, 'senin', '04.00-05.30', '2017/2018'),
(201, 19, 78, 85, 1, 'senin', '04.00-05.30', '2016/2017'),
(204, 19, 80, 86, 1, 'senin', '04.00-05.30', '2018/2019'),
(205, 1, 84, 89, 1, 'senin', '04.00-05.30', '2022/2023'),
(206, 2, 84, 89, 0, 'senin', '15.00-17.00', '2022/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenispelanggaran`
--

CREATE TABLE `jenispelanggaran` (
  `id_jenispelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` varchar(100) NOT NULL,
  `deskripsi_pelanggaran` text NOT NULL,
  `tipe_pelanggaran` enum('Sangat Berat','Berat','Khusus','Sedang','Ringan') NOT NULL,
  `sanksi` varchar(200) NOT NULL,
  `pemberi_sanksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenispelanggaran`
--

INSERT INTO `jenispelanggaran` (`id_jenispelanggaran`, `nama_pelanggaran`, `deskripsi_pelanggaran`, `tipe_pelanggaran`, `sanksi`, `pemberi_sanksi`) VALUES
(1, 'Melawan secara fisik kepada majlis asatidz', 'Melawan secara fisik kepada majlis asatidz', 'Sangat Berat', 'Dikeluarkan dari pesantren', 'Pimpinan Pesantren beserta pengurus pesantren'),
(2, 'Berzina', ':: cukup jelas ya..', 'Sangat Berat', 'Dikeluarkan dari pesantren', 'Pimpinan Pesantren beserta pengurus pesantren'),
(3, 'keluar malam', 'main ps tidak pakai sendal pulangnya bawa sendal', 'Sedang', 'potong gundul', 'mas zaki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalenderakademik`
--

CREATE TABLE `kalenderakademik` (
  `id_kalenderakademik` int(11) NOT NULL,
  `tahunajaran` varchar(20) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kalenderakademik`
--

INSERT INTO `kalenderakademik` (`id_kalenderakademik`, `tahunajaran`, `tgl_mulai`, `tgl_selesai`, `nama_kegiatan`, `deskripsi_kegiatan`) VALUES
(1, '2017/2018', '2017-06-01', '2018-05-31', 'Pendaftaran Santri Baru  (Dibuka Sepanjang Tahun)', 'Pendaftaran Santri Baru'),
(2, '2017/2018', '2018-01-15', '2018-01-15', 'Ujian Semester 1', 'Ujian Semester 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(3) NOT NULL,
  `namakelas` varchar(30) NOT NULL,
  `tahunajaran` varchar(15) NOT NULL,
  `walikelas` int(4) DEFAULT NULL,
  `tingkat` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `namakelas`, `tahunajaran`, `walikelas`, `tingkat`) VALUES
(81, '2a', '2017/2018', 18, 'WUSTHO I'),
(82, '2b', '2017/2018', 16, 'WUSTHO I'),
(83, '3', '2017/2018', 0, 'WUSTHO II'),
(79, '1 A', '2017/2018', 19, 'WUSTHO I'),
(80, '1b', '2017/2018', 17, 'AWALIYAH I'),
(85, '4 A', '2016/2017', 16, 'AWALIYAH IV'),
(86, 'Awalaiyah 1A', '2018/2019', 2, 'AWALIYAH I'),
(87, 'viii', '2023/2024', 1, 'AWALIYAH II'),
(88, 'V', '2023/2024', 2, 'AWALIYAH I'),
(89, 'Anggrek', '2022/2023', 1, 'AWALIYAH I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontakkami`
--

CREATE TABLE `kontakkami` (
  `id_kontak` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jawaban` text COLLATE latin1_general_ci NOT NULL,
  `tgl_jawab` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kontakkami`
--

INSERT INTO `kontakkami` (`id_kontak`, `nama`, `email`, `subjek`, `pesan`, `tanggal`, `jawaban`, `tgl_jawab`) VALUES
(25, 'fatimah', 'fatimah@gmail.com', 'biaya pondok', 'berapa biaya bulanan pondok?', '2017-07-19', '<br />20.000<br /><br /><br /> ---------------------------------------------------------------------------------------------------------------------- berapa biaya bulanan pondok?', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(3) NOT NULL,
  `kode_mapel` varchar(15) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `tingkat` varchar(30) NOT NULL,
  `deskripsi_pencapaian` text NOT NULL,
  `tahunajaran` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`, `tingkat`, `deskripsi_pencapaian`, `tahunajaran`) VALUES
(74, '1005', 'Akidah', '', '', ''),
(72, '1003', 'Nahwu', '', '', ''),
(73, '1004', 'Shorof', '', '', ''),
(71, '1002', 'Fiqih', '', '', ''),
(69, '1001', 'akhlaq', '', '', ''),
(75, '1006', 'Faraidh', '', '', ''),
(76, '1007', 'Tajwid', '', '', ''),
(77, '50002', 'Al-Quran', 'WUSTHO I', 'hafalan alquran juz 1-5', ''),
(78, '50001', 'TAUHID', 'WUSTHO I', 'Mengartikan Asmaul Husna ok', ''),
(80, 'A0001', 'Tauhid', 'AWALIYAH I', 'Menyebutkan dan menjelaskan 99 nama allah', '2018/2019'),
(82, '1', 'Bahasa Indonesia', 'AWALIYAH II', 'Bahasa', '2023/2024'),
(83, '2', 'BahasA aRAB', 'AWALIYAH I', '', '2023/2024'),
(84, '33', 'Safinah', 'AWALIYAH I', '', '2022/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `nilai_akhir` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_kelas`, `id_mapel`, `semester`, `nilai_akhir`) VALUES
(1, '59', 79, 78, 1, 90),
(2, '58', 79, 78, 1, 70),
(3, '56', 79, 78, 1, 60),
(4, '57', 79, 78, 1, 90),
(5, '58', 79, 78, 2, 70),
(6, '56', 79, 78, 2, 70),
(7, '58', 85, 78, 1, 20),
(8, '56', 85, 78, 1, 30),
(9, '58', 85, 78, 2, 10),
(10, '56', 85, 78, 2, 10),
(16, '59', 86, 80, 2, 75),
(15, '59', 86, 80, 1, 90),
(17, '59', 87, 82, 1, 80),
(18, '59', 87, 82, 2, 7),
(19, '60', 89, 84, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaransantri`
--

CREATE TABLE `pelanggaransantri` (
  `id_pelanggaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jenispelanggaran` int(11) NOT NULL,
  `tgl_pelanggaran` date NOT NULL,
  `tahunajaran` varchar(10) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggaransantri`
--

INSERT INTO `pelanggaransantri` (`id_pelanggaran`, `id_siswa`, `id_kelas`, `id_jenispelanggaran`, `tgl_pelanggaran`, `tahunajaran`, `catatan`) VALUES
(1, 10, 0, 1, '2016-08-25', '', ''),
(3, 3, 0, 1, '2016-08-25', '', 'tidak ada'),
(4, 1, 0, 1, '2016-08-30', '', '<div>siswa/santri dikembalikan ke orangtua/wali</div>'),
(5, 41, 0, 1, '2017-07-06', '2017/2018', ''),
(6, 54, 0, 3, '0000-00-00', '2017/2018', ''),
(7, 59, 79, 1, '2017-08-06', '2017/2018', 'tendang'),
(8, 60, 89, 2, '2023-09-01', '2022/2023', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaransiswa`
--

CREATE TABLE `pembayaransiswa` (
  `id_pembayaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahunajaran` varchar(15) NOT NULL,
  `id_biaya` int(11) NOT NULL,
  `angsuran_ke` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaransiswa`
--

INSERT INTO `pembayaransiswa` (`id_pembayaran`, `id_siswa`, `id_kelas`, `tahunajaran`, `id_biaya`, `angsuran_ke`, `jumlah_bayar`, `tgl_bayar`, `id_penerima`) VALUES
(1, 59, 79, '2017/2018', 2, '1', 200000, '2017-07-02', 6),
(2, 59, 79, '2017/2018', 2, '2', 200000, '2017-08-02', 6),
(3, 59, 79, '2017/2018', 2, '3', 0, '0000-00-00', 6),
(4, 59, 79, '2017/2018', 2, '4', 0, '0000-00-00', 6),
(5, 59, 79, '2017/2018', 2, '5', 0, '0000-00-00', 6),
(6, 59, 79, '2017/2018', 2, '6', 0, '0000-00-00', 6),
(7, 59, 79, '2017/2018', 2, '7', 0, '0000-00-00', 6),
(8, 59, 79, '2017/2018', 2, '8', 0, '0000-00-00', 6),
(9, 59, 79, '2017/2018', 2, '9', 0, '0000-00-00', 6),
(10, 59, 79, '2017/2018', 2, '10', 0, '0000-00-00', 6),
(11, 59, 79, '2017/2018', 2, '11', 0, '0000-00-00', 6),
(12, 59, 79, '2017/2018', 2, '12', 0, '0000-00-00', 6),
(19, 59, 79, '2017/2018', 4, '#1', 100000, '2017-07-02', 6),
(20, 59, 79, '2017/2018', 4, '#2', 100000, '2017-08-02', 6),
(21, 58, 79, '2017/2018', 1, '', 0, '0000-00-00', 0),
(22, 58, 79, '2017/2018', 2, '', 0, '0000-00-00', 0),
(23, 58, 79, '2017/2018', 4, '', 0, '0000-00-00', 0),
(24, 59, 79, '2017/2018', 1, '', 0, '0000-00-00', 0),
(25, 59, 79, '2017/2018', 5, '#1', 50000, '2017-08-07', 0),
(26, 58, 79, '2017/2018', 2, '1', 200000, '2019-06-23', 0),
(27, 58, 79, '2017/2018', 2, '2', 0, '0000-00-00', 0),
(28, 58, 79, '2017/2018', 2, '3', 0, '0000-00-00', 0),
(29, 58, 79, '2017/2018', 2, '4', 0, '0000-00-00', 0),
(30, 58, 79, '2017/2018', 2, '5', 0, '0000-00-00', 0),
(31, 58, 79, '2017/2018', 2, '6', 0, '0000-00-00', 0),
(32, 58, 79, '2017/2018', 2, '7', 0, '0000-00-00', 0),
(33, 58, 79, '2017/2018', 2, '8', 0, '0000-00-00', 0),
(34, 58, 79, '2017/2018', 2, '9', 0, '0000-00-00', 0),
(35, 58, 79, '2017/2018', 2, '10', 0, '0000-00-00', 0),
(36, 58, 79, '2017/2018', 2, '11', 0, '0000-00-00', 0),
(37, 58, 79, '2017/2018', 2, '12', 0, '0000-00-00', 0),
(38, 58, 79, '2017/2018', 5, '#1', 50000, '2019-06-23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` enum('Administrasi','Keuangan','Superadmin') NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `notelp`, `foto`, `username`, `password`, `hak_akses`, `status`) VALUES
(10, 'Ahmad Haikal Fikri', 'Laki-laki', 'Blora', '12345678', '594757pp almasyhuriyh.png', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Superadmin', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` tinyint(1) NOT NULL,
  `nama_aplikasi` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nama_ponpes` varchar(100) NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `notelp` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `logo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tentangkami` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_aplikasi`, `nama_ponpes`, `alamat`, `notelp`, `email`, `logo`, `tentangkami`) VALUES
(1, 'SIPON AL MASYHURIYAH', 'PONDOK PESANTREN  ALMASYHURIYAH', 'Jl. Japah Lr 5, RT 02 /RW 02, Kec. Ngawen, Kab. Bl', '081234567391', 'ponpesalmasyhuriyah@gmail.com', '32pp almasyhuriyh.png', 'Pondok Pesantren Al Masyhuriyah Blora');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayatkelas`
--

CREATE TABLE `riwayatkelas` (
  `id_riwayat` int(11) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayatkelas`
--

INSERT INTO `riwayatkelas` (`id_riwayat`, `id_tahunajaran`, `id_siswa`, `id_kelas`) VALUES
(14, 2017, 58, 79),
(15, 2017, 56, 79),
(16, 2016, 56, 85),
(17, 2016, 58, 85),
(18, 2018, 59, 86),
(19, 2023, 59, 87),
(20, 2023, 61, 88),
(21, 2022, 60, 89);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `keterangan`) VALUES
(1, 'Dalam Masjid Lantai #1', 'Masjid Lantai #1. <br />Kapasitas: 100 orang'),
(2, 'Dalam Masjid Lantai #2', 'DalamMasjid Lantai #2<br />Kapasitas : 100 orang'),
(8, 'Serambi Masjid Lantai #1', 'Luar Masjid Lantai Dasar <br/> Kapasitas : 100 orang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `status` enum('aktif','keluar','lulus') NOT NULL DEFAULT 'aktif',
  `tgl_masuk` date NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `nama_bapak` varchar(100) NOT NULL,
  `pekerjaan_bapak` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `notelp_ortu` varchar(100) NOT NULL,
  `sekolah_asal` varchar(100) NOT NULL,
  `madin_asal` varchar(100) NOT NULL,
  `ponpes_asal` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `status`, `tgl_masuk`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `password`, `foto`, `alamat_lengkap`, `nama_bapak`, `pekerjaan_bapak`, `nama_ibu`, `pekerjaan_ibu`, `notelp_ortu`, `sekolah_asal`, `madin_asal`, `ponpes_asal`) VALUES
(58, '32601200438', 'aktif', '2017-07-20', 'SETIAWAN NANDA PRATAMA', 'Laki-laki', 'REMBANG', '1993-05-22', '9a9c205d65f00a7deef44aef34f1eefa', '', 'JL GEMAH KENCANA 8 NO 1', 'ALI', 'BURUH', 'SUTINEM', '-', '08563532628', '', '', ''),
(59, '32601200437', 'keluar', '2017-07-20', 'agus kristian', 'Laki-laki', 'batang', '1994-05-22', '885ab162c1dd604bc797dcb10eee10f4', '8910527268-200.png', '', '', '', '', '', '', '', '', ''),
(56, '32601200459', 'lulus', '2017-07-20', 'riski yudhi prasongko', 'Laki-laki', 'brebes', '1993-08-21', '0c074ab2a292a45bf4b19f0786aa989a', '', '', '', '', '', '', '', '', '', ''),
(57, '32601200530', 'aktif', '2017-07-20', 'zaki mubarok', 'Laki-laki', 'demak', '1995-05-22', '9784ea3da268563469df99b2e6593564', '', '', '', '', '', '', '', '', '', ''),
(60, '123456789', 'aktif', '2017-07-20', 'Kimberli Jo', 'Perempuan', 'Semarang', '1994-05-22', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'y', 'x', 'x'),
(61, '444444444', 'aktif', '2023-07-06', 'Kuncrit', 'Laki-laki', 'Semarang', '1995-05-22', '7d1959dcd37659e4cfdc794945cea9a8', '', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahunajaran` varchar(15) NOT NULL,
  `jenis_transaksi` enum('debet','kredit') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `id_siswa`, `id_kelas`, `tahunajaran`, `jenis_transaksi`, `jumlah`, `tgl_transaksi`, `id_penerima`) VALUES
(6, 59, 79, '2017/2018', 'debet', 20000, '2019-07-01', 10),
(8, 59, 79, '2017/2018', 'debet', 100000, '2019-07-01', 10),
(9, 58, 79, '2017/2018', 'debet', 40000, '2019-06-03', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `id_tahunajaran` int(11) NOT NULL,
  `namatahunajaran` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tahunajaran`
--

INSERT INTO `tahunajaran` (`id_tahunajaran`, `namatahunajaran`, `status`) VALUES
(9, '2023/2024', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tatatertibsantri`
--

CREATE TABLE `tatatertibsantri` (
  `id_tatatertib` int(2) NOT NULL,
  `isi_tatatertib` text NOT NULL,
  `file_tatatertib` varchar(100) NOT NULL,
  `tahunajaran` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tatatertibsantri`
--

INSERT INTO `tatatertibsantri` (`id_tatatertib`, `isi_tatatertib`, `file_tatatertib`, `tahunajaran`) VALUES
(16, '<div style="text-align: center;"><strong>&nbsp;</strong></div>\r\n<div style="text-align: center;"><strong>مؤسسة</strong> <strong>معهد</strong> <strong>الايمان</strong> <strong>الاسلامى</strong> <strong>مونطيلان</strong></div>\r\n<div style="text-align: center;"><em>YAYASAN PESANTREN ISLAM AL IMAN</em></div>\r\n<div style="text-align: center;"><strong>Islamic Institute &amp; Boarding School</strong></div>\r\n<div style="text-align: center;">Jl. Talun Km 1 Patosan Sedayu Muntilan Magelang</div>\r\n<div style="text-align: center;">Jawa Tengah 56412 Telp. (0293)587367</div>\r\n<div style="text-align: center;">e-mail : <a href="mailto:pondokiman@yahoo.com">pondokiman@yahoo.com</a> Website : www.pesantrenislamaliman.or.id</div>\r\n<div style="text-align: center;"><strong>&nbsp;</strong></div>\r\n<div style="text-align: center;"><strong>&nbsp;</strong></div>\r\n<div style="text-align: center;">TATA TERTIB SANTRI (PUTRA)</div>\r\n<div style="text-align: center;"><strong>&nbsp;</strong></div>\r\n<div style="text-align: center;">KEPUTUSAN PIMPINAN</div>\r\n<div style="text-align: center;">PESANTREN ISLAM AL IMAN MUNTILAN</div>\r\n<div style="text-align: center;">Nomor :&nbsp; &nbsp;158/PIA/YPIA/VII/20015</div>\r\n<div style="text-align: center;">&nbsp;</div>\r\n<div style="text-align: center;">TENTANG</div>\r\n<div style="text-align: center;">TATA TERTIB SANTRI</div>\r\n<div style="text-align: center;">PESANTREN ISLAM AL IMAN MUNTILAN</div>\r\n<div style="text-align: center;">&nbsp;</div>\r\n<div style="text-align: center;">&nbsp;</div>\r\n<div style="text-align: center;">Dengan rahmat Allah SWT, Pimpinan Pesantren Islam Al Iman Muntilan :</div>\r\n<div style="text-align: center;">&nbsp;</div>\r\n<table width="100%">\r\n<tbody>\r\n<tr>\r\n<td width="16%">\r\n<p>Menimbang</p>\r\n</td>\r\n<td width="2%">\r\n<p>:</p>\r\n</td>\r\n<td width="80%">\r\n<p>1.&nbsp;&nbsp; Bahwa santri Pesantren Islam Al Iman adalah amanah orangtua untuk dididik dengan sebaik-baiknya ;</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="16%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="2%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="80%">\r\n<p>2.&nbsp;&nbsp; Bahwa untuk meningkatkan disiplin santri, perlu dibuat tata tertib yang baku;</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="16%">\r\n<p>Mengingat</p>\r\n</td>\r\n<td width="2%">\r\n<p>:</p>\r\n</td>\r\n<td width="80%">\r\n<p>1. Bahwa tata tertib yang dibuat hendaklah tidak mengurangi rasa kesadaran santri yang selama ini telah tertanam dalam jiwa masing-masing ;</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="16%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="2%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="80%">\r\n<p>2. Musyawarah pimpinan beserta pengurus pesantren tentang tata tertib santri Pesantren Islam Al Iman Muntilan tanggal 21 Juli 2015</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table width="100%">\r\n<tbody>\r\n<tr>\r\n<td colspan="3" width="100%"><br />\r\n<p><strong>Memutuskan</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="16%">\r\n<p>Menetapkan</p>\r\n</td>\r\n<td width="2%">\r\n<p>:</p>\r\n</td>\r\n<td width="80%">\r\n<p>1.&nbsp;&nbsp; Peraturan pokok Pesantren Islam Al Iman Muntilan tentang tata tertib/disiplin santri Pesantren Islam Al Iman;</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="16%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="2%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="80%">\r\n<p>2.&nbsp;&nbsp; Segala peraturan yang belum tercakup di dalamnya akan diputuskan di kemudian hari;</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="16%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="2%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="80%">\r\n<p>3.&nbsp;&nbsp; Bila terjadi kesalahan dan kekeliruan dalam putusan ini akan dilakukan perbaikan seperlunya;</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="16%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="2%">\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width="80%">\r\n<p>4.&nbsp;&nbsp; Keputusan ini berlaku sejak ditetapkan.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Ditetapkan di&nbsp; :&nbsp; Muntilan</p>\r\n<p>Tanggal&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; 21 Juli 2015</p>\r\n<p>Pimpinan Pesantren</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>KYAI MUHAMMAD ZUHAERY, MA</strong></p>\r\n<strong><br /> </strong>\r\n<p><strong>TATA TERTIB SANTRI (PUTRA)</strong><strong> 201</strong><strong>5</strong><strong>/201</strong><strong>6</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BAB I</strong></p>\r\n<p><strong>TATA TERTIB SEKOLAH</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>Pasal 1</strong></p>\r\n<p><strong>SERAGAM</strong></p>\r\n<ol>\r\n<li>Seragam sekolah yang telah ditentukan Pesantren adalah sebagai berikut :</li>\r\n<li>Hari Sabtu dan Ahad :&nbsp; Pramuka (baju lengan pendek)</li>\r\n<li>Hari Senin dan Selasa :</li>\r\n</ol>\r\n<p>1)&nbsp; MTs&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Putih dan Biru (baju lengan pendek)</p>\r\n<p>2)&nbsp; Aliyah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Putih dan Abu-abu (baju lengan pendek)</p>\r\n<ol>\r\n<li>Hari Rabu &amp; Kamis : Batik Pesantren (baju lengan pendek)</li>\r\n<li>Model dan bahan seragam standar sesuai dengan ketentuan Pesantren</li>\r\n<li>Memakai atribut sekolah lengkap :</li>\r\n<li>Badge dan nama dada</li>\r\n<li>Ikat pinggang warna hitam</li>\r\n<li>Berkaos kaki hitam (Pramuka)</li>\r\n<li>Berkaos kaki putih (Batik, OSIS)</li>\r\n<li>Bersepatu warna hitam dengan tali yang sesuai</li>\r\n<li>Memakai peci hitam saat berseragam batik (hari Rabu dan Kamis)</li>\r\n<li>Tidak diperbolehkan memakai :</li>\r\n<li>Celana cut bray/kombor, pensil ataupun ketat</li>\r\n<li>Celana Gunung (lebih dari 4 saku)</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 2</p>\r\n<p><strong>KELAS</strong></p>\r\n<ol>\r\n<li>Setiap santri wajib masuk kelas tepat waktu</li>\r\n<li>Setiap pergantian jam pelajaran ditandai dengan bunyi bel</li>\r\n<li>Saat bel masuk kelas berbunyi, santri harus sudah berada di kelas</li>\r\n<li>Jadwal keluar masuk kelas disesuaikan dengan jadwal yang ada</li>\r\n<li>Sebelum pelajaran dimulai seluruh santri berdoa dipimpin ketua kelas atau yang lainnya</li>\r\n<li>Bagi santri yang berhalangan hadir atau tidak masuk kelas baik karena alasan sakit, dan atau sesuatu hal lainnya wajib meminta izin ke Kabiro Santri atau Kabiro TMM</li>\r\n<li>Sebagaimana tercantum dalam ayat 6 santri wajib menunjukkan slip tanda kebenaran izinnya</li>\r\n<li>Tanpa menunjukkan bukti kebenaran izin meninggalkan kelas maka dianggap absen (tidak masuk kelas tanpa izin)</li>\r\n<li>Setiap kelas dimana santri belajar harus dalam keadaan bersih dan tertib</li>\r\n<li>Piket kelas wajib datang lebih awal minimal 5 menit sebelum bel masuk</li>\r\n<li>Setiap petugas piket kelas wajib untuk:</li>\r\n<li>Membersihkan ruang kelas</li>\r\n<li>Mengambil dan mengembalikan jurnal, absensi dan peralatan tulis</li>\r\n<li>Setiap ruang kelas wajib dilengkapi dengan:</li>\r\n<li>Jadwal piket</li>\r\n<li>Jadwal pelajaran</li>\r\n<li>Denah tempat duduk</li>\r\n<li>Struktur pengurus kelas</li>\r\n<li>Alat-alat kebersihan</li>\r\n<li>Kreasi santri</li>\r\n<li>Papan absensi santri</li>\r\n<li>Menutup pelajaran dengan do&rsquo;a kafarotul majlis sebelum meninggalkan kelas</li>\r\n<li>Apabila dalam keadaan darurat santri wajib izin kepada guru yang mengajar atau Biro Santri</li>\r\n<li>Tidak diperbolehkan bagi santri saat sekolah :</li>\r\n<li>Keluar kelas ketika jam pelajaran dan pergantian pelajaran</li>\r\n<li>Membuat kegaduhan di kelas</li>\r\n<li>Mencorat-coret atau merusak sarana dan prasarana milik Pesantren</li>\r\n<li>Berbuat atau melakukan hal-hal yang tidak sesuai dengan etika kesopanan</li>\r\n<li>Makan dan minum di dalam kelas</li>\r\n<li>Apabila terjadi kekosongan di kelas ketua kelas/piket bertanggung jawab untuk melapor ke Guru Piket / ke kantor.</li>\r\n<li>Santri tidak diperbolehkan menulis apapun pada jurnal kelas</li>\r\n</ol>\r\n<h5>&nbsp;</h5>\r\n<strong><br /> </strong>\r\n<h5>BAB II</h5>\r\n<p><strong>TATA TERTIB UMUM</strong></p>\r\n<h2>&nbsp;</h2>\r\n<h2>Pasal 3</h2>\r\n<h2>KEWAJIBAN</h2>\r\n<ol>\r\n<li>Menjunjung tinggi Ukhuwah Islamiyah dan etika :</li>\r\n<li>Selalu menebar senyum dan salam</li>\r\n<li>Saling menghargai dan menghormati</li>\r\n<li>Bersikap tawadhu&rsquo;</li>\r\n<li>Berjabat tangan bila bertemu asatidz</li>\r\n<li>Menjalin komunikasi yang harmonis antar santri, guru, administratur, karyawan, pengurus Pesantren dan Yayasan Pesantren Islam Al Iman</li>\r\n<li>Menemui tamu di ruang tamu</li>\r\n<li>Lapor ke Biro Santri/kantor jika ada wali/tamu yang datang dan atau akan menginap</li>\r\n<li>Memberitahukan kepada wali-walinya agar berpakaian sopan dan menutupi aurat pada saat berkunjung ke Pesantren Islam Al Iman</li>\r\n<li>Pulang dan datang ke Pesantren harus lapor kepada Biro Santri</li>\r\n<li>Kewajiban dan hal beribadah\r\n<ol>\r\n<li>Mengikuti sholat fardhu dan sholat Jum&rsquo;at berjama&rsquo;ah di masjid Pesantren</li>\r\n</ol>\r\n</li>\r\n<li>Melaksanakan dzikir setelah sholat dan dijaharkan saat shalat jahar (Maghrib, Isya, Shubuh)</li>\r\n<li>Menjalankan ibadah-ibadah sunnah sesuai yang telah diprogramkan pesantren</li>\r\n<li>Hadir di masjid minimal 10 menit sebelum shalat Jum''at</li>\r\n<li>Kewajiban dalam hal berpakaian :</li>\r\n<li>Memakai pakaian yang rapi, sopan dan sesuai dengan nilai-nilai ajaran Islam di setiap saat</li>\r\n<li>Memakai baju yang rapi warna polos saat shalat dan memakai baju koko/taqwa berwarna putih dan peci hitam pada sholat Shubuh, Maghrib, Isya&rsquo; dan sholat Jum&rsquo;at</li>\r\n<li>Keluar Pesantren memakai baju/kemeja dengan rapi sesuai dengan ketentuan pesantren</li>\r\n<li>Memakai pakaian olahraga pada waktu olahraga</li>\r\n<li>Mengikuti semua kegiatan yang diwajibkan oleh pesantren\r\n<ol>\r\n<li>Mengikuti kegiatan KBM dan Berada di kelas pada jam-jam pelajaran</li>\r\n<li>Mengikuti Apel Sabtu Pagi yang dikoordinir oleh OSPIA</li>\r\n<li>Membiasakan berbahasa resmi (Arab dan Inggris) dalam percakapan sehari-hari</li>\r\n<li>Mengikuti olahraga jum&rsquo;at pagi</li>\r\n<li>Mengakhiri kegiatan olahraga dan kelas pada jam 17.00 WIB</li>\r\n<li>Berada di kamar dan istirahat pada pukul 21.30 WIB</li>\r\n<li>Mendukung program kerja Pesantren dan Organisasi yang berada di bawah naungannya</li>\r\n</ol>\r\n</li>\r\n<li>Kewajiban dalam hal kebersihan dan lingkungan :</li>\r\n<li>Membersihkan fasilitas umum minimal seminggu sekali</li>\r\n<li>Menjaga dan mengamankan barang milik pribadi, kamar dan Pesantren</li>\r\n<li>Menjaga kebersihan diri, kamar dan lingkungan Pesantren antara lain: Panjang rambut tidak lebih dari 4 cm/rapi (standart pesantren : pinggir 1 cm &amp; atas 3 cm), kuku tidak boleh panjang, mengatur, membersihkan kamar dan lingkungan Pesantren setiap hari</li>\r\n<li>Memanfaatkan fasilitas umum yang tersedia di Pesantren secara proporsional</li>\r\n<li>Menjaga nama baik lembaga/almamater baik saat berada di dalam pesantren maupun luar pesantren</li>\r\n<li>Santri yang sakit harus lapor kepada pengurus OSPIA</li>\r\n<li>Berkonsultasi dalam masalah apapun dengan Biro Santri Putra</li>\r\n<li>Makan di ruang makan pada waktu yang telah ditentukan</li>\r\n</ol>\r\n<h2>&nbsp;</h2>\r\n<h2>Pasal 4</h2>\r\n<p><strong>LARANGAN</strong></p>\r\n<ol>\r\n<li>Mengancam, menganiaya atau berkelahi</li>\r\n<li>Mengkonsumsi atau mengedarkan miras dan narkoba</li>\r\n<li>Merokok</li>\r\n<li>Membawa atau menggunakan barang-barang yang tidak sesuai dengan ketentuan Pesantren seperti:\r\n<ol>\r\n<li>Pakaian dari bahan jean''s dalam model apapun</li>\r\n<li>Pakaian, kaos dan pet bergambar atau bertulisan yang tidak sesuai dengan nilai pesantren</li>\r\n<li>Celana codoray, cut bry atau bludru</li>\r\n<li>Pakaian transparan, ketat dan sejenisnya</li>\r\n<li>Segala macam perhiasan kecuali jam tangan</li>\r\n<li>Elektronika apapun (tape, radio, TV, handphone, Mp3 player, dan sejenisnya) kecuali setrika</li>\r\n<li>Senjata api atau senjata tajam</li>\r\n<li>Kendaraan</li>\r\n<li>Jimat dan sejenisnya</li>\r\n<li>Bacaan, gambar, media cetak yang tidak mendidik dan tidak layak</li>\r\n<li>Bacaan/gambar yang tidak mendidik dan tidak layak</li>\r\n</ol>\r\n</li>\r\n<li>Mengadakan kegiatan yang mengganggu jalannya disiplin pesantren</li>\r\n<li>Larangan dalam hal berpakaian :\r\n<ol>\r\n<li>Memakai jaket kecuali malam hari atau waktu sakit</li>\r\n<li>Memakai jas, kecuali saat bertugas</li>\r\n<li>Memakai kaos kecuali saat olahraga dan tidur</li>\r\n<li>Memakai seragam sekolah saat olahraga</li>\r\n<li>Membuat seragam apapun kecuali ada izin dari Pesantren Islam Al Iman</li>\r\n<li>Memakai sandal/ sepatu gunung saat sekolah</li>\r\n</ol>\r\n</li>\r\n<li>Larangan dalam hal kegiatan :</li>\r\n<li>Pergi/keluar dari Pesantren tanpa izin</li>\r\n<li>Meletakkan Al Qur&rsquo;an tidak pada tempatnya</li>\r\n<li>Tidur atau ngobrol pada waktu tadarrus Al Quran</li>\r\n<li>Masuk dan makan di dapur pesantren</li>\r\n<li>Membawa tamu ke dalam asrama (kamar) tanpa izin</li>\r\n<li>Meninggalkan shaf pada waktu dzikir tanpa izin</li>\r\n<li>Menerima telepon kecuali dari walinya dengan seizin Biro Santri</li>\r\n<li>Melakukan kegiatan apapun setelah pukul 21.30 wib kecuali yang diprogramkan oleh pesantren</li>\r\n<li>Mencorat-coret atau merusak apapun hak milik perorangan maupun pesantren</li>\r\n<li>Kembali ke asrama pada waktu jam sekolah dan jam belajar</li>\r\n<li>Berhubungan dengan santri putri kecuali dengan keluarga atau atas izin dari biro santri putra</li>\r\n<li>Mengadakan pertemuan antara putra-putri/ kholwat/ kencan, baik secara perseorangan maupun kelompok di dalam dan di luar Pesantren, kecuali untuk kepentingan organisasi dengan disertai pembimbing dari majlis guru Pesantren Al Iman</li>\r\n<li>Membuat kegaduhan/keributan dimanapun</li>\r\n<li>Makan dan minum sambil berdiri atau dengan tangan kiri</li>\r\n<li>Memanfaatkan keluarga pesantren dan masyarakat sekitar untuk berlindung dari tata tertib/disiplin Pesantren</li>\r\n<li>Mengeluarkan kasur atau almari tanpa alasan yang jelas</li>\r\n<li>Membuang sampah sembarangan</li>\r\n<li>Bermalam atau menonton televisi di luar Pesantren</li>\r\n<li>Memasuki kawasan asrama (kamar) putri tanpa izin</li>\r\n<li>Meminjam barang milik masyarakat</li>\r\n<li>Memakai barang milik orang lain tanpa izin</li>\r\n<li>Meminta fasilitas komunikasi kepada selain Biro Santri Putra</li>\r\n<li>Menyimpan uang di kamar melebihi Rp 25.000,- (<em>Dua puluh lima ribu rupiah</em>)</li>\r\n<li>Memiliki lebih dari satu almari</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 5</p>\r\n<h2>PERIZINAN</h2>\r\n<ol>\r\n<li>Perizinan pulang ke rumah diberikan pada libur ulangan tengah semester dan libur akhir semester</li>\r\n<li>Perizinan keluar tanpa menginap (harus sudah kembali ke pesantren paling lambat jam 17:00 WIB) diberikan satu kali dalam satu bulan (bergantian putra dan putri)</li>\r\n<li>Santri yang akan keluar dari Pesantren/pulang minta izin ke Biro Santri</li>\r\n<li>Mengenakan seragam ketika pulang dan datang sesuai dengan yang telah ditentukan</li>\r\n<li>Tidak ada perizinan pada hari-hari efektif kecuali dengan walinya</li>\r\n<li>Tidak diperbolehkan memiliki dua kartu perizinan</li>\r\n<li>Membayar administrasi sesuai yang telah ditentukan yaitu Rp 1.000,- (Seribu rupiah)</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 6</p>\r\n<h2>LARANGAN KHUSUS SANTRI</h2>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>Menentang segala ketentuan yang telah ditetapkan oleh Pesantren</li>\r\n<li>Membawa dan memelihara binatang di dalam pesantren</li>\r\n<li>Menyelenggarakan acara dengan mengatasnamakan kelas atau kelompok tanpa sepengetahuan dan seizin dari Pesantren (Biro Santri)</li>\r\n<li>Penarikan iuran tanpa seizin Pesantren</li>\r\n<li>Membuat atau menyanyikan yel-yel atau gerak dan lagu yang bertentangan dengan nilai-nilai Pesantren dan Syari&rsquo;at Islam</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BAB III</strong></p>\r\n<h2>KLASIFIKASI PELANGGARAN</h2>\r\n<p>&nbsp;</p>\r\n<p>Pasal 7</p>\r\n<h2>SANGAT BERAT</h2>\r\n<ol>\r\n<li>Melawan secara fisik kepada majlis asatidz</li>\r\n<li>Berzina</li>\r\n<li>Membawa, memiliki, mengkonsumsi atau mengedarkan miras, narkoba dan sejenisnya</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 8</p>\r\n<p><strong>BERAT</strong></p>\r\n<ol>\r\n<li>Tidak shalat dengan sengaja</li>\r\n<li>Hubungan lawan jenis (Tahabbub/ khalwat)</li>\r\n<li>Bertindak asusila</li>\r\n<li>Mengambil barang milik orang lain (mencuri)</li>\r\n<li>Menghina, melecehkan institusi, asatidz atau pengurus Pesantren</li>\r\n<li>Melakukan tindakan penganiyaan atau intimidasi</li>\r\n<li>Melawan secara fisik kepada pengurus OSPIA</li>\r\n<li>Berkelahi</li>\r\n<li>Berjudi</li>\r\n<li>Tidak mengikuti kegiatan kepesantrenan (KBM, muhadhoroh, khutbatul&rsquo;arsy dll)</li>\r\n<li>Penyelewengan amanah (Keuangan, tanda tangan dll)</li>\r\n<li>Tidur diluar asrama</li>\r\n<li>Membawa, memiliki, menyimpan atau menggunakan senjata api/ tajam yang tidak wajar</li>\r\n<li>Memanfaatkan keluarga pesantren dan masyarakat sekitar Pesantren untuk berlindung dari tata tertib/disiplin Pesantren</li>\r\n</ol>\r\n<h5>&nbsp;</h5>\r\n<h5>Pasal 9</h5>\r\n<p><strong>PELANGGARAN KHUSUS</strong></p>\r\n<h2>1.&nbsp;&nbsp; Kabur dari pesantren</h2>\r\n<ol start="2">\r\n<li>Merokok</li>\r\n<li>Datang terlambat ke pesantren tanpa keterangan yang dapat dipertanggungjawabkan</li>\r\n<li>Membohongi ustadz/ustadzah</li>\r\n<li>Ngobrol, duduk-duduk dengan lawan jenis</li>\r\n<li>Keluar masuk pesantren tidak melalu jalur yang disediakan</li>\r\n</ol>\r\n<h2>&nbsp;</h2>\r\n<h2>Pasal 10</h2>\r\n<h2>SEDANG</h2>\r\n<ol>\r\n<li>Tidak sholat berjama&rsquo;ah di masjid pesantren pada waktunya</li>\r\n<li>Bermain kartu/gaple dan sejenisnya</li>\r\n<li>Bermain Play Station, warnet, game online dan sejenisnya</li>\r\n<li>Memiliki, membawa atau menyimpan buku/gambar yang tidak mendidik</li>\r\n<li>Membawa atau memakai pakaian yang tidak sesuai dengan ketentuan</li>\r\n<li>Membawa alat elektronik selain setrika</li>\r\n<li>Menyalahgunakan izin</li>\r\n<li>Melakukan kegiatan setelah jam 21:30 tanpa izin</li>\r\n<li>Memasuki kantor dan dapur pesantren tanpa izin</li>\r\n<li>Mengghosob hak millik orang lain</li>\r\n<li>Merusak, mencorat coret fasilitas pesantren</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BAB IV</strong></p>\r\n<p><strong>SANKSI</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 11</p>\r\n<p><strong>PELANGGARAN </strong><strong>SANGAT </strong><strong>BERAT</strong></p>\r\n<p>Sanksi bagi yang melakukan pelanggaran sangat berat adalah dikeluarkan dari pesantren</p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 12</p>\r\n<p><strong>PELANGGARAN BERAT</strong></p>\r\n<ol>\r\n<li>Melakukan satu kali:</li>\r\n<li>Berdiri di depan masjid sambil menghafal (ba&rsquo;da ashar s.d. maghrib) dengan memakai atribut 1 hari</li>\r\n<li>Meminta tanda tangan wali kelas, Kepala Madrasah dan Kepala Biro Santri</li>\r\n<li>Pelanggaran dua kali:</li>\r\n<li>Pemberitahuan orang tua/wali santri</li>\r\n<li>Berdiri di depan masjid dengan atribut sambil menghafal (ba&rsquo;da ashar s.d. Maghrib) 3 hari berturut-turut</li>\r\n<li>Pelanggaran tiga kali :</li>\r\n<li>Kerja bakti berat atau membayar dam minimal 1 zak semen</li>\r\n<li>Pemanggilan orang tua/wali santri</li>\r\n<li>Tidak boleh meninggalkan Pesantren selama 2 bulan (masa hukuman)</li>\r\n<li>Pelanggaran 4 kali dan seterusnya :</li>\r\n</ol>\r\n<p>Sanksi dan hukuman ditentukan berdasarkan rapat khusus Biro Santri</p>\r\n<ol start="5">\r\n<li>Sanksi khusus dengan mempertimbangkan dampak pelanggaran yang dilakukan tanpa melihat kuantitas pelanggaran</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 13</p>\r\n<p><strong>PELANGGARAN KHUSUS</strong></p>\r\n<ol>\r\n<li>Pelanggaran Khusus point 1 dan 2 pemotongan rambut</li>\r\n<li>Mengumpulkan buku bacaan (Ilmu Pengetahuan/Agama) kepada Biro Santri seharga minimal Rp. 20.000,- (dua puluh ribu rupiah) pada pelanggaran pertama dan berlaku kelipatannya untuk pelanggaran selanjutnya dan pelanggaran dengan penanganan yang lebih khusus dari biro santri.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 14</p>\r\n<p><strong>PELANGGARAN SEDANG</strong></p>\r\n<ol>\r\n<li>Pelanggaran sekali :</li>\r\n</ol>\r\n<p>Membersihkan lingkungan Pesantren selama 1 hari dengan memakai atribut.</p>\r\n<ol start="2">\r\n<li>Pelanggaran 2 kali dan seterusnya : Kelipatan dari sanksi pelanggaran sekali (sanksi pelanggaran sekali dikalikan dengan jumlah pelanggaran) atau sanksi lain yang ditetapkan Biro Santri.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 15</p>\r\n<p><strong>PEMBERI SANKSI</strong></p>\r\n<ol>\r\n<li>Pelanggaran sangat berat oleh Pimpinan Pesantren beserta pengurus pesantren</li>\r\n<li>Pelanggaran berat dan pelanggaran khusus oleh Biro Santri</li>\r\n<li>Pelanggaran sedang untuk santri Aliyah oleh Biro Santri</li>\r\n<li>Pelanggaran sedang untuk santri Tsanawiyah oleh Pengurus OSPIA</li>\r\n<li>Pelanggaran Pengurus OSPIA oleh KaBiro Santri</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p>Pasal 16</p>\r\n<p><strong>BARANG SITAAN</strong></p>\r\n<ol>\r\n<li>Barang sitaan hanya bisa diambil pada libur akhir semester</li>\r\n<li>Bila pada waktu yang telah ditentukan tidak diambil maka barang akan diumumkan dan selanjutnya diluar tanggung jawab pesantren.</li>\r\n</ol>\r\n<p>Muntilan, 21 Juli 2015</p>\r\n<p>Pimpinan Pesantren</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style="text-decoration: underline;">KYAI MUHAMMAD ZUHAERY, MA</span></p>\r\n<span style="text-decoration: underline;"><br /> </span>\r\n<p><strong>TATA TERTIB SANTRI (PUTRI)</strong><strong> 2015/2016</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>BAB I</strong></p>\r\n<p><strong>TATA TERTIB SEKOLAH</strong></p>\r\n<p>Pasal 1</p>\r\n<p><strong>SERAGAM</strong></p>\r\n<ol>\r\n<li>Seragam sekolah yang telah ditentukan Pesantren adalah sebagai berikut :</li>\r\n<li>Hari Sabtu dan Ahad</li>\r\n</ol>\r\n<p>Pramuka (untuk sekolah memakai rok dan untuk kegiatan lapangan memakai celana)</p>\r\n<ol>\r\n<li>Hari Senin dan Selasa</li>\r\n</ol>\r\n<p>1).&nbsp; Tsanawiyah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Putih dan Biru</p>\r\n<p>2).&nbsp; Aliyah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Putih dan Abu-abu</p>\r\n<ol>\r\n<li>Hari Rabu dan Kamis &nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; Seragam batik Pesantren</li>\r\n<li>Model dan bahan seragam standar sesuai dengan ketentuan Pesantren</li>\r\n<li>Memakai atribut sekolah lengkap :</li>\r\n<li>Badge dan papan nama dada</li>\r\n<li>Berkaos kaki hitam (Pramuka)</li>\r\n<li>Berkaos kaki putih (Batik, OSIS)</li>\r\n<li>Bersepatu warna hitam dengan tali yang sesuai</li>\r\n<li>Tidak diperkenankan memakai</li>\r\n<li>Jilbab transparan / sempit /mencolok</li>\r\n<li>Sendal / sepatu gunung atau berhak tinggi saat sekolah</li>\r\n<li>Lipstik dan atau eye shadow</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 2</p>\r\n<p><strong>KELAS</strong></p>\r\n<ol>\r\n<li>Setiap santri wajib masuk kelas tepat waktu</li>\r\n<li>Setiap pergantian jam pelajaran ditandai dengan bunyi bel</li>\r\n<li>Saat bel berbunyi masuk kelas harus sudah berada di kelas.</li>\r\n<li>Jadwal keluar masuk kelas disesuaikan dengan jadwal yang ada.</li>\r\n<li>Sebelum pelajaran dimulai seluruh santri berdoa dipimpin ketua kelas atau yang lainnya</li>\r\n<li>Bagi santri yang berhalangan hadir atau tidak masuk kelas baik karena alasan sakit, dan atau sesuatu hal lainnya wajib meminta izin ke Biro Santri.</li>\r\n<li>Sebagaimana tercantum dalam ayat 6 santri wajib menunjukkan slip tanda kebenaran izinnya</li>\r\n<li>Tanpa menunjukkan bukti kebenaran izin meninggalkan kelas maka dianggap absen (tidak masuk kelas tanpa izin).</li>\r\n<li>Setiap kelas dimana santri belajar harus dalam keadaan bersih dan tertib</li>\r\n<li>Piket kelas wajib datang lebih awal minimal 5 menit sebelum bel masuk</li>\r\n<li>Setiap piket kelas wajib untuk :</li>\r\n<li>Membersihkan ruang kelas</li>\r\n<li>Mengambil dan mengembalikan jurnal, absensi dan peralatan tulis</li>\r\n<li>Setiap ruang kelas wajib dilengkapi dengan :</li>\r\n<li>Jadwal piket</li>\r\n<li>Jadwal pelajaran</li>\r\n<li>Denah tempat duduk</li>\r\n<li>Struktur pengurus kelas</li>\r\n<li>Alat-alat kebersihan</li>\r\n<li>Kreasi santri</li>\r\n<li>Papan absensi santri</li>\r\n<li>Menutup pelajaran dengan do&rsquo;a kafarotul majlis sebelum meninggalkan kelas</li>\r\n<li>Bila keadaan darurat santri wajib izin kepada guru yang mengajar atau Biro Santri</li>\r\n<li>Tidak diperbolehkan bagi santri saat sekolah :</li>\r\n<li>Keluar kelas ketika jam pelajaran dan pergantian pelajaran</li>\r\n<li>Membuat kegaduhan di kelas</li>\r\n<li>Mencorat-coret atau merusak sarana dan prasarana milik pesantren</li>\r\n<li>Berbuat dan melakukan hal-hal yang tidak sesuai dengan etika kesopanan</li>\r\n<li>Makan dan minum di dalam kelas</li>\r\n<li>Apabila terjadi kekosongan di kelas ketua kelas/piket bertanggung jawab untuk melapor ke Guru Piket / ke kantor.</li>\r\n<li>Santri tidak diperbolehkan menulis apapun pada jurnal kelas</li>\r\n</ol>\r\n<h5>BAB II</h5>\r\n<p><strong>TATA TERTIB UMUM</strong></p>\r\n<h2>&nbsp;</h2>\r\n<h2>Pasal 3</h2>\r\n<h2>KEWAJIBAN</h2>\r\n<ol>\r\n<li>Menjunjung tinggi Ukhuwah Islamiyah dan etika :</li>\r\n<li>Selalu menebar senyum dan salam</li>\r\n<li>Saling menghargai dan menghormati</li>\r\n<li>Bersikap tawadhu&rsquo;</li>\r\n<li>Berjabat tangan bila bertemu ustadzat</li>\r\n<li>Menjalin komunikasi yang harmonis antar siswa, guru, administratur, karyawan, pengurus Pesantren dan Yayasan Pesantren Islam Al Iman.</li>\r\n<li>Menemui tamu di ruang tamu</li>\r\n<li>Lapor ke Biro Santri jika ada wali/tamu yang datang dan atau akan menginap</li>\r\n<li>Memberitahukan kepada wali-walinya agar berpakaian sopan dan menutupi aurat pada saat berkunjung ke Pesantren Islam Al Iman</li>\r\n<li>Lapor saat pulang dan kembali ke pesantren kepada Biro Santri</li>\r\n<li>Kewajiban dalam hal ibadah :</li>\r\n<li>Sholat fardhu berjama&rsquo;ah di masjid pesantren</li>\r\n<li>Melaksanakan dzikir setelah sholat dan dijaharkan saat shalat-shalat jahar (Maghrib, Isya, Shubuh)</li>\r\n<li>Mengikuti ibadah-ibadah sunnah sesuai yang telah diprogramkan pesantren</li>\r\n<li>Kewajiban dalam hal berpakaian :</li>\r\n<li>Memakai pakaian yang rapi, sopan dan sesuai dengan nilai-nilai Islam di setiap saat dan ketika meninggalkan pesantren dengan ketentuan sebagai berikut : Baju untuk stelan rok panjangnya minimal 15 cm di atas lutut dan tidak ketat, Baju untuk stelan celana panjang minimal 10 cm di atas lutut.</li>\r\n<li>Memakai pakaian olahraga pada waktu olahraga</li>\r\n<li>Mengikuti semua kegiatan yang diwajibkan oleh Pesantren :</li>\r\n<li>Mengikuti KBM dan berada di kelas pada jam-jam pelajaran</li>\r\n<li>Mengikuti Apel Sabtu Pagi yang dikoordinir oleh OSPIA</li>\r\n<li>Membiasakan berbahasa resmi (Arab dan Inggris) dalam percakapan sehari-hari</li>\r\n<li>Mengikuti kegiatan olahraga Jum&rsquo;at pagi</li>\r\n<li>Mengakhiri kegiatan olahraga dan kelas pada jam 17.00 WIB</li>\r\n<li>Berada di kamar dan istirahat pada pukul 21.30 wib</li>\r\n<li>Mendukung program Pesantren dan Organisasi yang berada dibawah naungannya</li>\r\n<li>Kewajiban dalam hal kebersihan dan lingkungan :</li>\r\n<li>Membersihkan fasilitas umum minimal seminggu sekali</li>\r\n<li>Menjaga dan mengamankan barang milik pribadi, Kamar dan Pesantren</li>\r\n<li>Menjaga Kebersihan diri, Kamar dan lingkungan Pesantren antara lain: kuku tidak boleh panjang, membereskan dan membersihkan kamar dan lingkungan Pesantren setiap hari</li>\r\n<li>Memanfaatkan fasilitas umum yang ada di pesantren secara proporsional</li>\r\n<li>Menjaga nama baik lembaga/almamater baik saat di pesantren maupun di luar pesantren</li>\r\n<li>Bagi santri yang sakit harus lapor kepada pengurus OSPIA</li>\r\n<li>Berkonsultasi dalam masalah apapun dengan Biro Santri Putri</li>\r\n<li>Segera meninggalkan masjid setelah kegiatan usai, seperti; shalat, tadarus, kajian atau tausiah</li>\r\n<li>Makan di ruang makan yang telah disediakan</li>\r\n</ol>\r\n<h2>&nbsp;</h2>\r\n<h2>Pasal 4</h2>\r\n<p><strong>LARANGAN</strong></p>\r\n<ol>\r\n<li>Mengancam, menganiaya atau berkelahi</li>\r\n<li>Merokok, mengkonsumsi atau mengedarkan miras dan narkoba</li>\r\n<li>Membawa atau menggunakan barang-barang yang tidak sesuai dengan ketentuan pesantren seperti :</li>\r\n<li>Pakaian yang terbuat dari bahan jean''s dalam model apapun</li>\r\n<li>Pakaian transparan atau ketat (panjang atau pendek)</li>\r\n<li>Celana codoray, cut bry atau bludru</li>\r\n<li>Segala macam perhiasan kecuali jam tangan dan anting-anting</li>\r\n<li>Elektronika apapun (tape, radio, tv, handphone, mp3 player dan sejenisnya) kecuali setrika</li>\r\n<li>Senjata api dan atau senjata tajam</li>\r\n<li>Kendaraan</li>\r\n<li>Jimat dan sejenisnya</li>\r\n<li>Bacaan, gambar, media cetak yang tidak mendidik dan tidak layak</li>\r\n<li>Kosmetika kecuali yang diperbolehkan</li>\r\n<li>Mengadakan kegiatan yang mengganggu jalannya disiplin Pesantren</li>\r\n<li>Larangan dalam hal berpakaian :</li>\r\n<li>Memakai Jaket, serta celana batik dan baju tidur selain di kamar, ketika sakit atau bila cuaca dingin</li>\r\n<li>Memakai jas kecuali saat bertugas</li>\r\n<li>Memakai kaos kecuali saat berolahraga atau tidur</li>\r\n<li>Memakai pakaian selain pakaian olahraga saat berolahraga</li>\r\n<li>Membuat seragam apapun kecuali ada izin dari Pesantren Islam Al Iman</li>\r\n<li>Memakai mukena bergambar</li>\r\n<li>Pinjam meminjam pakaian sesama santri putri selain seragam sekolah</li>\r\n<li>Memakai sepatu gunung atau sepatu sandal saat sekolah</li>\r\n<li>Larangan dalam hal kegiatan :</li>\r\n<li>Pergi/keluar pesantren tanpa izin</li>\r\n<li>Meletakkan Al Qur&rsquo;an tidak pada tempatnya.</li>\r\n<li>Tidur atau ngobrol pada waktu tadarrus Al Quran dan jeda antara azan dan iqamat</li>\r\n<li>Masuk dan makan di dapur pesantren.</li>\r\n<li>Makan tidak di tempat dan waktu yang telah ditentukan.</li>\r\n<li>Membawa tamu ke kamar tanpa izin</li>\r\n<li>Meninggalkan shaf pada waktu dzikir</li>\r\n<li>Menerima telpon kecuali dari walinya dengan seizin Biro Santri</li>\r\n<li>Melakukan kegiatan apapun setelah pukul 21.30 WIB kecuali yang diprogramkan oleh pesantren</li>\r\n<li>Mencorat-coret atau merusak apapun hak milik perorangan maupun Pesantren</li>\r\n<li>Kembali ke asrama pada waktu jam sekolah dan jam-jam belajar</li>\r\n<li>Berhubungan dengan santri putra kecuali keluarga atas izin biro santri putri</li>\r\n<li>Mengadakan pertemuan (khalwat/tahabub) antara putra-putri, baik secara perseorangan maupun kelompok di dalam dan di luar Pesantren, kecuali untuk kepentingan organisasi dengan disertai pembimbing dari majlis guru Pesantren Al Iman</li>\r\n<li>Membuat kegaduhan/keributan dimanapun</li>\r\n<li>Makan dan minum sambil berdiri atau dengan tangan kiri</li>\r\n<li>Memanfaatkan keluarga pesantren dan masyarakat sekitar untuk berlindung dari tata tertib/disiplin pesantren</li>\r\n<li>Mengeluarkan kasur dan lemari dari kamar tanpa alasan yang jelas.</li>\r\n<li>Membuang sampah sembarangan</li>\r\n<li>Bermalam atau menonton televisi di luar pesantren</li>\r\n<li>Memasuki kawasan asrama (kamar) putra tanpa alasan yang jelas</li>\r\n<li>Meminjam barang milik masyarakat</li>\r\n<li>Memakai barang milik orang lain tanpa izin</li>\r\n</ol>\r\n<ul>\r\n<li>Meminta fasilitas komunikasi kepada selain biro santri putri</li>\r\n</ul>\r\n<ol start="7">\r\n<li>Menyimpan uang di kamar melebihi Rp 25.000,- (<em>Dua puluh lima ribu rupiah</em>)</li>\r\n<li>Memiliki almari lebih dari satu</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 5</p>\r\n<h2>PERIZINAN</h2>\r\n<ol>\r\n<li>Perizinan pulang ke rumah diberikan pada libur ulangan tengah semester dan akhir semester</li>\r\n<li>Perizinan keluar tanpa menginap (harus sudah kembali ke pesantren paling lambat jam 17:00 WIB) diberikan satu kali dalam satu bulan (bergantian putra dan putri)</li>\r\n<li>Santri yang akan keluar dari Pesantren/pulang minta izin ke Biro Santri</li>\r\n<li>Mengenakan seragam ketika pulang dan datang sesuai dengan yang telah ditentukan</li>\r\n<li>Tidak ada perizinan pada hari-hari efektif kecuali dengan walinya</li>\r\n<li>Tidak diperbolehkan memiliki dua kartu perizinan</li>\r\n<li>Membayar administrasi sesuai yang telah ditentukan yaitu Rp 1.000,- (Seribu rupiah)</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 6</p>\r\n<h2>LARANGAN KHUSUS SANTRI</h2>\r\n<ol>\r\n<li>Menentang segala ketentuan yang telah ditetapkan oleh pesantren</li>\r\n<li>Membawa atau memelihara binatang di dalam pesantren</li>\r\n<li>Menyelenggarakan acara dengan mengatasnamakan kelas atau kelompok tanpa sepengetahuan dan seizin dari Pesantren (Biro Santri)</li>\r\n<li>Penarikan iuran tanpa seizin pesantren</li>\r\n<li>Membuat atau menyanyikan yel-yel atau gerak dan lagu yang bertentangan dengan nilai-nilai Pesantren dan syari&rsquo;at Islam</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BAB III</strong></p>\r\n<h2>KLASIFIKASI PELANGARAN</h2>\r\n<p>&nbsp;</p>\r\n<p>Pasal 7</p>\r\n<h2>SANGAT BERAT</h2>\r\n<ol>\r\n<li>Melawan secara fisik kepada majlis asatidz</li>\r\n<li></li>\r\n<li>Membawa, memiliki, mengkonsumsi atau mengedarkan miras, narkoba dan sejenisnya</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 8</p>\r\n<p><strong>BERAT</strong></p>\r\n<ol>\r\n<li>Tidak sholat dengan sengaja</li>\r\n<li>Hubungan lawan jenis (tahabub/ khalwat.)</li>\r\n<li>Bertindak asusila</li>\r\n<li>Mengambil barang milik orang lain (mencuri)</li>\r\n<li>Menghina, melecehkan institusi, asatidz dan pengurus Pesantren</li>\r\n<li>Melakukan tindakan penganiayaan atau intimidasi</li>\r\n<li>Melawan secara fisik kepada pengurus OSPIA</li>\r\n<li>Berkelahi</li>\r\n<li>Berjudi</li>\r\n<li>Merokok</li>\r\n<li>Tidak mengikuti kegiatan kepesantrenan (KBM, muhadhoroh, khutbatul&rsquo;arsy)</li>\r\n<li>Penyelewengan amanah (Keuangan, tanda tangan dll)</li>\r\n<li>Tidur di luar asrama</li>\r\n<li>Membawa, memiliki, menyimpan atau menggunakan senjata api / tajam yang tidak wajar</li>\r\n<li>Memanfaatkan keluarga pesantren dan masyarakat sekitar untuk berlindung dari tata tertib/disiplin pesantren</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<br />\r\n<p>Pasal 9</p>\r\n<p><strong>PELANGGARAN KHUSUS</strong></p>\r\n<h2>1.&nbsp;&nbsp; Kabur dari Pesantren</h2>\r\n<h2>2.&nbsp;&nbsp; Datang terlambat ke Pesantren tanpa keterangan yang dapat dipertanggungjawabkan</h2>\r\n<ol start="3">\r\n<li>Membohongi ustadz/ustadzah</li>\r\n<li>Ngobrol, duduk-duduk dengan lawan jenis</li>\r\n<li>Keluar masuk pesantren tidak melalu jalur yang disediakan</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 10</p>\r\n<p><strong>SEDANG</strong></p>\r\n<ol>\r\n<li>Tidak sholat berjama&rsquo;ah</li>\r\n<li>Bermain kartu/gaple dan sejenisnya</li>\r\n<li>Bermain Play Station, warnet, game online dan sejenisnya</li>\r\n<li>Memiliki, membawa dan menyimpan buku atau gambar yang tidak mendidik</li>\r\n<li>Membawa/memakai pakaian yang tidak sesuai dengan ketentuan</li>\r\n<li>Membawa alat elektronik selain setrika</li>\r\n<li>Menyalahgunakan izin</li>\r\n<li>Melakukan kegiatan setelah jam 21:30 tanpa izin</li>\r\n<li>Memasuki kantor dan dapur pesantren tanpa izin</li>\r\n<li>Mengghoshob hak milik orang lain</li>\r\n<li>Merusak fasilitas pesantren</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>BAB IV</strong></p>\r\n<p><strong>SANKSI</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 11</p>\r\n<p><strong>PELANGGARAN SANGAT BERAT</strong></p>\r\n<p>Sanksi bagi yang melakukan pelanggaran sangat berat adalah dikeluarkan</p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 12</p>\r\n<p><strong>PELANGGARAN BERAT</strong></p>\r\n<ol>\r\n<li>Melakukan satu kali :</li>\r\n<li>Berdiri di depan kantor/asrama sambil menghafal (ba&rsquo;da Ashar s.d. Maghrib) dengan memakai atribut 1 hari</li>\r\n<li>Meminta tanda tangan wali kelas, Kepala Madrasah dan Kepala Biro Santri</li>\r\n<li>Pelanggaran dua kali :</li>\r\n<li>Pemberitahuan orang tua/wali santri</li>\r\n<li>Berdiri di depan kantor/asrama sambil menghafal dengan atribut (ba&rsquo;da ashar s.d. Maghrib) 3 hari berturut-turut</li>\r\n<li>Pelanggaran tiga kali :</li>\r\n<li>Kerja bakti berat atau membayar dam minimal 1 zak semen</li>\r\n<li>Pemanggilan orang tua/wali santri</li>\r\n<li>Tidak boleh meninggalkan Pesantren selama 2 bulan (masa hukuman)</li>\r\n<li>Pelanggaran 4 kali dan seterusnya :</li>\r\n</ol>\r\n<p>Sanksi dan hukuman ditentukan berdasarkan rapat khusus Biro Santri</p>\r\n<ol start="5">\r\n<li>Sanksi khusus dengan mempertimbangkan dampak pelanggaran yang dilakukan tanpa melihat kuantitas pelanggaran</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Pasal 13</p>\r\n<p><strong>PELANGGARAN KHUSUS</strong></p>\r\n<p>Mengumpulkan buku bacaan (Ilmu Pengetahuan/Agama) kepada Biro Santri seharga minimal Rp. 20.000,- (dua puluh ribu) pada pelanggaran pertama dan berlaku kelipatannya untuk pelanggaran selanjutnya dan pelanggaran dengan penanganan yang lebih khusus.</p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 14</p>\r\n<p><strong>PELANGGARAN SEDANG</strong></p>\r\n<ol>\r\n<li>Pelanggaran sekali :</li>\r\n</ol>\r\n<p>Membersihkan lingkungan Pesantren selama 1 hari dengan memakai atribut</p>\r\n<ol start="2">\r\n<li>Pelanggaran 2 kali dan seterusnya :</li>\r\n</ol>\r\n<p>Kelipatan dari sanksi pelanggaran sekali (sanksi pelanggaran sekali dikalikan dengan jumlah pelanggaran) dan atau sanksi lain yang ditetapkan Biro Santri</p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 15</p>\r\n<p><strong>PEMBERI SANKSI</strong></p>\r\n<ol>\r\n<li>Pelanggaran sangat berat oleh Pimpinan Pesantren beserta Pengurus Pesantren</li>\r\n<li>Pelanggaran berat dan pelanggaran khusus oleh Biro Santri Putri</li>\r\n<li>Pelanggaran sedang untuk santri Aliyah oleh Biro Santri Putri</li>\r\n<li>Pelanggaran sedang bagi santri MTs oleh Pengurus OSPIA</li>\r\n<li>Pelanggaran Pengurus OSPIA oleh KaBiro Santri</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>PASAL 16</p>\r\n<p><strong>BARANG SITAAN</strong></p>\r\n<ol>\r\n<li>Barang sitaan hanya bisa diambil pada libur akhir semester</li>\r\n<li>Bila pada waktu yang telah ditentukan tidak diambil maka barang akan diumumkan dan selanjutnya diluar tanggung jawab biro santri.</li>\r\n</ol>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>Muntilan, 21 Juli 2015</p>\r\n<p>Pimpinan Pesantren</p>\r\n<p>&nbsp;</p>\r\n<p>Ttd.</p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style="text-decoration: underline;">KYAI MUHAMMAD ZUHAERY, MA</span></strong></p>\r\n<p><span style="text-decoration: underline;">&nbsp;</span></p>', '46buku tatib santri putra dan Putri 2015-2017.doc', '2017/2018'),
(17, '', '', '2018/2019'),
(18, '', '', '2023/2024'),
(19, '', '', '2022/2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `biayapendidikan`
--
ALTER TABLE `biayapendidikan`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `biayapendidikandetail`
--
ALTER TABLE `biayapendidikandetail`
  ADD PRIMARY KEY (`id_detailbiaya`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jenispelanggaran`
--
ALTER TABLE `jenispelanggaran`
  ADD PRIMARY KEY (`id_jenispelanggaran`);

--
-- Indexes for table `kalenderakademik`
--
ALTER TABLE `kalenderakademik`
  ADD PRIMARY KEY (`id_kalenderakademik`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kontakkami`
--
ALTER TABLE `kontakkami`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pelanggaransantri`
--
ALTER TABLE `pelanggaransantri`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `pembayaransiswa`
--
ALTER TABLE `pembayaransiswa`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `riwayatkelas`
--
ALTER TABLE `riwayatkelas`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`id_tahunajaran`);

--
-- Indexes for table `tatatertibsantri`
--
ALTER TABLE `tatatertibsantri`
  ADD PRIMARY KEY (`id_tatatertib`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `biayapendidikan`
--
ALTER TABLE `biayapendidikan`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `biayapendidikandetail`
--
ALTER TABLE `biayapendidikandetail`
  MODIFY `id_detailbiaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `jenispelanggaran`
--
ALTER TABLE `jenispelanggaran`
  MODIFY `id_jenispelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kalenderakademik`
--
ALTER TABLE `kalenderakademik`
  MODIFY `id_kalenderakademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `kontakkami`
--
ALTER TABLE `kontakkami`
  MODIFY `id_kontak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pelanggaransantri`
--
ALTER TABLE `pelanggaransantri`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pembayaransiswa`
--
ALTER TABLE `pembayaransiswa`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `riwayatkelas`
--
ALTER TABLE `riwayatkelas`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `id_tahunajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tatatertibsantri`
--
ALTER TABLE `tatatertibsantri`
  MODIFY `id_tatatertib` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
