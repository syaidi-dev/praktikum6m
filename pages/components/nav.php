<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'dashboard' ? 'active' : '' ?>" aria-current="page" href="?page=dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'dosen' || $_GET['page'] == 'dosencreate' ? 'active' : '' ?>" href="?page=dosen">
                    <span data-feather="user"></span>
                    Dosen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'matakuliah' ? 'active' : '' ?>" href="?page=matakuliah">
                    <span data-feather="book"></span>
                    Mata Kuliah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['page'] == 'tugas' ? 'active' : '' ?>" href="?page=tugas">
                    <span data-feather="file"></span>
                    Tugas
                </a>
            </li>
        </ul>
    </div>
</nav>