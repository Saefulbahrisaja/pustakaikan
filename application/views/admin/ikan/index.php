<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php if ($this->session->has_userdata('status')): ?>
	<div class="alert alert-info">
		<?= $this->session->userdata('status') ?>
	</div>
<?php endif ?>

<h1 class="h3 mb-3">Data Ikan</h1>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">
					<a href="<?= site_url('admin/ikan/store') ?>" class="btn btn-success btn-sm">Tambah Data</a>
				</h5>
			</div>
			<div class="card-body">
				<table id="table" class="table table-striped table-bordered table-sm w-100">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Nama Ikan</th>
							<th>Taksonomi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
						foreach ($data as $row) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td>
									<img src="<?= $row->photo ?>" alt="..." width="150px" />
									<br>
									<?= $row->nama_ikan ?> (<i><?= $row->nama_ilmiah ?></i>)
									<br>
									<?= $row->nm_kategori ?>
								</td>
								<td>
									<table style="width:100%" >
										<tr>
											<th>Ordo</th>
											<th>:</th>
											<th><?= $row->ordo ?></th>
										</tr>
										<tr>
											<td>Famili</td>
											<td>:</td>
											<td><?= $row->famili ?></td>
										</tr>
										<tr>
											<td>Genus</td>
											<td>:</td>
											<td><?= $row->genus ?></td>
										</tr>
										<tr>
											<td>Spesies</td>
											<td>:</td>
											<td><?= $row->spesies ?></td>
										</tr>
									</table>
								</td>
								<td>
									<button class="btn btn-sm btn-warning">Edit</button>
									<a onclick="return confirm('Yakin ingin dihapus?')" href="<?= site_url('admin/ikan/destroy/' . $row->kd_ikan) ?>" class="btn btn-sm btn-danger">Hapus</a>
									<button class="btn btn-sm btn-success">Detail</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>