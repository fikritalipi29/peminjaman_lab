<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10">
							<h4 class="card-title">Tambah Laboratorium</h4>
						</div>
					</div>
				</div>
				<form action="<?= site_url('master/laboratorium_new') ?>" method="POST">
					<div class="card-body">
                        <div class="form-group">
                            <label for="id_prodi">Pilih Program Studi</label>
                            <select class="form-control" id="id_prodi" name="id_prodi" required>
                                <option>Pilih Program Studi</option>
                                <?php foreach ($prodi as $p) { ?>
                                    <option value="<?= $p->id_prodi ?>"><?= $p->prodi_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
						<div class="form-group">
							<label for="lab">Nama Laboratorium</label>
							<input type="text" class="form-control" id="lab" name="lab" placeholder="Nama Laboratorium" required>
						</div>
						<div class="form-group">
							<label for="kapasitas">Kapasitas Laboratorium</label>
							<input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas Laboratorium" required>
						</div>
					</div>
					<div class="card-footer justify-content-right">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
				<!-- /.card -->
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10">
							<h4 class="card-title">Laboratorium</h4>
						</div>
					</div>
				</div>
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 40%;">Program Studi</th>
                                    <th style="width: 40%;">Nama Laboratorium</th>
                                    <th style="width: 10%;">Kapasitas</th>
                                    <th style="width: 5%;">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 40%;">Program Studi</th>
                                    <th style="width: 40%;">Nama Laboratorium</th>
                                    <th style="width: 10%;">Kapasitas</th>
                                    <th style="width: 5%;">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
								<?php $no = 1; ?>
								<?php foreach ($lab as $v) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $v->prodi_name; ?></td>
                                    <td><?= $v->lab_name; ?></td>
                                    <td><?= $v->capacity; ?></td>
                                    <td>
                                        <a href="<?= base_url('master/laboratorium_hapus/'.$v->id_laboratorium) ?>">
											<button class="btn btn-danger btn-circle btn-sm" title="Hapus Prodi">
												<i class="fas fa-trash"></i>
											</button>
										</a>
                                    </td>
                                </tr>
								<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
				</div>
				<!-- /.card -->
			</div>
		</div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- jQuery -->
<script src="<?= base_url('public/') ?>plugins/jquery/jquery.min.js"></script>

<?php if ($this->session->flashdata('error')) { ?>
	<script>
		$(function() {
			var Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			});

			toastr.error('<?php echo $this->session->flashdata('error'); ?>')
		});
	</script>
<?php } else if ($this->session->flashdata('success')) { ?>
	<script>
		$(function() {
			var Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			});

			toastr.success('<?php echo $this->session->flashdata('success'); ?>')
		});
	</script>
<?php } ?>