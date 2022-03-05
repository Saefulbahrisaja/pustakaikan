<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Dashboard</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Master
            </li>
            <?php
            $sidebar_menu = [
                [
                    'href' => 'admin/home',
                    'text' => 'Dashboard',
                    'feather' => 'sliders',
                ],
                [
                    'href' => 'admin/ikan',
                    'text' => 'Kelola Ikan',
                    'feather' => 'book',
                ],
                [
                    'href' => 'admin/profile',
                    'text' => 'Profile',
                    'feather' => 'user',
                ],
                [
                    'href' => 'admin/auth/logout',
                    'text' => 'Logout',
                    'feather' => 'user-plus',
                ],
            ];
            ?>

            <?php foreach ($sidebar_menu as $sidebar): ?>
                <li class="sidebar-item <?= uri_string() == $sidebar['href'] ? 'active' : '' ?>">
                    <a class="sidebar-link" href="<?= site_url($sidebar['href']) ?>">
                        <i class="align-middle" data-feather="<?= $sidebar['feather'] ?>"></i>
                        <span class="align-middle"><?= $sidebar['text'] ?></span>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</nav>