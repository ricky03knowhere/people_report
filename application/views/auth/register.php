<style type="text/css">
.fa-file-signature  {
	transform:rotate(-15deg) scale(1.3);
}
.login-content {
	border-radius:10px;
}
.btn,.form-control  {
	border-radius:7px;
}

</style>
<body class="animsition2">

    <div class="page-wrapper ">
        <div class="page-content--bge5">
            <div class="container ">
            
                <div class="login-wrap">
                <div class="row justify-content-center" >
    
                <div class="col-md-8" >
                    <div class="login-content overview-item--c2">
                        <div class="login-logo">
                            <a href="#">
                          		<h4 class="text-dark" ><i class="fas fa-file-signature ml-1 mr-2" ></i>PeopleReport</h4>
                            </a>
                        </div>
                        
             
                        
                        <div class="login-form ">
                      <?= form_open_multipart('auth/regist'); ?>
                      
                      
                      <?= $this ->session ->flashdata('error'); ?>
                      
                      <div class="row mt-5">
                      <div class="col-6" >
                      <div class="form-group">
                      <label for="id_petugas" class="control-label">ID Petugas</label>
                      <input class="form-control"  type="number" name="id_petugas" required><br>
                      </div>
                      </div>
                      <div class="col-6" >
                      <div class="form-group">
                      <label for="nama_petugas" class="control-label">Nama Petugas</label>
                      <input class="form-control"  type="text" name="nama_petugas" required><br>
                      </div>
                      </div>
                      </div>
                      
                      <div class="row" >
                      <div class="col-6" >
                      <div class="form-group">
                      <label for="username" class="control-label mb-1">Username</label>
                      <input class="form-control" name="username" id="username" required>
                      </div>
                      </div>
                      
                      <div class="col-6" >
                      <div class="form-group">
                      <label for="password" class="control-label mb-1">Password</label>						
                      <input class="form-control" type="password"  name="password" id="password" required>
                      </div>
                      </div>
                      </div>
                      
                      <div class="row">
                      <div class="col-6" >
                      <div class="form-group">
                      <label for="telp" class="control-label mb-1">Telephone</label>						
                      <input class="form-control" type="number" name="telp" id="telp" required>
                      </div>
                      </div>
                      <div class="col-6">
                      <div class="form-group">
                      <label for="level" class="control-label mb-1">Level</label>
                      <select class="form-control" name="level" id="level">
                      <option value="admin" >Admin</option>
                      <option value="petugas" >Petugas</option>
                      <option value="masyarakat" >Masyarakat</option>
                      </select>
                      </div>
                      </div>
                      
                      </div>
                      
                      <div class="form-group">
                      <label for="foto" class="control-label mb-1">Foto</label>						
                      <input class="form-control" type="file" name="picture" id="foto" required><br>
                      </div>				
                      
                      <div>
                      <button id="insert-button" type="submit" class="btn btn-lg btn-dark btn-block">    
                      <span>Daftar</span>
                      <span id="payment-button-sending" style="display:none;">Sending…</span>
                      </button>
                      </div>
                      </form>
                            <div class="register-link">
                                <p class="text-dark" >
                                    Sudah terdaftar?
                                    <a href="<?= base_url('index.php/auth/'); ?>" class="text-white" >Login disini</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>