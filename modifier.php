<?php include('navbar.php')?>
<body>


<?php 
// $annonceId = $_GET['id'] ;
?>


<?php 
error_reporting(E_ERROR | E_PARSE);

$annonceId = $_GET['id'] ;
echo $annonceId;
include('./config/config.php');
$getdata = "SELECT * FROM annonce WHERE id= $annonceId";
$var = mysqli_query($connect, $getdata);
$response = mysqli_fetch_assoc($var);
?>


<?php 


session_start();
#error_reporting(E_ERROR | E_PARSE);
$_SESSION['error1'] = $_SESSION['error2'] =$_SESSION['error3'] =$_SESSION['error4'] =$_SESSION['error5'] =$_SESSION['error6'] =$_SESSION['error7'] =$_SESSION['error8']  = $_SESSION['message'] = '';




if($_SERVER['REQUEST_METHOD'] == 'POST'){



if(isset($_POST['button'])){
    $_SESSION['title'] = $titre = $_POST['title'];
    $_SESSION['description'] = $description = $_POST['description'];
    $_SESSION['area'] = $superficie = $_POST['Area'];
    $_SESSION['adresse'] = $adresse = $_POST['adress'];
    $_SESSION['montant'] = $montant = $_POST['price'];
    $_SESSION['date_annonce'] = $dateAnnonce = $_POST['date'];

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
        $updatedata = "UPDATE annonce SET 
            titre = '$titre',
            image = '$folder',
            description = '$description',
            adresse = '$adresse',
            montant = '$montant',
            date_annonce = '$dateAnnonce',
            type_annonce = '$typeAnnonce' 
            where id = '$annonceId'";

        mysqli_query($connect, $updatedata);
        mysqli_close($connect);
        $_SESSION['message'] = 'Anonnce Updated Successfuly';

    }




}

}

?>





<div class="sucess">
        <h1><?= $_SESSION['message']?></h1>
</div>




<section>
        <form action='' method="post" class='mainform' enctype="multipart/form-data">
            <label for="title" class="for">Titre</label>
            <input id="title" name="title" type="text" value="<?=$response['titre']?>">
            <span class='error-message' id="t-err"><?= $_SESSION['error1'] ?></span>
            
            <label for="image" class="for">Image</label>
            <input id="image" name="image" type="file">
            <span class='error-message' id="i-err"><?= $_SESSION['error2'] ?></span>

            <label for="description" class="for">Brève description</label>
            <input id="description" name="description" type="textarea" value="<?=$response['description']?>">
            <span class='error-message' id="d-err"></span>

            <label for="Area" class="for">Superficie </label>
            <input id="Area" name="Area" type="number" value="<?=$response['']?>">
            <span class='error-message' id="n-err"><?=$_SESSION['error4'] ?></span>

            <label for="adress" class="for">Adresse </label>
            <input id="adress"  name="adress" type="text" value="<?=$response['adresse']?>">
            <span class='error-message' id="a-err"></span>

            <label for="price" class="for">Montant</label>
            <input id="price" name="price" type="number" value="<?=$response['montant']?>">
            <span class='error-message' id="p-err"><?= $_SESSION['error6'] ?></span>

            <label for="date" class="for">Date d'annonce</label>
            <input id="date" name="date" type="date" value="<?=$response['date_annonce'] ?>">
            <span class='error-message' id="da-err"><?= $_SESSION['error7'] ?></span>

            <label for="type" class="for">Type annonce</label>
            <div class="type">
                <label>Location</label>
                <input id="location" name="type" type="radio" value="location" >
                <label>Vente</label>
                <input id="vente" name="type" type="radio" value="vente" >
            </div>
            <span class='error-message' id="te-err"><?= $_SESSION['error8'] ?></span>
            <button id="button" name="button" >Modifier</button>
        </form>
    </section>









</body>
</html>
<style>
    
@import url('https://fonts.googleapis.com/css2?family=Imperial+Script&family=Roboto:wght@400;500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
*{
    margin: 0 0;
    padding: 0 0;
    
}
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
        text-align: center;
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
    .sucess{
    width: 100%;
    padding:40px;
    display: flex;
    justify-content: center;
    color: aquamarine;
    }
</style>