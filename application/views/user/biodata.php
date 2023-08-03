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
							<h4 class="card-title">Biodata User</h4>
						</div>
						<div class="col-lg-2">
							<a href="<?= base_url('user/biodata_new') ?>" class="btn btn-primary btn-icon-split">
                        	    <span class="icon text-white-50">
                        	        <i class="fas fa-plus"></i>
                        	    </span>
                        	    <span class="text">New Biodata User</span>
                        	</a>
						</div>
					</div>
				</div>
				<div class="card-body">
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
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="width: 15%;">No. RFID</th>
                                    <th style="width: 15%;">Nama Lengkap</th>
                                    <th style="width: 20%;">Alamat</th>
                                    <th style="width: 10%;">Jenis Kelamin</th>
                                    <th style="width: 20%;">Program Studi</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </tfoot>
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
                                    <td>
                                        <a href="<?= base_url('user/biodata_edit/'.$v->id_biodata) ?>">
											<button class="btn btn-success btn-circle btn-sm" title="Hapus Prodi">
												<i class="fas fa-pen"></i>
											</button>
										</a>
                                        <a href="<?= base_url('user/biodata_hapus/'.$v->id_biodata) ?>">
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