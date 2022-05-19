<?php
$conn = mysqli_connect("localhost", "root", "", "si_pusmas");
if ($conn == true) {
    echo "berhasil";
} else {
    echo "gagal";
}
