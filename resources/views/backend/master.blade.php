
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/modules/summernote/summernote-bs4.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/css/style.css">
  <link rel="stylesheet" href="{{asset('/backend')}}/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>

    {{-- navbar --}}
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
           
          </ul>
         
        </form>
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('/backend')}}/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->email }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              @if (auth()->user()->role == 'karyawan')
                  
              <a href="/karyawan/{{ auth()->user()->id }}/edit" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>

              
              @endif
              <a href="/password/{{ auth()->user()->id }}/edit" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Ganti Password
              </a>
             
              <div class="dropdown-divider"></div>
              <a href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      {{-- end navbar --}}

      {{-- sidebar --}}
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/suara">Suara</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
           
                
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
              <ul class="dropdown-menu">
                {{-- <li><a class="nav-link" href="/dashboard">Laundry</a></li>
                <li><a href="/dashboard/keuangan" class="nav-link">Keuangan</a></li>
                 --}}
              </ul>
            </li>
            <li class="menu-header">Starter</li>
            @if (auth()->user()->role == 'admin')

             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Suara</span></a>
              <ul class="dropdown-menu">
                <li><a href="/suara" class="nav-link">Suara</a></li>
                <li><a href="/laporan/suara" class="nav-link">Laporan</a></li>
                
              </ul>
            </li>
            {{-- <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Users</span></a>
              <ul class="dropdown-menu">
                <li><a href="/karyawan" class="nav-link">Karyawan</a></li>
                <li><a href="/penggajian" class="nav-link">Penggajian</a></li>
                
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Laundry</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/harga">Paket Laundry</a></li>
                 <li><a href="/transaksi" class="nav-link">Trash</a></li> --}}
                
              {{-- </ul>
            </li>
                
            <li><a class="nav-link" href="/customer"><i class="far fa-user"></i> <span>Customers</span></a></li>

            <li><a class="nav-link" href="/transaksi"><i class="far fa-user"></i> <span>Transaksi</span></a></li>

            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/laporan/laundry">Laundry</a></li>
                <li><a href="/transaksi" class="nav-link">Trash</a></li>
                
              </ul> 
            </li> --}}
            @elseif ( auth()->user()->role == 'karyawan')
                
           
            <li><a class="nav-link" href="/customer"><i class="far fa-user"></i> <span>Customers</span></a></li>

            <li><a class="nav-link" href="/transaksi"><i class="far fa-user"></i> <span>Transaksi</span></a></li>

            @endif
        </aside>
      </div>

      {{-- end sidebar --}}

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('judul')</h1>
          </div>
    
          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div> 
     

      {{-- end main content --}}

      {{-- footer --}}

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Suara Laundry</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

 
<!-- General JS Scripts -->
<script src="{{asset('/backend')}}/assets/modules/jquery.min.js"></script>
<script src="{{asset('/backend')}}/assets/modules/popper.js"></script>
<script src="{{asset('/backend')}}/assets/modules/tooltip.js"></script>
<script src="{{asset('/backend')}}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('/backend')}}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="{{asset('/backend')}}/assets/modules/moment.min.js"></script>
<script src="{{asset('/backend')}}/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<script src="{{asset('/backend')}}/assets/modules/izitoast/js/iziToast.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/backend')}}/assets/modules/datatables/datatables.min.js"></script>
<script src="{{asset('/backend')}}/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/backend')}}/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="{{asset('/backend')}}/assets/modules/jquery-ui/jquery-ui.min.js"></script>

<script src="{{asset('/backend')}}/assets/modules/summernote/summernote-bs4.js"></script>
<script src="{{asset('/backend')}}/assets/modules/select2/dist/js/select2.full.min.js"></script>

<script src="{{asset('/backend')}}/assets/modules/sweetalert/sweetalert.min.js"></script>

<script src="{{asset('/backend')}}/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Page Specific JS File -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('/backend')}}/assets/js/page/modules-datatables.js"></script>
<script src="{{asset('/backend')}}/assets/js/page/modules-sweetalert.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Template JS File -->
<script src="{{asset('/backend')}}/assets/js/scripts.js"></script>
<script src="{{asset('/backend')}}/assets/js/custom.js"></script>
<script src="{{asset('/backend')}}/assets/js/page/index.js"></script>
<script>
  @if(Session::has('success'))
  toastr.success("{{ Session::get('success') }}", "success")
  @elseif(Session::has('error'))
  toastr.error("{{ Session::get('error') }}", "Error")
  @endif
</script>
  @yield('script')
</body>
</html>