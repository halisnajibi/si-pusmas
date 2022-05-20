<?php
require "../functions.php";
$id = $_GET["id"];
if (hapusPasien($id) > 0) {
    echo
    " <script>
          alert('data berhasil di hapus');
           document.location.href='pasien.php';
        </script> ";
}
