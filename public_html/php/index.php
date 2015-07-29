<?php
include_once "upload.php";
?>

<!doctype html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<style>

    .uploadFile_form{
        border: 1px solid;
        border-radius: 10px;
    }
    
    .upload-btn{
        margin-top:13px;    
    }
    
    .chooseFile-btn{
        background-color:rgb(124, 91, 214);    
        color:white;
    }
    
</style>    

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 uploadFile_form">
            <h1>Upload file form</h1>
            <p>Upload music here.</p>
            
            <form action="upload.php" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    
                    <label for="file">File upload</label>
                    <input type="file" class="btn chooseFile-btn" name="fileToUpload" id="fileToUpload"/>
                    <input type="submit" class="btn btn-lg upload-btn" name="submit" value="Upload"/>
            
                </div>
            
            </form>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Uploaded files</h3>
                </div>
                    <div class="panel-body">
                        <?php
                        echo "<br/>";
                        //establish folder 
                        $path = "./uploads";

                        $handle = opendir($path);
                        while($file = readdir($handle)) {
                            //hide hidden files in dir
                            if(substr($file, 0, 1) != "."){
                                echo "<li class='list-group-item'> <a href=$path/$file download>$file</a></li><br/>";
                            }
                        } 
                        closedir($handle);
                        ?>
                    </div>
                </div>            
            </div>
        </div>
    </div>
     <!-- CONTAINER END-->
    
    
</body>
</html>