<?php
    include('php/queries.php');
?>

<html lang="tr">

<?php
    include('php/template/head.php');
?>

<head>
    <title>igAnalyzer - Stalkerlar</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include('php/template/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include('php/template/topbar.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <p class="mb-2">Bu sayfada seni takip etse bile beğeni veya yorumda az bulunan kullanıcıları görebilirsin. <br>
                    İsime veya kullanıcı adına göre alfabetik sıraya, beğendiği gönderi sayısına ya da attığı yorum sayısına göre sıralamak için başlıkların üstlerine tıklayabilirsin.</p>

                    <!-- DataTable for Potential Stalkers -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Potansiyel Stalkerlar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>İsim</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Beğendiği Gönderi Sayısı</th>
                                            <th>Attığı Yorum Sayısı</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($stalkers as $user) {
                                                $id       = $user[0];
                                                $name     = $user[2]; 
                                                $username = $user[3]; 
                                                $likes    = $user[4];
                                                $comments = $user[5];

                                                
                                                echo '<tr>
                                                <td class="col-md-1"><img id='.$id.' class="img-profile-picture rounded-circle" src="img/'.$id.'.jpeg"></td>
                                                <td class="col-md-3">'.$name.'</td>
                                                <td class="col-md-3">'.$username.'</td>
                                                <td class="col-md-1">'.$likes.'</td>
                                                <td class="col-md-1">'.$comments.'</td>
                                                </tr>';
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->                                    
            <?php
                include('php/template/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php 
        include('php/template/scrollTopButton.php');
    ?>

    <!-- Scripts -->
    <?php 
        include('php/template/scripts.php');
        getDatatablePageScripts();
    ?>
</body>

</html>