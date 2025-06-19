<?php
header("Access-Control-Allow-Origin: *");
//echo "SEI DENTRO AL SERVER";
if (isset($_POST['actionTest'])) 
{
    echo "TEST";
}

if (isset($_FILES['actionUpload'])) 
{
    //echo "UPLOAD";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        // Check if the file was uploaded without errors
        if (isset($_FILES['actionUpload']) && $_FILES['actionUpload']['error'] === UPLOAD_ERR_OK) 
        {
            // Retrieve the temporary file path
            $tmpFilePath = $_FILES['actionUpload']['tmp_name'];
            
            // Read the file contents
            $fileContent = file_get_contents($tmpFilePath);
            
            // Print file contents
            //echo nl2br("CONTENUTI DEL FILE");
            //echo nl2br(htmlspecialchars($fileContent));

            // Save file locally
            $uploadDir = 'data/';

            if (!is_dir($uploadDir)) 
            {
                mkdir($uploadDir, 0755, true);
            }

            // Construct the destination file path using the original file name ($uploadDir . basename($_FILES['actionUpload']['name']);)
            $destinationPath = "/var/www/html/data/file_di_testo.txt";

            // Move the file from the temporary location to your defined directory
            if (move_uploaded_file($tmpFilePath, $destinationPath)) 
            {
                echo "File has been successfully uploaded to: /var/www/html/" . htmlspecialchars($destinationPath);
            } 
            else
            {
                echo "Error saving the file.";
            }
        }
    }
}

if (isset($_POST['actionDownload'])) 
{
    $tmpFilePath = "/var/www/html/data/file_di_testo.txt";

    if (file_exists($tmpFilePath)) 
    {
        echo "<meta http-equiv='refresh' content='0;url=http://localhost:8000/data/file_di_testo.txt'>";
        exit;
    } 
    else 
    {
        die("File not found.");
    }
}

if (isset($_POST['actionPreview'])) 
{
    // Retrieve the temporary file path
    $tmpFilePath = "/var/www/html/data/file_di_testo.txt";
            
    // Read the file contents
    $fileContent = file_get_contents($tmpFilePath);

    // Print file contents
    echo "CONTENUTI DEL FILE<br><br>";
    echo nl2br(htmlspecialchars($fileContent));
}

if (isset($_POST['actionChangeExtension'])) 
{

}

if (isset($_POST['actionConvertToUppercase'])) 
{
    // Retrieve the temporary file path
    $tmpFilePath = "/var/www/html/data/file_di_testo.txt";

    // Read the file content
    $content = file_get_contents($tmpFilePath);
    if ($content === false) 
    {
        echo "Errore nella lettura del file<br>";
        die();
    }

    //Converti contenuto in uppercase
    $content = strtoupper($content);
    //echo $content;
    file_put_contents($tmpFilePath, $content);
    echo "Contenuto del file convertito in uppercase<br>";
}

if (isset($_POST['actionAppendString'])) 
{
    // Retrieve the temporary file path
    $tmpFilePath = "/var/www/html/data/file_di_testo.txt";

    // Read the file content
    $content = file_get_contents($tmpFilePath);
    if ($content === false) 
    {
        echo "Errore nella lettura del file<br>";
        die();
    }
    $content .= "\nSTRINGA";
    //echo $content;
    file_put_contents($tmpFilePath, $content);
    echo "Messa in cosa la stringa STRING<br>";
}
?>
