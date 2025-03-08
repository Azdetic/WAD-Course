<?php
include 'config.php';

// Cek ID dari parameter URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk delete data
    $sql = "DELETE FROM mahasiswa WHERE id = $id";
    
    if($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
