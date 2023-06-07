<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
$result = mysqli_query($connection, "SELECT * FROM produk");
?>



<section class="section">
  <div class="section-header d-flex justify-content-between">
  <h1>Dashboard</h1>
  <a href="./createProduk.php" class="btn btn-primary">Tambah Data</a>
  </div>

<div class="row gx-5">
    <?php
    while ($data = mysqli_fetch_array($result)) :
    ?>
    <div class="col-3">
        <div class="card">
        
        <?php echo "<img src='gambar/$data[foto]' width=237 height=240/>";?>

        <div class="card-body">
            <h5 class="card-title"><?= $data['namaBarang'] ?></h5>
            <h6 class="card-title"><?= $data['harga'] ?></h6>
            <p class="card-text"><?= $data['deskripsi'] ?></p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            <a class="btn btn-sm btn-info" href="edit.php?id=<?= $data['id'] ?>">
            <i class="fas fa-edit fa-fw"></i>
            </a>
            <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="deleteProduk.php?id=<?= $data['id'] ?>">
            <i class="fas fa-trash fa-fw"></i>
            </a>
        </div>
    </div>
    </div>
    <?php
    endwhile;
    ?>
</div>

</section>
<?php
require_once '../layout/_bottom.php';
?>



<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>
