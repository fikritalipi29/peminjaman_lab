<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10">
							<h4 class="card-title">Riwayat Peminjaman</h4>
						</div>
					</div>
				</div>
				<div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 15%;">Laboratorium</th>
                                    <th style="width: 15%;">Nama Peminjaman</th>
                                    <th style="width: 20%;">Tanggal Peminjaman</th>
                                    <th style="width: 10%;">Waktu Mulai Peminjaman</th>
                                    <th style="width: 20%;">Waktu Selesai Peminjaman</th>
                                    <th style="width: 10%;">Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 15%;">Laboratorium</th>
                                    <th style="width: 15%;">Nama Peminjaman</th>
                                    <th style="width: 20%;">Tanggal Peminjaman</th>
                                    <th style="width: 10%;">Waktu Mulai Peminjaman</th>
                                    <th style="width: 20%;">Waktu Selesai Peminjaman</th>
                                    <th style="width: 10%;">Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
								<?php $no = 1; ?>
								<?php foreach ($riwayat as $v) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $v->lab_name; ?></td>
                                    <td><?= $v->full_name; ?></td>
                                    <td><?= date('d-m-Y', strtotime($v->start_time)) ?></td>
                                    <td><?= date('H:i', strtotime($v->start_time)) ?></td>
                                    <td><?= date('H:i', strtotime($v->end_time)) ?></td>
                                    <td>
										<?php if ($v->status == '1') : ?>
											Tahap Verifikasi
										<?php elseif ($v->status == '2') : ?>
											<font color="green">Terverifikasi</font>
										<?php elseif ($v->status == '3') : ?>
											<font color="red">Ditolak</font>
										<?php endif; ?>
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