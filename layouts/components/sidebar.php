<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-dark navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="#">
      <img src="https://avatars.githubusercontent.com/u/161788164?s=200&v=4" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-light">HIMATIF</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav menu-active">
      <li class="nav-item">
        <a class="nav-link <?= ($menu == "dashboard") ? "active" : ""; ?>" href="admin.php?menu=dashboard">
          <i class="bi bi-house-door text-light"></i><span class="nav-link-text ms-1 text-light">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($menu == "table") ? "active" : ""; ?>" href="admin.php?menu=table">
          <i class="bi bi-table text-light"></i><span class="nav-link-text ms-1 text-light">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " <?= ($menu == "prosess") ? "active" : ""; ?> href="admin.php?menu=prosess">
          <i class="bi bi-credit-card text-light"></i><span class="nav-link-text ms-1 text-light">update...</span>
        </a>
      </li>
    </ul>
  </div>
</aside>