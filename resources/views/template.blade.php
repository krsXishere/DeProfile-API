<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i>
        <img src="{{asset('assets/image/logo-1.svg')}}" alt="De'Profile Logo">
      </i>
      <span class="logo_name">De'Profile</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="/beranda">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Beranda</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/beranda">Beranda</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="provinsi">
            <i class='bx bx-world' ></i>
            <span class="link_name">Daerah</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="/provinsi">Daerah</a></li>
          <li><a href="/provinsi">Provinsi</a></li>
          <li><a href="/kabupaten">Kabupaten/Kota</a></li>
          <li><a href="/kecamatan">Kecamatan</a></li>
          <li><a href="/desa">Kelurahan/Desa</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="/sekolah">
            <i class='bx bx-buildings' ></i>
            <span class="link_name">Sekolah</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="/sekolah">Sekolah</a></li>
          <li><a href="/guru-sekolah">Guru</a></li>
          <li><a href="/fasilitas">Fasilitas</a></li>
          <li><a href="/ekstrakulikuler">Ekstrakulikuler</a></li>
          <li><a href="/prestasi">Prestasi</a></li>
          <li><a href="/galeri">Galeri</a></li>
          <li><a href="/jurusan">Jurusan</a></li>
          <li><a href="/siswa-sekolah">Siswa</a></li>
        </ul>
      </li>
      <li>
        <a href="/kurikulum">
          <i class='bx bx-book-alt'></i>
          <span class="link_name">Kurikulum</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/kurikulum">Kurikulum</a></li>
        </ul>
      </li>
      <li>
        <a href="/user">
          <i class='bx bx-user' ></i>
          <span class="link_name">Pengguna</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/user">Pengguna</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
        <div class="name-job">
            <div class="profile_name">{{Auth::user()->name}}</div>
            <div class="job">Admin</div>
          </div>
        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{route('logout')}}" method="POST">
          @csrf
          <button class="logout" style="background-color:transparent; border:none" type="submit">
            <i class='bx bx-log-out'></i>
          </button>
        </form>
    </div>
  </li>
</ul>
  </div>
   @yield('content')
 
 
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>

  <script>
        $('.without-caption').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 500, // don't foget to change the duration also in CSS
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    // openerElement is the element on which popup was initialized, in this case its <a> tag
                    // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    </script>
</body>
</html>
