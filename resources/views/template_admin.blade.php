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
        <div class="iocn-link">
          <a href="/admin_sekolah/jurusan">
            <i class='bx bx-buildings' ></i>
            <span class="link_name">Jurusan</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="/admin_sekolah/jurusan">Jurusan</a></li>
          <li><a href="/admin_sekolah/guru">Guru</a></li>
          <li><a href="/admin_sekolah/fasilitas">Fasilitas</a></li>
          <li><a href="/admin_sekolah/ekstrakulikuler">Ekstrakulikuler</a></li>
          <li><a href="/admin_sekolah/prestasi">Prestasi</a></li>
          <li><a href="/admin_sekolah/galeri">Galeri</a></li>
          <li><a href="/admin_sekolah/siswa">Siswa</a></li>
        </ul>
      </li>
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
        <div class="name-job">
            <div class="profile_name">{{Auth::user()->name}}</div>
            <div class="job">Admin</div>
          </div>
        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{route('admin_sekolah_logout')}}" method="POST">
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
