<?php include('navbar.php')?>
<body>
<?php 
include('./config/config.php');
$annonceId = $_GET['id'];
echo $annonceId;

session_start();
$_SESSION['delete_message'] = '';

?>


<?php 

if(isset($_POST['delete'])){
    $delete = "DELETE FROM annonce WHERE id = $annonceId";
    mysqli_query($connect, $delete);
    header('Location: ./annoncessite.php');
    $_SESSION['delete_message'] = '<center><br><h1>Deleted Successfuly!</h1></center>';
}elseif(isset($_POST['back'])){
    header('Location: ./annoncessite.php');
}


?>


<section>
    <div class="content">
        <h1>voulez-vous vraiment supprimer cette annonce ?</h1>
        <form method='post' class="buttons">
            <button name='delete' class='btnYes'>Supprimer</button>
            <button name='back' class='btnBack'>Annuler</button>
        </form>
    </div>
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
h1 {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 22px;
    line-height: 17px;
    margin: 35px 35px;
    color: #0A7488;
}

section{
    width: 50%;
    height: 100%;
    display: flex;
    margin: auto;
    align-items: center;
    justify-content: center;
}

section .content {
    display: grid;
    justify-items: center;
    text-align: center;
    top: 196px;
    position: absolute;
    background-color: #fff;
    padding: 29px;
    border-radius: 5px;
}

section .content button {
    padding: 7px 88px;
    margin: 19px 15px;
    color: #fff;
    outline: none;
    border: none;
    border-radius: 5px;
    transition: 0.3s;
}

section .content .btnBack{
    color: #10454F;
    background: #D7D9DA;
box-shadow: inset 0.5px 0.5px 1px rgba(0, 0, 0, 0.25);
border-radius: 2px;

}

section .content .btnYes{
background:red;
background: #FF2828;
box-shadow: inset 0.5px 0.5px 1px rgba(0, 0, 0, 0.25);
border-radius: 2px;
color: white;
}
section .content button:hover{
    transform: scale(1.1)
}

</style>