<style>
    #dataTable tbody tr.selected {
        background-color: #b0d4ff;
    }
</style>

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
                                    <th style="width: 20%;">Username</th>
                                    <th style="width: 30%;">Nama Pengguna</th>
                                    <th style="width: 30%;">Hak Akses</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $no = 1; ?>
								<?php foreach ($akun as $v) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $v->username; ?></td>
                                    <td><?= $v->full_name; ?></td>
                                    <td>
										<?php if ($v->role == '1') : ?>
											Admin / Asisten Laboratorium
										<?php elseif ($v->role == '2') : ?>
											Kepala Laboratorium
										<?php elseif ($v->role == '3') : ?>
											Peminjam
										<?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('user/akun_reset_pass/'.$v->id_user) ?>">
											<button class="btn btn-warning btn-circle btn-sm" title="Reset Password">
												<i class="fas fa-key"></i>
											</button>
										</a>
                                        <a href="<?= base_url('user/akun_hapus/'.$v->id_user) ?>">
											<button class="btn btn-danger btn-circle btn-sm" title="Hapus Pengguna">
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

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Pilih Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 15%;">No. RFID</th>
                                    <th style="width: 15%;">Nama Lengkap</th>
                                    <th style="width: 20%;">Alamat</th>
                                    <th style="width: 10%;">Jenis Kelamin</th>
                                    <th style="width: 20%;">Program Studi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $no = 1; ?>
								<?php foreach ($biodata as $v) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $v->no_card; ?></td>
                                    <td><?= $v->full_name; ?></td>
                                    <td><?= $v->address; ?></td>
                                    <td><?php if($v->jk == "1"){echo "Laki - Laki"; }else{echo "Perempuan"; }; ?></td>
                                    <td><?= $v->prodi_name; ?></td>
                                </tr>
								<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="selectUser">Pilih</button>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?= base_url('public/') ?>plugins/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        // Tampilkan modal saat tombol Search ditekan
        $('button[type="button"]').click(function () {
            $('#searchModal').modal('show');
        });

		// Tangani pemilihan pengguna dari modal
        $('#selectUser').click(function () {
            // Ambil data pengguna yang dipilih dari baris tabel
            var selectedRow = $('#dataTable tbody').find('tr.selected');
			console.log(selectedRow);
            var userId = selectedRow.find('td:eq(1)').text(); // Ambil nilai No. RFID
            var userName = selectedRow.find('td:eq(2)').text(); // Ambil nilai Nama Lengkap
			console.log(userId, userName);

            // Masukkan nilai pengguna ke input pengguna dan id_biodata
            $('#id_biodata').val(userId);
            $('#pengguna').val(userName);

            // Sembunyikan modal
            $('#searchModal').modal('hide');
        });

        // Tandai baris yang dipilih saat di-klik pada tabel
        $('#dataTable tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                $('#dataTable tbody tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });
</script>


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