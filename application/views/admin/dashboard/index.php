<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

<div class="row">
	<div class="col-xl-6 col-xxl-5 d-flex">
		<div class="w-100">
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Spesies</h5>
								</div>
								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="truck"></i>
									</div>
								</div>
							</div>
							<h1 class="mt-1 mb-3">2.382</h1>
							<div class="mb-0">
								
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Ordo</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="users"></i>
									</div>
								</div>
							</div>
							<h1 class="mt-1 mb-3">14.212</h1>
							<div class="mb-0">
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Genus</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="dollar-sign"></i>
									</div>
								</div>
							</div>
							<h1 class="mt-1 mb-3">21.300</h1>
							<div class="mb-0">
								
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Famili</h5>
								</div>
								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="shopping-cart"></i>
									</div>
								</div>
							</div>
							<h1 class="mt-1 mb-3">64</h1>
							<div class="mb-0">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-6 col-xxl-7">
		<div class="card flex-fill w-100">
			<div class="card-header">
				<h5 class="card-title mb-0">Grafik Kunjungan</h5>
			</div>
			<div class="card-body py-3">
				<div class="chart chart-sm">
					<canvas id="chartjs-dashboard-line"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
		<div class="card flex-fill w-100">
			<div class="card-header">

				<h5 class="card-title mb-0">Peta Sebaran</h5>
			</div>
			<div class="card-body px-4">
				<div id="world_map" style="height:350px;"></div>
			</div>
		</div>
	</div>	
</div>