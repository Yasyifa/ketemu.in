<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>KETEMU.IN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('import/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('import/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
        /* Styling untuk gambar profil */
        .profile-img {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .profile-img img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .edit-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
        }

        .edit-icon:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .sitename {
            color: rgb(42, 59, 67);
            font-size: 15px;
            font-weight: bold;
        }

        /*style pengumuman */

        /* About Section */
        .about {
            background-color: #f1f8ff; /* Warna latar belakang yang lebih terang dan modern */
            padding: 60px 0;
            font-family: 'Poppins', sans-serif; /* Font modern */
        }

        /* Section Title */
        .section-title h2 {
            font-size: 36px;
            color: #2a3d52; /* Warna biru cerah untuk judul */
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-out;
        }

        .section-title p {
            font-size: 18px;
            text-align: center;
            color: #555;
            line-height: 1.6;
            animation: fadeIn 1.5s ease-out;
        }

        .card-img-top {
            height: 100px; /* Ukuran tinggi gambar */
            object-fit: cover; /* Menjaga rasio gambar tetap proporsional */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            width: 100%; /* Pastikan gambar mengisi lebar card */
        }

        /* Efek hover untuk gambar */
.portfolio-content img {
    height: 200px; /* Menentukan tinggi gambar */
    object-fit: cover; /* Menjaga rasio gambar tetap proporsional */
    width: 100%; /* Memastikan gambar mengisi lebar kontainer */
    transition: transform 0.3s ease; /* Transisi halus saat hover */
}

/* Efek saat hover */
.portfolio-content img:hover {
    transform: scale(0.95); /* Mengurangi ukuran gambar menjadi 95% saat hover */
}



        /* Logo Section */
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .about-logo {
            width: 80%;
            max-width: 250px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .about-logo:hover {
            transform: scale(1.1); /* Efek hover pada logo */
        }

        /* Content Section */
        .content {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            animation: fadeIn 2s ease-out;
        }

        .content h2 {
            font-size: 28px;
            color: #243950;
            margin-bottom: 20px;
            text-align: center;
        }

        .content p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            text-align: justify;
            animation: fadeIn 2.5s ease-out;
        }

        .fst-italic {
            font-style: italic;
            color: #888;
        }

        /* Styling for List */
        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        ul li i {
            color: #007bff;
            margin-right: 10px;
        }

        /* Animation for fade-in */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

    /* Responsiveness */
    @media (max-width: 768px) {
        .content {
            padding: 20px;
        }

        .section-title h2 {
            font-size: 28px;
        }

        .section-title p {
            font-size: 16px;
        }

        .content h2 {
            font-size: 24px;
        }

        .content p {
            font-size: 14px;
        }

        .about-logo {
            width: 60%;
        }
    }





    /* Warna default untuk teks "Pelaporan" */
    .dropdown a span {
        color: #aeaeae; /* Ganti dengan warna yang diinginkan */
        transition: color 0.3s ease;
    }

    /* Warna saat hover pada link "Pelaporan" */
    .dropdown a:hover span {
        color: #ffffff; /* Ganti dengan warna hover yang diinginkan */
    }

    /* Warna saat dropdown terbuka */
    .dropdown.show a span {
        color: #007bff; /* Ganti dengan warna aktif saat dropdown terbuka */
    }



    </style>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('import/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('import/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      @if (Auth::user()->profile_picture)
          <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Image" class="img-fluid rounded-circle">
      @else
          <img src="{{ asset('import/assets/img/my-profile-img.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle">
      @endif
      <!-- Ikon Edit untuk Foto Profil -->
      <a href="{{ route('profile.show') }}" class="edit-icon">
        <i class="fas fa-pencil-alt"></i>
      </a>
      <a href="{{ route('profile.show') }}" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename">{{ Auth::user()->name }}</h1>
      </a>
    </div>
    
  

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#home" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
        <li class="dropdown"><a href="#pelaporan"><i class="bi bi-menu-button navicon"></i> <span>Pelaporan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>  
                <ul>
                  <li><a href="{{ route('lost_items.create') }}">Kehilangan</a></li>
                  <li><a href="{{ route('found_items.create') }}">Ditemukan</a></li>
                </ul>
          </li>
        <li><a href="#pengumuman"><i class="bi bi-images navicon"></i> Pengumuman</a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
        <li><a href="{{ route('history') }}"><i class="bi bi-hdd-stack navicon"></i> History</a></li>
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        <!-- Tombol Logout -->
        <li>
          <form action="{{ route('logout') }}" method="POST" style="margin-top: 15px;">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm w-100">Logout</button>
          </form>
      </li>
      </ul>
    </nav>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="home" class="hero section dark-background">

      <img src="{{ asset('import/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in" class="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>TEMUKAN YANG HILANG</h2>
        <p>Kembalikan yang Berharga <span class="typed" > </span></p>

        <!-- Tambahkan tombol Login dan Register -->
      </div>

    </section><!-- /Hero Section -->

<!-- Portfolio Section -->

<section id="pengumuman" class="portfolio section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>PENGUMUMAN</h2>
    <p>Kehilangan kunci? Dompet ketinggalan? Atau malah menemukan barang orang lain? Tenang, disini tempatnya! Laporkan atau cari barang hilangmu sekarang.</p>
  </div>

  <div class="container">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

    <!-- Portfolio Filters -->
    <div class="text-center mt-4 mb-4">
      <a href="{{ route('announcements.index') }}" class="btn btn-primary">Lihat Semua Barang</a>
    </div>
    
    <!-- End Portfolio Filters -->

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        
      <!-- Display Found Items -->
        @foreach($foundItems as $item)
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-found">
            <div class="portfolio-content h-100">
              <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="Found Item Image"  >
              <div class="portfolio-info">
                <h4 style="background-color: {{ strtolower($item->status) === 'found' ? '#28a745' : '#dc3545' }};">
                  {{ $item->status === 'found' ? 'Ditemukan' : (strtolower($item->status) === 'lost' ? 'Hilang' : $item->status) }}
                </h4>             
                <p>{{ $item->item_name }}</p> <!-- Menampilkan nama barang -->
                <a href="{{ asset('storage/' . $item->image) }}" title="Item Image" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"> </i></a>
              </div>
            </div>
          </div><!-- End Found Item -->
        @endforeach

        <!-- Display Lost Items -->
        @foreach($lostItems as $item)
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-lost">
            <div class="portfolio-content h-100">
              <img src="{{ asset('storage/' . $item->image_path) }}" class="img-fluid" alt="Lost Item Image">
              <div class="portfolio-info">
                <h4 style="background-color: {{ strtolower($item->status) === 'found' ? '#28a745' : (strtolower($item->status) === 'lost' ? '#dc3545' : '#6c757d') }}; color: #ffffff; padding: 5px;">
                  {{ $item->status === 'found' ? 'Ditemukan' : (strtolower($item->status) === 'lost' ? 'Hilang' : $item->status) }}
                </h4>              
                <p>{{ $item->item_name }}</p> <!-- Menampilkan nama barang -->
                <a href="{{ asset('storage/' . $item->image_path) }}" title="Item Image" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>
          </div><!-- End Lost Item -->
        @endforeach
      </div><!-- End Portfolio Container -->
    </div>
  </div>
</section><!-- End Portfolio Section -->




    <!-- About Section -->
<section id="about" class="about section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>About KETEMU.IN</h2>
    <p>Selamat datang di KETEMU.IN, platform inovatif yang dirancang untuk membantu Anda dalam mencari dan melaporkan barang hilang. Kami memahami betapa pentingnya barang-barang pribadi Anda, dan kami hadir untuk menjembatani mereka yang kehilangan dengan mereka yang menemukan, memberikan solusi cepat dan efisien bagi semua pihak yang terlibat.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center">
      <!-- Logo Section -->
      <div class="col-lg-4">
        <div class="logo-container">
          <img src="{{ asset('import/assets/img/logo.jpg') }}" alt="KETEMU.IN Logo" class="about-logo">
        </div>
      </div>

      <!-- Content Section -->
      <div class="col-lg-8 content">
        <h2>Platform untuk Pencarian dan Pelaporan Barang Hilang</h2>
        <p class="fst-italic py-3">
          KETEMU.IN adalah solusi yang dirancang untuk memberikan kenyamanan dalam proses pencarian barang yang hilang dan pelaporan barang yang ditemukan. Kami berkomitmen untuk mempermudah proses ini dengan sistem yang aman dan mudah diakses.
        </p>
        <div class="row">
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Didirikan:</strong> <span>2024</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.ketemu.in</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+62 123 456 7890</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Lokasi:</strong> <span>Semarang, Indonesia</span></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Usia:</strong> <span>1 Tahun</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Visi:</strong> <span>Menyatukan orang yang kehilangan dan menemukan barang</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>support@ketemu.in</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Tersedia</span></li>
            </ul>
          </div>
        </div>
        <p class="py-3">
          Kami percaya bahwa setiap barang memiliki nilai sentimental dan praktis bagi pemiliknya. KETEMU.IN hadir dengan teknologi yang memungkinkan Anda untuk melaporkan barang yang hilang dengan mudah, serta menemukan barang yang mungkin telah hilang oleh orang lain. Dengan fitur yang mudah digunakan, kami bertujuan untuk membuat pencarian barang hilang menjadi lebih cepat dan efisien.
        </p>
      </div>
    </div>
  </div>

</section><!-- /About Section -->






    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>HAPPY CLIENTS</strong> <span>Mereka yang berhasil menemukan barangnya kembali</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>BARANG YANG DILAPORKAN</strong> <br> <span>Cari barang anda disini</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>JAM PELAYANAN</strong> <span>Hubungi kami jika ada kendala</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>TEAM YANG BERDEDIKASI</strong><br> <span>Kami bekerja keras untuk membantu anda menemukan barang hilang</span></p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Quotes</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Setiap kehilangan membawa pelajaran berharga; ia mengajarkan kita untuk lebih menghargai apa yang pernah ada.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('import/assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                <h3>Naim</h3>
                <h4>Team of KETEMU.IN</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('import/assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('import/assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('import/assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <img src="{{ asset('import/assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Punya pertanyaan atau ingin melaporkan masalah? Jangan ragu untuk menghubungi kami.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-9">

          <div class="col-lg-50">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>XFJ6+8CG, Jl. Kedungmundu, Kedungmundu, Kec. Tembalang, Kota Semarang, Jawa Tengah
                    </p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+6281391526130</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>yasifayasifa309@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15839.663107867204!2d110.461075!3d-7.019186000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708da6982bca27%3A0x62442c86da5dc3eb!2sS1%20Teknologi%20Informasi%20UNIMUS!5e0!3m2!1sid!2sid!4v1733567069585!5m2!1sid!2sid" width="100%" height="270px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <strong class="px-1 sitename">KETEMU.IN</strong> </p>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://ti.unimus.ac.id/">Information Technology Students</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('import/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('import/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('import/assets/js/main.js') }}"></script>

</body>

</html>