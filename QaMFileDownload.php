<?php 
include("connect.php");

if (isset($_GET['IdeaID'])) {
    $IdeaID = $_GET['IdeaID'];

    // fetch file to download from database
    $select = "SELECT * FROM idea_data WHERE IdeaID=$IdeaID";
    $result = mysqli_query($connect, $select);
    $file = mysqli_fetch_assoc($result);
    $zip = new ZipArchive();
    $zipfile = 'UploadFiles/'.$file['IdeaFile'].'.zip';
    if ($zip->open($zipfile,ziparchive::CREATE) !== TRUE) {
        exit("cannot open <$zipfile>\n");
    }
    $zip->addFile('UploadFiles/'.$file['IdeaFile'],$file['IdeaFile']);
    $zip->close();

    if (file_exists($zipfile)) {
        header('Content-type: application/zip');
        header('Content-Disposition: attachment; filename="'.basename($zipfile).'"');
        header("Content-length: " . filesize($zipfile));
        header("Pragma: no-cache");
        header("Expires: 0");
        ob_clean();
        flush();
        readfile($zipfile);
        unlink($zipfile);
        exit;
    }

}
?>