<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h4>Hasil Pencarian dari : <?= xss_clean($keyword) ?></h4>
<!-- Nested row for non-featured blog posts-->
<div class="row no-gutters">
    <?php foreach ($data as $row) : ?>
        <div class="col-lg-6">
            <!-- Blog post-->
            <div class="card mb-4 h-100">
                <a href="#!"><img class="card-img-top" src="<?php echo $row->photo; ?>" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted"><?php echo $row->nm_kategori; ?></div>
                    <h2 class="card-title h4"><?php echo $row->nama_ikan; ?> <i>(<?php echo $row->nama_ilmiah; ?>)</i></h2>
                    <p class="card-text"><?php echo substr($row->deskripsi, 0, 150); ?> ...</p>
                    <a class="btn btn-primary" href="<?php echo base_url() . 'utama/detail'; ?>/<?php echo encrypt_url($row->kd_ikan); ?>">Selengkapnya →</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>