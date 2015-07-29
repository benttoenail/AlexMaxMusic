<!-- file upload via php -->

<?php


if(isset($_FILES['fileToUpload'])){
    $file = $_FILES['fileToUpload'];

    //file properties
    $file_name = $file['name'];
    $file_tmp  = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error= $file['error'];
    
    //file extension
    //split apart the array
    $file_ext = explode('.', $file_name);
    //convert all characters to lower case
    $file_ext = strtolower(end($file_ext));
    //create array of allowed extensions
    $allowed = array('png', 'jpg');
    //check to see if $file_ext is in the $allowed array
    if(in_array($file_ext, $allowed)){
        //look for errors
        if($file_error === 0){
            //check file size
            if($file_size <= 20000000){
                //give file a unique name
                $file_name_new = uniqid('', true) . '.' .$file_ext;
                //select destination
                $file_destination = 'uploads/' . $file_name_new;
                
                // look for file - move file to destination
                if(move_uploaded_file($file_tmp, $file_destination)){
                    header("location: index.php"); 
                    
                }
            }
        }
    }
}
?>