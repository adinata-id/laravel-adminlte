      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Adinata.id</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">

          <a href="{{ route ('home.index') }}" class="{{ (request()->segment(1) == '') ? 'nav-link active' : 'nav-link inactive' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-header">Contoh Demo</li>
          <li class="nav-item">
          <a href="{{ route ('product.index')}}" class="{{ (request()->segment(1) == 'product') ? 'nav-link active' : 'nav-link inactive' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Jquery Datatables
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route ('yajra.index')}}" class="{{ (request()->segment(1) == 'yajra') ? 'nav-link active' : 'nav-link inactive' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Yajra Datatables
                  <span class="badge badge-info right">New</span>
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->