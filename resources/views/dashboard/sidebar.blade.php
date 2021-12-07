           
            <div class="main-sidebar sidebar-style-2">  
              <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                  <a>ADMIN</a>
                </div>
                <ul class="sidebar-menu">
                  
                  <li><a class="nav-link" href="{{url('home')}}"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
                  
                  <li><a class="nav-link" href="{{url('admin\penjualan\kategori')}}"><i class="fas fa-bookmark"></i> <span>Kategori Produk</span></a></li>
                  <li><a class="nav-link" href="{{url('admin\penjualan\produk')}}"><i class="fas fa-archive"></i> <span>Produk</span></a></li>
                  
                  <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-truck"></i> <span>Pemasok</span></a>
                    <ul class="dropdown-menu">
                      <li><a class="nav-link" href="{{url('admin\pemasok\datapemasok')}}">Data Pemasok</a></li>
                      <li><a class="nav-link" href="{{url('admin\pemasok\produkpemasok\create')}}">Produk Masuk</a></li>
                      <li><a class="nav-link" href="{{url('admin\pemasok\produkpemasok\laporanpemasok')}}">Cetak Pemasok</a></li>
                    </ul>
                  </li>
                  <li><a class="nav-link" href="{{url('admin\pemasok\produkpemasok\laporanpemasok')}}"><i class="fas fa-file-pdf"></i> <span>Laporan Pemasok</span></a></li>
                
                  <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Konsumen</span></a>
                    <ul class="dropdown-menu">
                      <li><a class="nav-link" href="{{url('admin\konsumen')}}">Data Konsumen</a></li>
                      <li><a class="nav-link" href="{{url('admin\laporankonsumen')}}">Cetak Konsumen</a></li>
                    </ul>
                  </li>

                  <li><a class="nav-link" href="blank.html"><i class="fas fa-balance-scale"></i> <span>Keuntungan</span></a></li>
                  
                  <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i> <span>Pengaturan</span></a>
                    <ul class="dropdown-menu">
                      <li><a class="nav-link" href="{{url('akunadmin')}}">Akun Admin</a></li>
                      <li><a class="nav-link" href="{{url('namatoko')}}">Toko</a></li>
                    </ul>
                  </li>
                  
                  
              </aside>
            </div>