<style type="text/css">
.login-content {
	border-radius:10px;
}
.au-btn,.au-input {
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
                        
                        <?= $this ->session ->flashdata('message'); ?>
                        
                        <div class="login-form ">
                            <form action="<?= base_url('index.php/auth'); ?>" method="post" >
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username" 
                                    	required <?= $this ->session ->flashdata('message_u'); ?>
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password"   									     
    								    required <?= $this ->session ->flashdata('message_p'); ?>
    								>
                                </div>
                                <button class="au-btn au-btn--block bg-dark m-b-20" type="submit">login</button>
                    
                            </form>
                            <div class="register-link">
                                <p class="text-dark" >
                                    Belum terdaftar?
                                    <a href="<?= base_url('index.php/auth/register'); ?>" class="text-white" >Daftar sekarang</a>
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