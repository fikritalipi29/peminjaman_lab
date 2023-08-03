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
							<h4 class="card-title">Edit Biodata User</h4>
						</div>
					</div>
				</div>
				<form action="<?= site_url('user/biodata_replace') ?>" method="POST">
					<div class="card-body">
						<div class="form-group">
							<label for="rfid">No. RFID</label>
							<input type="hidden" class="form-control" id="id_biodata" name="id_biodata" value="<?= $biodata->id_biodata; ?>" required>
							<input type="text" class="form-control" id="rfid" name="rfid" placeholder="Nomer Kartu RFID" value="<?= $biodata->no_card; ?>" readonly required>
						</div>
						<div class="form-group">
							<label for="full_name">Nama Lengkap</label>
							<input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nama Lengkap" value="<?= $biodata->full_name; ?>" required>
						</div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk" required>
                                <option>Jenis Kelamin</option>
                                <option value="1" <?php if($biodata->jk == "1"){echo "selected";} ?>>Laki - Laki</option>
                                <option value="2" <?php if($biodata->jk == "2"){echo "selected";} ?>>Perempuan</option>
                            </select>
                        </div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea class="form-control" id="alamat" name="alamat"><?= $biodata->address; ?></textarea>
						</div>
                        <div class="form-group">
                            <label for="id_prodi">Pilih Program Studi</label>
                            <select class="form-control" id="id_prodi" name="id_prodi" required>
                                <option>Pilih Program Studi</option>
                                <?php foreach ($prodi as $p) { ?>
                                    <option value="<?= $p->id_prodi ?>" <?php if($biodata->id_prodi == $p->id_prodi){echo "selected";} ?>><?= $p->prodi_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
					</div>
					<div class="card-footer justify-content-right">
						<button type="submit" class="btn btn-primary">Perbarui</button>
						<a href="<?= base_url('user/biodata'); ?>" class="btn btn-danger">Batalkan</a>
					</div>
				</form>
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