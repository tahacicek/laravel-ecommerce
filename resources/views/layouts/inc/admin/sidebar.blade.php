<section style="width: 200px">
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu " style="">
          <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
        <span>Layout Options</span>
          <span class="label label-primary pull-right">4</span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="#"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Boxed</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Fixed</a></li>
          <li class=""><a href="#"><i class="fa fa-circle"></i> Collapsed Sidebar</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="{{ route('admin.brands.index') }}">
          <i class="mdi mdi mdi-polymer menu-icon"></i> <span>Markalar</span>
          <small class="label pull-right label-info">new</small>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="mdi mdi-cards menu-icon"></i>
        <span>Kategori</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu @if (request()->is('admin/category*')) menu-open @endif" @if (request()->is('admin/category*')) style="display: block;" @endif>

          <li class="@if(request()->is('admin/category')) active @endif"><a href="{{ route('admin.category.index') }}"><i class="fa fa-circle"></i> Kategori Görüntüle</a></li>
          <li class="@if(request()->is('admin/category/create')) active @endif"><a href="{{ route('admin.category.create') }}"><i class="fa fa-circle"></i> Kategori Ekle</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="mdi mdi-tag-heart menu-icon"></i>
        <span>Ürün</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu @if (request()->is('admin/product*')) menu-open @endif" @if (request()->is('admin/product*')) style="display: block;" @endif>
          <li class="@if(request()->is('admin/product')) active @endif"><a href="{{ route('admin.product.index') }}"><i class="fa fa-circle"></i>Ürünleri
            Görüntüle</a></li>
          <li class="@if(request()->is('admin/product/create')) active @endif"><a href="{{ route('admin.product.create') }}"><i class="fa fa-circle"></i>Ürün Ekle</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="mdi mdi-tag-heart menu-icon"></i>
        <span>Renk</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.color.index') }}"><i class="fa fa-circle"></i>Renkleri
            Görüntüle</a></li>
          <li><a href="{{ route('admin.color.create') }}"><i class="fa fa-circle"></i>Renk Ekle</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Forms</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> General Elements</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Ana Sayfa Slider</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route("admin.slider.index") }}"><i class="fa fa-circle-o"></i>Slider'lar</a></li>
          <li><a href="{{ route("admin.slider.create") }}"><i class="fa fa-circle-o"></i>Slider Oluştur</a></li>
        </ul>
      </li>
      <li>
        <a href="">
          <i class="fa fa-calendar"></i> <span>##2</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <small class="label pull-right label-warning">12</small>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Examples</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Invoice</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Profile</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Login</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Register</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> 404 Error</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> 500 Error</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Pace Page</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li>
            <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li>
                <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
  </section>
