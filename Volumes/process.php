<?php
    $message = $_POST["message"];
    $files = scandir("./messages");
    $num_files = count($files)-2; 
    $filename = "msg-{$num_files}.txt";
    $file = fopen("./message/{$filename}","x");
    fwrite($file,$message);
    fclose($file)
    header("Location: index.php")
<?