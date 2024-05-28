<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="upload_img.css">
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  </head>
  <body>
    <?php
    $tablename=$_GET['tname'];
    $location=$_GET['location'];
    $fname=$_GET['fname'];
    $edit=$_GET['edit'];
    if (isset($_POST['save'])) 
    { 
      if($_FILES['myfile']['size']!=0)
      {
        $conn= mysqli_connect('localhost', 'root', '', 'agro');
        $filename = $_FILES['myfile']['name'];
        $destination = 'upload/' . $filename;
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = $_FILES['myfile']['tmp_name'];
        $size = $_FILES['myfile']['size'];
        
        if (!in_array($extension, ['jpg','jpeg','png', 'docx'])) 
        {
            echo "You file extension must be .zip, .pdf or .docx";
        } 
        elseif ($_FILES['myfile']['size'] > 1000000000) 
        { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
        } else 
        {
            if (move_uploaded_file($file, $destination)) 
            {
                
              header("Location:../$location?edit=$edit&tname=$tablename&fname=$destination");
            }
        }  
      }
      else{
        if($_POST['imgfruit']!='none')
        {
          $destination=$_POST['imgfruit'];
          header("Location:../$location?edit=$edit&tname=$tablename&fname=$destination");
        }
      }
        
    }
    ?>
    <div class="container">
      <div class="row">
        
        <form action="" method="post" enctype="multipart/form-data" >
          <a href="../<?php echo $location?>?edit=<?php echo $edit?>&tname=<?php echo $tablename?>&fname=<?php echo $fname?>" class="delete">
            <span class="material-icons-outlined">
              close
            </span>
          </a>
          <h3>Upload Image</h3>
          <input type="file" name="myfile"> <br>
          <div class="select">
            <h2>(or)</h2>
            <select name="imgfruit" id="fruits">
            <option value="none">Select image</option>
              <option value="upload/default/apple.png">Apple</option>
              <option value="upload/default/banana.png">Banana</option>
              <option value="upload/default/carrot.png">Carrot</option>
              <option value="upload/default/coconut.png">Coconut</option>
              <option value="upload/default/coriander.png">Coriander</option>
              <option value="upload/default/gauva.png">Gauva</option>
              <option value="upload/default/graphes.png">Graphes</option>
              <option value="upload/default/mango.png">Mango</option>
              <option value="upload/default/onion.png">Onion</option>
              <option value="upload/default/onion_raw.jpg">Onions</option>
              <option value="upload/default/orange.png">Orange</option>
              <option value="upload/default/raddish.png">Raddish</option>
              <option value="upload/default/tomato.png">Tomato</option>
            </select>
          </div>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
    </div>
  </body>
</html>