<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-cards menu-icon"></i>
                <span class="menu-title">Kategori</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.index') }}">Kategorileri
                            Görüntüle</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}">Kategori
                            Ekle</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.brands.index') }}">
                <i class="mdi mdi mdi-polymer menu-icon"></i>
                <span class="menu-title">Markalar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-tag-heart menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.index') }}">Ürünleri
                            Görüntüle </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.create') }}">Ürün
                            Ekle</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
