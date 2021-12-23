<html lang="tr">

<?php
    include('php/template/head.php');
?>

<head>
    <title>igAnalyzer - Bekleyiniz...</title>
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
                    <div class="text-center">
                        <div class="waitText">Bekleyiniz.</div>
                        <p class="lead text-gray-800 mb-5">Bu işlem uzun sürebilir, verileriniz güncellendiğinde sizi ana panele yönlendireceğiz. <br>Sayfayı işlem bitene kadar yenilemeyiniz ya da sayfadan ayrılmayınız.</p>
                        <p class="text-gray-500 mb-0">Verilerinizi günde sadece bir kere güncelleyebilirsiniz.</p>
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

    <?php 
        include('php/template/scripts.php');
        getCore();
        sleep(1);
    ?>
    <script>
        location.href = "/updateDatas.php";
    </script>
    

</body>

</html>

