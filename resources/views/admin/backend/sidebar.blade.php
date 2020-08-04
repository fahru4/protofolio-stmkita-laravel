<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/gambar/user.png')}}" class="img-circle" alt="User Image">
        </div>

        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/admin/index">
          <i class="fa fa-home"></i>
          <span>DASHBOARD</span></a>
        </li>
        <li><a href="/admin/siswa">
          <i class="fa fa-list"></i> 
          <span>SISWA</span></a>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa  fa-briefcase"></i>
          <span>KELAS-MAPEL</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/kelas"><i class="fa  fa-file"></i>
            <span>Kelas</span>
            </li>
            </a>
            <li><a href="/admin/mapel"><i class="fa fa-pencil-square"></i>
            <span>Mapel</span>
            </li>
            </a>
          </ul>
        </li>
        <li><a href="/admin/media">
          <i class="fa fa-list"></i> 
          <span>MEDIA</span></a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>