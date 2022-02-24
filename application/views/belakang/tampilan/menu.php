<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Dashboard</span>
                </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Master
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="<?php echo base_url() . 'admin/tentangkami'; ?>">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo base_url() . 'admin/input'; ?>">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Ikan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo base_url() . 'admin/profil'; ?>">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo base_url() . 'admin/logout'; ?>">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Logout</span>
                        </a>
                    </li>



                </ul>
            </div>
        </nav>