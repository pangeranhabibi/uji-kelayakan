<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <meta name="csrf-token" content="{{csrf_token() }}"> --}}
    <title>Data Keterlambatan</title>
    <!-- bootstrap 5 css -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
      integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
      crossorigin="anonymous"
    />
    <!-- custom css -->
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <style>
      li {
        list-style: none;
        margin: 20px 0 20px 0;
      }

      a {
        text-decoration: none;
      }

      .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        margin-left: -400px;
        transition: 0.4s;
        background-color: black; 
        color: white;
      }

      .active-main-content {
        margin-left: 290px;
      }

      .active-sidebar {
        margin-left: 0;
      }

      .submenu {
        display: none;
        margin-left: 20px;
      }

      .active-submenu {
        display: block;
      }

      .submenu a:hover {
        color: black !important;
      }

      #main-content {
        transition: 0.4s;
      }

      #admin-logo {
        position: fixed;
        top: 20px;
        right: 20px;
        cursor: pointer;
      }

      .logout-btn {
        position: absolute;
        bottom: 20px;
        left: 20px;
      }
    </style>
  </head>

  <body>
    <div>
    
<div class="sidebar p-4 bg-dark" id="sidebar">
  <h4 class="mb-5 text-white"><i class="bi bi-alarm"></i> Rekam Keterlambatan</h4>
  @if(auth()->user()->role === 'PS')
  <li>
      <a class="text-white" href="{{ route('ps.index') }}">
          <i class="bi bi-house mr-2"></i>
          Dashboard
      </a>
  </li>
  @endif
  @if(auth()->user()->isAdmin())
  <li>
      <a class="text-white" href="{{ route('home') }}">
          <i class="bi bi-house mr-2"></i>
          Dashboard
      </a>
  </li>
      <li>
          <a class="text-white" href="#" id="data-master">
              <i class="bi bi-bar-chart-line"></i> Data Master
          </a>
          <ul class="submenu" id="submenu-master">
              <li><a class="dropdown-item text-white" href="{{ route('rombel.index') }}"><i class="bi-building"></i> Data Rombel</a></li>
              <li><a class="dropdown-item text-white" href="{{ route('rayon.index') }}"><i class="bi bi-geo-alt"></i> Data Rayon</a></li>
              <li><a class="dropdown-item text-white" href="{{ route('student.index') }}"><i class="bi bi-person-rolodex"></i> Data Siswa</a></li>
              <li><a class="dropdown-item text-white" href="{{ route('user.index') }}"><i class="bi bi-person"></i> Data User</a></li>
          </ul>
      </li>
      <li>
        <a class="text-white" href="{{ route('admin.lates.index') }}">
            <i class="bi bi-newspaper mr-2"></i>
            Data Keterlambatan
        </a>
    </li>
  @endif
  @if(auth()->user()->role === 'PS') <!-- Tampilkan hanya untuk PS -->
      <li>
          <a class="text-white" href="{{ route('ps.student.student') }}">
              <i class="bi bi-person-rolodex"></i> Data Siswa
          </a>
      </li>
      
  <li>
    <a class="text-white" href="{{ route('ps.lates.rekap') }}">
        <i class="bi bi-newspaper mr-2"></i>
        Data Keterlambatan
    </a>
</li>
  @endif
 

  <li class="logout-btn">
      @auth
          <a class="text-white" href="{{ route('logout') }}">
              <i class="bi bi-box-arrow-right mr-2"></i>
              Logout ({{ auth()->user()->name }})
          </a>
      @else
          <a class="text-white" href="{{ route('login') }}">
              <i class="bi bi-box-arrow-right mr-2"></i>
              Login
          </a>
      @endauth
  </li>
</div>
      <div class="p-4" id="main-content">
        <button class="btn btn-dark" id="button-toggle">
          <i class="bi bi-list"></i>
        </button>
      <div class="container">
          {{-- bagian dinamis yang akan berubah tiap pagenya, harus diisi di file yang extends ke template ke template ini --}}
          @yield('content')
        </div>
    </div>
      <script>
        const dataMasterLink = document.getElementById("data-master");
        const submenuMaster = document.getElementById("submenu-master");

        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {

          // when the button-toggle is clicked, it will add/remove the active-sidebar class
          document.getElementById("sidebar").classList.toggle("active-sidebar");

          // when the button-toggle is clicked, it will add/remove the active-main-content class
          document.getElementById("main-content").classList.toggle("active-main-content");
        });

        // event will be executed when Data Master is clicked
        dataMasterLink.addEventListener("click", () => {
          // toggle the active-submenu class to show/hide the submenu
          submenuMaster.classList.toggle("active-submenu");
        }); 
      </script>
      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>
