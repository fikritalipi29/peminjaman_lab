<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-3">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10">
							<h4 class="card-title">Tambah Akun Baru</h4>
						</div>
					</div>
				</div>
				<form action="<?= site_url('user/akun_new') ?>" method="POST">
					<div class="card-body">
						<div class="form-group">
							<label for="pengguna">Pengguna</label>
							<div class="input-group">
								<input type="hidden" class="form-control" id="id_biodata" name="id_biodata" placeholder="Nama Pengguna" required>
								<input type="text" class="form-control" id="pengguna" name="pengguna" placeholder="Nama Pengguna" readonly required>
								<div class="input-group-append">
									<button class="btn btn-primary" type="button">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
						</div>
                        <div class="form-group">
                            <label for="role">Pilih Hak Akses</label>
                            <select class="form-control" id="role" name="role" required>
                                <option>Pilih Program Studi</option>
                                <option value="1">Admin / Assisten Lab</option>
                                <option value="2">Kepala Laboratorium</option>
                                <option value="3">Mahasiswa / Peminjam</option>
                            </select>
                        </div>
					</div>
					<div class="card-footer justify-content-right">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
				<!-- /.card -->
			</div>
		</div>
		<div class="col-lg-9">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10">
							<h4 class="card-title">Akun Pengguna</h4>
						</div>
					</div>
				</div>
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 40%;">Username</th>
                                    <th style="width: 40%;">Nama Pengguna</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 40%;">Username</th>
                                    <th style="width: 40%;">Nama Pengguna</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
								<?php $no = 1; ?>
								<?php foreach ($akun as $v) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $v->username; ?></td>
                                    <td><?= $v->full_name; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/akun_reset_pass/'.$v->id_user) ?>">
											<button class="btn btn-warning btn-circle btn-sm" title="Reset Password">
												<i class="fas fa-key"></i>
											</button>
										</a>
                                        <a href="<?= base_url('user/akun_hapus/'.$v->id_user) ?>">
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