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
							<h4 class="card-title">Ajukan Peminjaman Baru</h4>
						</div>
					</div>
				</div>
				<form action="<?= site_url('peminjaman/new') ?>" method="POST">
					<div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="id_prodi">Pilih Program Studi</label>
                                    <select class="form-control" id="id_prodi" name="id_prodi" required>
                                        <option>Pilih Program Studi</option>
                                        <?php foreach ($prodi as $p) { ?>
                                            <option value="<?= $p->id_prodi ?>"><?= $p->prodi_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="id_lab">Pilih Laboratorium</label>
                                    <select class="form-control" id="id_lab" name="id_lab" required>
                                        <option>Pilih Laboratorium</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal dan Jam Peminjaman</label>
                            <input type="datetime-local" class="form-control" id="tgl" name="tgl" required>
                        </div>
					</div>
					<div class="card-footer justify-content-right">
                        <div class="row">
                            <div class="col-lg-10"></div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary ml-5" style="width: 150px;">Pinjam <sup>Yuk</sup></button>
                            </div>
                        </div>
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

<script>
    $('#id_prodi').change(function() {
        var id_prodi = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('peminjaman/lab') ?>",
            data: {
                id_prodi: id_prodi
            },
            dataType: "json",
            success: function(response) {
                var options = '<option value="">Pilih Laboratorium</option>';
                $.each(response, function(key, value) {
                    console.log(value);
                    options += '<option value="' + value['id_laboratorium'] + '">' + value['lab_name'] + '</option>';
                });
                $('#id_lab').html(options);
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