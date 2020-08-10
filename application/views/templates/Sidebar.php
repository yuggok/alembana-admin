 <!-- Sidebar -->
 <ul class="navbar-nav sidebar sidebar-dark" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-coffee"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Alembana - Admin</div>
     </a>

     <!-- Divider -->

     <!-- Heading -->
     <div class="sidebar-heading">
         Administrator
     </div>
     <hr class="sidebar-divider">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('Admin') ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Master Data Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa fa-fw fa-database"></i>
             <span>Master Data</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Master Data:</h6>
                 <a class="collapse-item" href="<?= base_url('Table') ?>">Data Meja</a>
                 <a class="collapse-item" href="<?= base_url('Food') ?>">Data Makanan</a>
                 <a class="collapse-item" href="<?= base_url('Drinks') ?>">Data Minuman</a>
             </div>
         </div>
     </li>


     <!-- Nav Item - Order Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fa fa-fw fa-shopping-basket"></i>
             <span>Data Order</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('Order') ?>">Konfirmasi Order</a>
                 <a class="collapse-item" href="<?= base_url('Pelanggan') ?>">Konfirmasi Pelanggan</a>
             </div>
         </div>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">
     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtil" aria-expanded="true" aria-controls="collapseUtil">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Konten</span>
         </a>
         <div id="collapseUtil" class="collapse" aria-labelledby="headingUtil" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('Event') ?>">Event</a>
                 <a class="collapse-item" href="<?= base_url('Popfood') ?>">Makanan Populer</a>
                 <a class="collapse-item" href="<?= base_url('Popdrink') ?>">Minuman Populer</a>
             </div>
         </div>
     </li>

     <hr class="sidebar-divider">
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('User') ?>">
             <i class="fas fa-fw fa-cog"></i>
             <span>Konfigurasi User</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->