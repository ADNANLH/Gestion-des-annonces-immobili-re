<?php include './navbar.php' ;?>

<body>
    
<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$_SESSION['error1'] = $_SESSION['error2'] =$_SESSION['error3'] =$_SESSION['error4'] =$_SESSION['error5'] =$_SESSION['error6'] =$_SESSION['error7'] =$_SESSION['error8']  = $_SESSION['message'] = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

if(isset($_POST['button'])){
    $_SESSION['title'] = $titre = $_POST['title'];
    $_SESSION['description'] = $description = $_POST['description'];
    $_SESSION['area'] = $superficie = $_POST['Area'];
    $_SESSION['adress'] = $adresse = $_POST['adress'];
    $_SESSION['price'] = $montant = $_POST['price'];
    $_SESSION['date'] = $dateAnnonce = $_POST['date'];
    if(isset($_POST['type'])){
        $typeAnnonce = $_POST['type'];
    }else{
        $typeAnnonce = false;
    }
    

    #validation of image input
    $filename = $_FILES["image"]["name"];
    $fileExtension = explode('.', $filename);
    $fileExtension = end($fileExtension);
    $allowedExtensions = array('jpg', 'png', 'jpeg');



    #validation of title input
    if(strlen($_POST['title']) == 0 || strlen($_POST['title']) > 255){
        $_SESSION['error1'] = 'Title Length must be more than 0 letters and less than 255 letters';
    }elseif (preg_match('/^[<>]/i', $_POST['title'])) {
        $_SESSION['error1'] = "Title musn't contain some < or > characters!";
    }elseif(!in_array($fileExtension, $allowedExtensions)){
        $_SESSION['error2'] = 'Only JPG and PNG and JPEG Extensions are allowed!';
    }elseif($_POST['Area'] == 0){
        $_SESSION['error4'] = 'Superficie Cannot be 0m²!';
    }elseif($_POST['price'] == 0){
        $_SESSION['error6'] = 'Price cannot be 0dh!';
    }elseif($_POST['date'] == ''){
        $_SESSION['error7'] ='Date cannot be empty!';
    }elseif($typeAnnonce == false){
        $_SESSION['error8'] = 'Please choose a type!';
    }
    else{
        include('./config/config.php');
        $filename = uniqid('', true). ".$fileExtension";
        $tempname = $_FILES['image']['tmp_name'];
        $folder = "./images/" . $filename;

        move_uploaded_file($tempname, $folder);
        $createdata = "INSERT INTO annonce(id, titre, image, description, adresse, montant, date_annonce, type_annonce) VALUES(NULL,'$titre', '$folder','$description', '$adresse', '$montant', '$dateAnnonce', '$typeAnnonce')";
        mysqli_query($connect, $createdata);
        mysqli_close($connect);
        $_SESSION['message'] = 'Successfuly added Anonnce';
    }




}


}

?>

    <div class="sucess">
        <h1><?php $_SESSION['message'] ;?></h1>
    </div>

    <section>
        <form action='' method="post" class='mainform' enctype="multipart/form-data">
            <label for="title" class="for">Titre</label>
            <input id="title" name="title" type="text" value="<?php $_SESSION['title'];?>">
            <span class='error-message' id="t-err"><?php $_SESSION['error1'] ;?></span>
            
            <label for="image" class="for">Image</label>
            <input id="image" name="image" type="file">
            <span class='error-message' id="i-err"><?php $_SESSION['error2'] ;?></span>

            <label for="description" class="for">description</label>
            <input id="description" name="description" type="textarea" value="<?php $_SESSION['description'] ;?>">
            <span class='error-message' id="d-err"></span>

            <label for="Area" class="for">Superficie </label>
            <input id="Area" name="Area" type="number" value="<?php $_SESSION['area'] ;?>">
            <span class='error-message' id="n-err"><?php $_SESSION['error4']; ?></span>

            <label for="adress" class="for">Adresse </label>
            <input id="adress"  name="adress" type="text" value="<?php $_SESSION['adress'] ;?>">
            <span class='error-message' id="a-err"></span>

            <label for="price" class="for">Montant</label>
            <input id="price" name="price" type="number" value="<?php $_SESSION['price'] ;?>">
            <span class='error-message' id="p-err"><?php $_SESSION['error6'] ;?></span>

            <label for="date" class="for">Date d'annonce</label>
            <input id="date" name="date" type="date" value="<?php $_SESSION['date']; ?>">
            <span class='error-message' id="da-err"><?php $_SESSION['error7'] ;?></span>

            <label for="type" class="for">Type annonce</label>
            <div class="type">
                <h6>Location</h6>
                <input id="location" name="type" type="radio" value="location" >
                <h6>Vente</h6>
                <input id="vente" name="type" type="radio" value="vente" >
            </div>
            <span class='error-message' id="te-err"><?php $_SESSION['error8'] ?></span>
            <button id="button" name="button" >AJOUTER</button>
        </form>
    </section>


?>











</body>
</html>
<style>
    
label.for {
    font-weight: 600;
    font-size: 17px;
    line-height: 19px;
    color: #0f515e;
    padding: 3px 10px;
}

.mainform{
    width: 50%;
    height: 100%;
    display: flex;
    justify-content:center;
    margin: 50px auto;
    background: #C1C3B7;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 5px 10px 10px 0px #00000040;
display: grid;
justify-content: center;
}

input[type="number"], input[type="text"] {
    width: 268px;
    height: 29px;
    
    background: #F3F3F3;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    border: none;
}
select {
    word-wrap: normal;
    border: none;
    color: #7c7c7c;
    border-radius: 14px;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);

}

.mainform input{
    margin: 0 0 10px;
    padding: 8px;
    border-radius: 10px;
    border: none;
    outline: none;
}
.mainform button{
    margin: 10px;
    background: #BDE038;
    color: #10454F;
    border: none;
    padding: 5px;
}

.mainform .type{
    display: flex;
    margin: 10px;
}
.mainform .type input, h6{
    margin: 0 10px;
}
.mainform .error-message{
    color: red;
}

    

</style>