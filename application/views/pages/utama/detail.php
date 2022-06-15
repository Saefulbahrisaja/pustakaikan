<style>
    div {
        text-align: justify;
        text-justify: inter-word;
    }
</style>
<!-- Blog entries-->
<div class="col-lg-8" id="view">
    <!-- Featured blog post-->
    <?php foreach ($detail as $row) : ?>
        <div class="card mb-4">
            <a href="#!"><img class="card-img-top" src="<?php echo $row->photo; ?>" alt="..." /></a>
            <div class="card-body">
                <div class="small text-muted"><?= $row->nm_kategori ?></div>
                <h2 class="card-title"><?php echo $row->nama_ikan; ?> (<?php echo $row->nama_ilmiah; ?>)</h2>
                <p class="card-text"><?php echo $row->deskripsi; ?></p>
                <p class="card-text">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" colspan="2">Klasifikasi Ilmiah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Ordo</th>
                            <td><?php echo $row->ordo; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Famili</th>
                            <td><?php echo $row->famili; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Genus</th>
                            <td><?php echo $row->genus; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Spesies</th>
                            <td><?php echo $row->spesies; ?></td>
                        </tr>
                    </tbody>
                </table>
                </p>
                <h2 class="card-title"> Penyebaran dan Habitat</h2>
                <p class="card-text">
                <div id="mapid" style="height: 450px;"></div>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>