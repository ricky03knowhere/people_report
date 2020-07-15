<div class="page-container2 pb-3">
    <!-- BREADCRUMB-->
    <section class="au-breadcrumb">
        <div class="section__content section__content--p50">
            <div class="container-fluid pt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb-content text-center">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span my-2"><b>You are here :</b></span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
 									<?= $nav; ?>
                                </ul>
                            </div>
                            <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                                <i class="zmdi zmdi-plus"></i>tambah petugas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    
    
    <div class="section__content section__content--p30 my-5">
           <div class="container-fluid">
    		 <div class="row justify-content-center list-items-center">
               <div class="col-md-3" >
               <aside class="profile-nav alt">
               <section class="card main">
               <div class="card-header user-header alt bg-dark">
               <div class="media py-4">
               <a href="#">
               <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="<?= $user['picture']; ?>" src="<?= base_url('assets/img/').$user['picture']; ?>">
               </a>
               <div class="media-body">
               <h3 class="text-light display-6"><?= $user['username']; ?></h3>
               <p class="level" ><?= $user['level']; ?></p>
               </div>
               </div>
               </div>                    
						


               <div class="card bg-warning cont mx-3 mt-3 mb-4 text-center pb-1" >
                                      <i class="fa fa-id-card-alt fa-3x text-white mt-3 mb-2" ></i><h5><?= $user['id_petugas']; ?></h5>
                                    </div>
     
               

    <div class="card bg-success cont mx-3 mb-4 text-center pb-1" >
                 	<i class="fab fa-whatsapp fa-3x text-white mt-3 mb-2" ></i><h5><?= $user['telp']; ?></h5>
          </div>


               


<div class="card bg-primary cont mx-3 mb-2 text-center pb-1" >
     	<i class="fa fa-user-alt fa-3x text-white mt-3 mb-2" ></i><h5><?= $user['nama_petugas']; ?></h5>
      </div>
               	
    
               </section>
               </aside>       
               </div>