<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Tables</title>

        <!-- Custom fonts for this template -->
        <link
            href="vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"/>
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <a href="masyarakat.php" class="btn btn-primary btn-lg text-light mb-3">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Kembali</a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>Tanggal</th>
                                <th>NIK</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>

                            <?php
                  require 'koneksi.php';
                  $sql=mysqli_query($conn,"select * from pengaduan where nik='$_SESSION[nik]'");
                  while ($data=mysqli_fetch_array($sql)) {
                      
                 ?>

                            <tbody class="text-center">
                                <tr>
                                    <td><?php echo $data['tgl_pengaduan']; ?></td>
                                    <td><?php echo $data['nik']; ?></td>
                                    <td><?php echo $data['isi_laporan']; ?></td>
                                    <td class="text-center"><img src="foto/<?= $data['foto']?>" class="rounded" alt="" width="100px"></td>
                                    <td class="text-center"><?php 
                                      switch ($data['status']) {
                                        case 0:
                                          echo "<div class='badge badge-danger text-wrap rounded-pill col-6 mx-auto'>Belum Ditanggapi</div>";
                                          break;
                                        case 'proses':
                                          echo "<div class='badge badge-warning text-wrap rounded-pill col-6 mx-auto'>Sedang Diproses</div>";
                                          break;
                                        case 'selesai':
                                          echo "<div class='badge badge-success text-wrap rounded-pill col-6 mx-auto'>Sudah Ditanggapi</div>";
                                          break;
                                        
                                        default:
                                          echo "";
                                          break;
                                      }
                                      ?></td>
                                    <td>

                                        <!--button-->
                                        <a
                                            href="?url=detail_pengaduan&id=<?php echo $data['id_pengaduan']; ?>"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-info text-light"></i>
                                        </a>

                                        <a
                                            href="?url=lihat_tanggapan&id=<?php echo $data['id_pengaduan']; ?>"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye text-light"></i>
                                        </a>

                                    </td>
                                </tr>

                            </tbody>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div
class="modal fade"
id="logoutModal"
tabindex="-1"
role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>