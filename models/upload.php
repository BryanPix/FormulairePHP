
<?php
$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES["userImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Verifie si l'image est une vrai image ou non 
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["userImage"]["tmp_name"]);
  if($check !== false) {
    echo "Le fichier est une image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }
}
// Verifie si l'image existe déjà
if (file_exists($target_file)) {
    echo "Désolé cette image existe déjà.";
    $uploadOk = 0;
  } 

// Verifie la taille de l'image
if ($_FILES["userImage"]["size"] > 500000) {
    echo "Désolé votre image est trop volumineuse.";
    $uploadOk = 0;
  } 

// Ne permet que certains type de format
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Désolé, seul les images de type JPG, JPEG, PNG & GIF sont autorisé.";
  $uploadOk = 0;
} 
// Verifie si $uploadOk est set sur 0 à cause d'une erreur
if ($uploadOk == 0) {
    echo "Désolé votre image n'a pas été upload.";
  // si tout est correct, essaie de publier l'image
  } else {
    if (move_uploaded_file($_FILES["userImage"]["tmp_name"], $target_file)) {
        echo "félicitation";
        header("Location: ../controllers/controller-profile.php");
    } else {
      echo "Désolé, une erreur est survenue lors de l'upload.";
    }
  }

?>
