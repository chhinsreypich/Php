<?php ///// hw2.php
echo <<<_END
    <html>
    <head>
        <title>PHP Form Upload</title>
        <style>
            .all{
                background-color: rgb(142,130,232);
                color: white;
                padding: 16px;
            }
            
        </style>
    </head>
    <body>
        <div class ="all">
            <form class="in-form" method = "post" action="hw2.php" enctype="multipart/form-data"> 
            Select File: <input name="brower" size="10"><br>
            <input  class="file" type="file" name="filename" size="10"><br>
            <input type="submit" value="Upload"><br>
            </form> 
        </div>
_END;
if ($_FILES) {
    $name = $_FILES['filename']["name"];
    move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
    echo "Uploaded image '$name'<br><img src='$name'";
}
echo "</body></html>";

