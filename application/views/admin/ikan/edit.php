<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h1 class="h3 mb-3">Tambah Ikan</h1>

<div class="row">
	<div class="col-12">
		<?php if (!empty($errors)): ?>
			<div class="alert alert-danger">
				<?php foreach ($errors as $name => $error): ?>
					<p><?= $error ?></p>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="card">
			<div class="card-header">
				<form action="<?= site_url('admin/ikan/store') ?>" method="post" class="card-body" enctype="multipart/form-data">
					<div class="form-group" data-toggle="image-preview">
						<label class="font-weight-bold">Gambar Ikan</label>
						<input type="file" name="photo" class="d-none" data-source="true" accept="image/*">
						<img src="<?= base_url('assets/images/empty-image.png') ?>" role="button" class="d-block img-thumbnail" width="300" height="300" data-target="true">
					</div>
					<div class="form-group">
						<label>Nama Ikan</label>
						<input type="text" name="nama_ikan" class="form-control" value="<?= $data['nama_ikan'] ?>" required>
					</div>
					<div class="form-group">
						<label>Nama Ilmiah</label>
						<input type="text" name="nama_ilmiah" class="form-control" value="<?= $data['nama_ilmiah'] ?>" required>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="deskripsi"><?= $data['deskripsi'] ?></textarea>
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="kategori" data-toggle="select2" data-tags="true" data-placeholder="Kategori">
							<?php foreach ($kategoris as $kategori): ?>
								<option <?= $data['id_kategori'] == $kategori->kd_kategori ? 'selected' : '' ?>><?= $kategori->nm_kategori ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Ordo</label>
						<select class="form-control" name="ordo" data-toggle="select2" data-tags="true" data-placeholder="Ordo">
							<?php foreach ($ordos as $ordo): ?>
								<option <?= $data['id_ordo'] == $ordo->id_ordo ? 'selected' : '' ?>><?= $ordo->ordo ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Family</label>
						<select class="form-control" name="famili" data-toggle="select2" data-tags="true" data-placeholder="Family">
							<?php foreach ($families as $famili): ?>
								<option <?= $data['id_famili'] == $famili->id_famili ? 'selected' : '' ?>><?= $famili->famili ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Genus</label>
						<select class="form-control" name="genus" data-toggle="select2" data-tags="true" data-placeholder="Genus">
							<?php foreach ($genusses as $genus): ?>
								<option <?= $data['id_genus'] == $genus->id_genus ? 'selected' : '' ?>><?= $genus->genus ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Species</label>
						<select class="form-control" name="spesies" data-toggle="select2" data-tags="true" data-placeholder="Species">
							<?php foreach ($speciesses as $species): ?>
								<option <?= $data['id_spesies'] == $species->id_spesies ? 'selected' : '' ?>><?= $species->spesies ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Penyebaran dan Habitat</label>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Latitude</th>
									<th>Longitude</th>
									<th>Deskripsi</th>
								</tr>
							</thead>
							<tbody x-data="{ sebarans: <?= json_encode(isset($data['sebarans']) && !empty($data['sebarans']) ? $data['sebarans'] : [])  ?> }">
								<template x-for="(sebaran, i) in sebarans">
									<tr>
										<td>
											<input type="text" x-bind:name="`penyebaran[${i}][latitude]`" class="form-control" x-model="sebaran.latitude" required>
										</td>
										<td>
											<input type="text" x-bind:name="`penyebaran[${i}][longitude]`" class="form-control" x-model="sebaran.longitude" required>
										</td>
										<td>
											<input type="text" x-bind:name="`penyebaran[${i}][deskripsi_sebaran]`" class="form-control" x-model="sebaran.deskripsi" required>
										</td>
									</tr>
								</template>
								<tr>
									<td colspan="3" align="right">
										<button type="button" class="btn btn-sm btn-primary" x-on:click="sebarans.push({ latitude: '', longitude: '', deskripsi: ''})">
											<i class="fas fa-fw fa-plus"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="form-group">
						<div class="d-flex justify-content-end">
							<button class="btn btn-success">
								<i class="fas fa-fw fa-save"></i>
								Simpan
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>