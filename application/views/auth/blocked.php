<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?= $title; ?></title>
 <link href="<?= base_url('assets/vendor/cooladmin//css/sb-admin-2.min.css'); ?>" rel="stylesheet" media="all">
</head>
<body>
<div class="text-center mt-5">
  <div class="error mx-auto" data-text="404">403</div>
  <p class="lead text-gray-800 mb-5">Akses Dilarang</p>
  <p class="text-gray-500 mb-0">Maaf <b><?= $user['nama_petugas']; ?></b>, Anda seorang <span style="text-transform: capitalize" ><b><?= $user['level']; ?></b></span><br>
  Anda tidak dapat mengakses halaman ini.</p>
<a href="<?= base_url('index.php/'.$user['level']); ?>" >&larr; kembali ke Dashboard</a>
</div>
</body>
</html>