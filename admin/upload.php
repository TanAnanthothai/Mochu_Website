<?php
include 'includes/db.php'; 
if(isset($_POST['btn-upload']))
{    
  //for audio guide name
  $name = strip_tags($_POST['au_name']);

  //for audio file
  $afile = rand(1000,100000)."-".$_FILES['au_file']['name'];
  $afile_loc = $_FILES['au_file']['tmp_name'];
  $afile_size = $_FILES['au_file']['size'];
  $afile_type = $_FILES['au_file']['type'];

  //for image file  
   $file = rand(1000,100000)."-".$_FILES['fl_IMG']['name'];
   $file_loc = $_FILES['fl_IMG']['tmp_name'];
   $file_size = $_FILES['fl_IMG']['size'];
   $file_type = $_FILES['fl_IMG']['type'];

   /////////////////////////////////////////////////////////////////////////////
   $folder="uploads/";
   $audio_folder="audio/";
   

   // make file name in lower case
   $new_file_name = strtolower($file);
   $new_afile_name = strtolower($afile);
   // make file name in lower case
   
   $final_file=str_replace(' ','-',$new_file_name);
   $final_afile=str_replace(' ','-',$new_afile_name);
   
   if(move_uploaded_file($file_loc,$folder.$final_file) && move_uploaded_file($afile_loc, $audio_folder.$final_afile))
   {
      //$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
      $sql="INSERT INTO AudioGuide (au_name, au_file, fl_IMG) VALUES ('$name', '$afile', '$file')" ;
      //mysql_query($sql);
      $run_sql = mysqli_query($conn, $sql);
      //header("Location:audioGuide.php");

    ?>
    <script>
    alert('successfully uploaded');
          // window.location.href='audioGuide_add.php?success';
          window.location.href='audioGuide.php';
          </script>
    <?php
   }else{
    ?>
    <script>
    alert('error while uploading file');
          window.location.href='audioGuide_add.php?fail';
          </script>
    <?php
   }
}else{
  echo "in else ka";
}
?>