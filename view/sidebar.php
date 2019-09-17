<?php 
session_start();
if (!isset($_SESSION['login'])){
    header('Location:login.php');
}
?>
<style>
  .disabled {
    pointer-events:none; 
    opacity:0.6;         
}
</style>
<body id="page-top">
  <?php 
      $valor = isset($_SESSION['login']) ? '' : 'disabled';
  ?> 
  <!-- Page Wrapper -->
  <div id="wrapper" style="position: absolute; width: 100%">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion " style="background-color:#292b2c"  id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="far fa-file-image"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Projeto Banner</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Banners
      </div>

  

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item " style="position: relative;">
        <a class="nav-link collapsed"  href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-images"></i>
          <span >Cadastrar</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Utilidades:</h6>
            <a class="collapse-item" href="addCategoriaBanner.php">Banners</a>
            <a class="collapse-item" href="addImagemBanner.php">Inserir imagem</a> 
          </div>
        </div>
      </li>
        <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item ">
        <a class="nav-link" href="listarBanner.php">
          <i class="far fa-eye"></i>
          <span>Visualizar</span></a>
      </li>


     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"style="background-color:#292b2c">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <?php 
      $valor = isset($_SESSION['login']) ? $_SESSION['login'] : 'Admin';
    ?>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $valor ?></span>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php 
                    if($valor == 'Admin'){ ?>
                       <a class="dropdown-item" href="../view/login.php">
                         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>    
                            Logar                
                       </a>
                <?php }else{ ?>
                  
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Sair
                    </a>
               <?php } ?>           
              </div>
            </li>

          </ul>

        </nav>