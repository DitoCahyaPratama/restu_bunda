<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Restu Bunda Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <div class="sidebar-heading">
        Interface
      </div>

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->
    @role('admin')

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
        <i class="fas fa-fw fa-tags"></i>
        <span>Kategori</span>
      </a>
      <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Kategori:</h6>
          <a class="collapse-item" href="/category/create">Tambah Kategori</a>
          <a class="collapse-item" href="/category">List Kategori</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupplier" aria-expanded="true" aria-controls="collapseSupplier">
        <i class="fas fa-fw fa-truck"></i>
        <span>Pemasok</span>
      </a>
      <div id="collapseSupplier" class="collapse" aria-labelledby="headingSupplier" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pemasok:</h6>
          <a class="collapse-item" href="/supply/create">Tambah Pemasok</a>
          <a class="collapse-item" href="/supply">List Pemasok</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Produk</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Produk:</h6>
          <a class="collapse-item" href="/product/create">Tambah Produk</a>
          <a class="collapse-item" href="/product">List Produk</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pembelian</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Pembelian:</h6>
          <a class="collapse-item" href="/purchase/create">Tambah Pembelian</a>
          <a class="collapse-item" href="/purchase">List Pembelian</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog"></i>
        <span>Dana</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Gaji:</h6>
          <a class="collapse-item" href="/gaji/create">Tambah Gaji</a>
          <a class="collapse-item" href="/gaji">List Gaji</a>
          <h6 class="collapse-header">Upah:</h6>
          <a class="collapse-item" href="/upah/create">Tambah Upah</a>
          <a class="collapse-item" href="/upah">List Upah</a>
          <h6 class="collapse-header">THR:</h6>
          <a class="collapse-item" href="/thr/create">Tambah THR</a>
          <a class="collapse-item" href="/thr">List THR</a>
        </div>
      </div>
    </li>

    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>