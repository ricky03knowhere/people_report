<div class="col-md-5">

<div class="row my-0 user_msy actx">
                <div class="col-md-12">
                <div class="overview-item py-3 bg-dark"
                   	 onclick="window.location.href='<?= base_url('index.php/data_pengaduan/index/0/0/').$msy['nama']; ?>'">
                <div class="overview__inner">
                <div class="overview-box clearfix">
                <div class="icon ">
                <i class="fas fa-newspaper overview-item--c4"></i>
                </div>
                <div class="text">
                <h2 class="num overview-item--c4"><?= $pengaduan; ?></h2>
                <span class="overviw-item--c3" >Pengaduan</span>
                </div>
                </div>
                
                </div>
                </div>
                </div>
                <div class="col-md-12">
                <div class="overview-item bg-dark py-3"
                	 onclick="window.location.href='<?= base_url('index.php/data_pengaduan/index/0/terverifikasi/').$msy['nama']; ?>'">
                <div class="overview__inner">
                <div class="overview-box clearfix">
                <div class="icon">
                <i class="fas fa-check-circle overview-item--c3"></i>
                </div>
                <div class="text">
 <h2 class="num overview-item--c3"><?= $terverifikasi; ?></h2>
     <span>Terverifikasi</span>
                </div>
                </div>

                </div>
                </div>
                </div>
                <div class="col-md-12">
                <div class="overview-item bg-dark py-3"
                	 onclick="window.location.href='<?= base_url('index.php/data_tanggapan/index/0/').$msy['nama']; ?>'">
                <div class="overview__inner">
                <div class="overview-box clearfix">
                <div class="icon">
                <i class="fas fa-envelope-open-text overview-item--c2"></i>
                </div>
                <div class="text">
<h2 class="num overview-item--c2"><?= $ditanggapi; ?></h2>
    <span>Ditanggapi</span>
                </div>
                </div>
                
                </div>
                </div>
                </div>
                <div class="col-md-12">
                <div class="overview-item bg-info py-3"
                	 data-toggle="modal" data-target="#mediumModal">
                <div class="overview__inner">
      <div class="overview-box ver">
               <div class="icon">
               <i class="fa fa-file-signature"></i>
               </div>
               <div class="text">                  
               <h2>Tulis Pengaduan</h2>
               </div>
               </div>
                 
                
                </div>
                </div>
                </div>
							</div>


            		
    
       
</div>
</div>
</div>
</div>
</div>
            <!-- END BREADCRUMB-->
</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" data-show="true" >
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mediumModalLabel">Input Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

		
				<h3 class="text-center title-2 mt-2">Pengaduan</h3>

				<hr>
				<?= form_open_multipart('data_pengaduan/input'); ?>
				<form class="mt-5 mb-3">
				
				<?= $this ->session ->flashdata('error'); ?>
				<div class="row">
				<div class="col-6" >
				<div class="form-group">
				<label for="id_pengaduan" class="control-label mb-1">ID Pengaduan</label>
				<input class="form-control"  type="number" name="id_pengaduan" required><br>
				</div>
				</div>
				<div class="col-6" >
				<div class="form-group">
				<label for="tgl_pengaduan" class="control-label mb-1">Tanggal Pengaduan</label>
				<input class="form-control"  type="date" name="tgl_pengaduan" required><br>
				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-6" >
				<div class="form-group">
				<label for="nik" class="control-label mb-2">NIK</label>
				<input class="form-control" name="nik" required value="<?= $msy['nik']; ?>" ><br>
				</div>
				</div>
				<div class="col-6" >
				<div class="form-group">
				<label for="foto" class="control-label mb-1">Foto</label>						
				<input class="form-control" type="file" name="foto" id="foto" required><br>
				</div>
				</div>
				</div>
				<div class="form-group">
				<label for="isi_laporan" class="control-label">Laporan</label>						
				<textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="9" ></textarea></br>
				</div>		
				
				<input type="text" name="status" value="0" hidden="hidden" ><br>
				
				<div>
				<button id="insert-button" type="submit" class="btn btn-lg btn-info btn-block">
				<i class="fa fa-edit fa-lg mr-1"></i>&nbsp;
				<span id="payment-button-amount">Insert</span>
				<span id="payment-button-sending" style="display:none;">Sending…</span>
				</button>
				</div>
				</form>

			</div>
		</div>
	</div>
</div>