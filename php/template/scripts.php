<?php
    function getCore(){
        echo '<!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/main.min.js"></script>

        <!-- Sidebar script -->
        <script src="js/sidebar.js"></script>';
    }

    function getDatatablePageScripts(){
        getCore();
        echo '
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        
        <!-- Page level custom scripts -->
        <script src="js/datatables.js"></script>';

    }

    function getIndexPageScripts(){
        getCore();
        echo '
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
    
        <!-- Page level custom scripts 
        <script src="js/chart-area.js"></script>-->
        <script src="js/chart-pie.js"></script>';
    }

    
?>

