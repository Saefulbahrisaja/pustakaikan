<!-- Blog entries-->
<div class="col-lg-8" id="view">
    <!-- Featured blog post-->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title"><?php echo $title; ?></h2>
            <p class="card-text">Data berdasar kategori</p>
        </div>
    </div>
    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        <?php foreach ($detail as $row) : ?>
            <div class="col-lg-6">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="<?php echo $row->photo; ?>" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted"><?php echo $row->nm_kategori; ?></div>
                        <h2 class="card-title h4"><?php echo $row->nama_ikan; ?> (<?php echo $row->nama_ilmiah; ?>)</h2>
                        <p class="card-text"><?php echo substr($row->deskripsi, 0, 150); ?>.</p>
                        <a class="btn btn-primary" href="<?= site_url('utama/detail/' . encrypt_url($row->kd_ikan)) ?>">Selengkapnya →</a>
                    </div>
                </div>
                <!-- Blog post-->

            </div>

        <?php endforeach ?>

    </div>
    <!-- Pagination-->
    <!-- <nav aria-label="Pagination">
        <hr class="my-0" />
        <?php //echo $this->pagination->create_links(); 
        ?>
    </nav> -->
</div>