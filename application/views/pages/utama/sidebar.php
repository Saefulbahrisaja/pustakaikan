<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header ">Pencarian</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" id="keyword" name="keyword" placeholder="Masukan kata kunci..." aria-label="Masukan kata kunci..." aria-describedby="btn-search" />
                <button class="btn btn-primary" id="btn-search" type="button">Cari</button>
            </div>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Kategori</div>
        <div class="card-body">
            <div class="row">
                <div class='col-sm-6'>
                    <?= $menu ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->

    <div class="card mb-4">
        <div class="card-header">Supported </div>
        <div class="card-body">Available</div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Hits Stat </div>
        <div class="card-body">
            <table id="foot-table-list">
                <tr>

                    <td>Pengunjung Hari ini</td>

                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>

                    <td><?= $pengunjung_hari_ini ?> orang</td>

                </tr>

                <tr>

                    <td>Total Pengunjung</td>

                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>

                    <td><?= $total_pengunjung ?> orang</td>

                </tr>

                <tr>

                    <td>Pengunjung Online</td>

                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>

                    <td><?= $pengunjung_online ?> orang</td>

                </tr>

            </table>

        </div>
    </div>
</div>