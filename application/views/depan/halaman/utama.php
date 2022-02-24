<!-- Blog entries-->
<div class="col-lg-8">
    <!-- Featured blog post-->
    <?php foreach ($top as $row) : ?>
        <div class="card mb-4">
            <a href="#!"><img class="card-img-top" src="<?php echo $row->photo; ?>" alt="..." /></a>
            <div class="card-body">
                <div class="small text-muted"><?php echo $row->nm_kategori; ?></div>
                <h2 class="card-title"><?php echo $row->nama_ikan; ?> <i>(<?php echo $row->nama_ilmiah; ?>)</i></h2>
                <p class="card-text"><?php echo substr($row->deskripsi, 0, 250); ?> ...</p>
                <a class="btn btn-primary" href="<?php echo base_url() . 'Utama/detail'; ?>/<?php echo encrypt_url($row->kd_ikan); ?>">Selengkapnya →</a>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        <?php foreach ($data as $row) : ?>
            <div class="col-lg-6">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="<?php echo $row->photo; ?>" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted"><?php echo $row->nm_kategori; ?></div>
                        <h2 class="card-title h4"><?php echo $row->nama_ikan; ?> <i>(<?php echo $row->nama_ilmiah; ?>)</i></h2>
                        <p class="card-text"><?php echo substr($row->deskripsi, 0, 150); ?> ...</p>
                        <a class="btn btn-primary" href="<?php echo base_url() . 'Utama/detail'; ?>/<?php echo encrypt_url($row->kd_ikan); ?>">Selengkapnya →</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Pagination-->
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <?php echo $this->pagination->create_links(); ?>
    </nav>
</div>