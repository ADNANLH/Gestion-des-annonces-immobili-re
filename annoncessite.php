<?php include './navbar.php' ;?>


<body>

<?php 
session_start();
error_reporting(E_ERROR | E_PARSE);
echo $_SESSION['delete_message'];
session_unset();

?>



    <div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col">
        
                <div id="cover">
                <img src="./image/cover-img.png" alt="">
                    <div id="searching">
                        <input type="search" name="search" id="search" placeholder="Search...">
                    </div>
                    <input type="submit" name="Search" value="Search" id="btn-search">
                </div>
            </div>
            
            
            <div class="col">
                
                <div id="filtering">
                    <div>                     
                        <input type="number" name="minPrix" id="min" placeholder="Prix Min">
                        <input type="number" name="maxPrix" id="max" placeholder="Prix Max">
                        <span>Dhs</span>
                    </div>
                    <select name="Type" id="select">
                        <option selected>Type</option>
                        <option value="Location">Location</option>
                        <option value="vente">Vente</option>
                    </select>
                    <input type="submit" value="Filter" name='filter' id="btn-filter">
                    
                </div>
            </div>
            
            
            
        </form>
    </div>


    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            echo $id;
        }

    ?>
        
        <div class="row ">
        
        <?php 
                
                    
            
            include('./config/config.php');
            
            
            
            $keyword = $_POST['search'];
            $search = $_POST['search'];
            $prixMax = $_POST['maxPrix'];
            $prixMin = $_POST['minPrix'];
            $type = $_POST['Type'];
            
            $sql = "SELECT * FROM `annonce` WHERE titre like '%$keyword%'";
            
            if(!empty($_POST['minPrix']) || !empty($_POST['maxPrix'])){
                $sql = "SELECT * FROM `annonce` WHERE montant BETWEEN '$prixMin' AND '$prixMax' ";
            }elseif(!empty($_POST['Type']) && empty($_POST['minPrix']) && empty($_POST['maxPrix'])){
                $sql = "SELECT * FROM `annonce` WHERE type_annonce = '$type'";
            }
            elseif((!empty($_POST['minPrix']) || !empty($_POST['maxPrix'])) && !empty($_POST['Type'])){
                $sql = "SELECT * FROM `annonce` WHERE montant BETWEEN '$prixMin' AND '$prixMax' AND type_annonce = '$type'";
            }
            

            $keyword = $_POST['Search'];
            $prixMin =  $_POST['minPrix'];
            $prixMax =  $_POST['maxPrix'];
            $type = $_POST['Type'];
            


            
            
                
                $res = mysqli_query($connect, $sql);

        
                while ($champ = mysqli_fetch_assoc($res))
                {
                    echo "                
                        <div class='cart col-sm-12 col-md-12 col-lg-12 '>
                            <div class='cart'>                                            
                                <img class='detail-img' src='".$champ['image']."' alt='Card image cap'>
                                <div class='detail-body'>
                                    <div class='title-dh'>                    
                                        <h5 class='card-title'>".$champ['titre']."</h5>
                                        <h7 class='card-title'>".$champ['type_annonce']."</h7>
                                        <h6 class='card-title'> ".$champ['montant']."</h6> 
                                    </div>
                                    <div class='descrip'>
                                        <p>".$champ['description']."</p>
                                    </div>                                           
                                    <div class='btns'>                                     
                                        <form method='get' action='modifier.php'>
                                            <button class='btn btn-modifier' name='id' value='".$champ['id']. "'>Modifier</button>
                                        </form>  
                                        
                                        <form method='get' action='./delete.php'> 
                                            <button class='btn btn-supprimer' name='id' value='".$champ['id']."' >Supprimer</button>
                                        </form>
                                    </div>                                            
                                </div>  
                            </div>                               
                        </div>
                                
                        
                               
                                
                    ";
                }
            

            
                
                
        ?>
        </div> 
        
        
    </div>  
</body>

</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Imperial+Script&family=Roboto:wght@400;500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
.cart {
    position: absolute;
    top: 289px;
    display: flex;
    left: 8px;
    flex-direction: row;
    width: 100%;
    height: auto;
    background: #F3F3F3;
    border-radius: 7px;
}
.card-img, .card-img-top {
    
    width: 258px;
    height: 144px;
}

img.detail-img {
    height: 114px;
    width: 211px;
    margin: 3px 7px;
    border-radius: 15px;
    padding: 7px 9px;
    align-self: center;
}
.title-dh {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 97%;
    position: relative;
    margin: 6px 7px;
    align-items: center;
    color: #10454F;
}
.detail-body {
    width: 68%;
}
.btns {
    position: absolute;
    display: flex;
    right: 13px;
    flex-direction: row;
    justify-content: space-around;
    width: 37%;
    bottom: -3%;
}
.btn-modifier {
    color: #10454F;
    background-color: #BDE038;
    border: none;
    box-shadow: inset 0.5px 0.5px 1px rgba(0, 0, 0, 0.25);
    border-radius: 8px;
    height: 35px;
    font-size: 13px;
    width: 79px;
    margin-bottom: 8px;
}
button.btn-supprimer {
    color: #e3e8e9;
    background-color: #FF7612;
    border: none;
    box-shadow: inset 0.5px 0.5px 1px rgba(0, 0, 0, 0.25);
    border-radius: 8px;
    height: 35px;
    font-size: 13px;
    width: 89px;
    margin-bottom: 8px;
}
p {
    margin-top: 0;
    padding-bottom: 39px;
    margin-bottom: 1rem;
}
.row.d-felxi {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    position: relative;
    top: 221px;
}


.cart.col-sm-12.col-md-12.col-lg-12 {
    position: relative;
    top: -39px;
    margin-bottom: 200px;
}


*{
    margin: 0 0;
    padding: 0 0;
    
}
body{
    background-color: rgba(163, 171, 120, 0.42) !important;
    height: 51rem;
    font-family: 'Inter';
font-style: normal;
font-weight: 700;

}
a.lnk {
    text-decoration: none;
    color: #042e36;
}

nav.navbar {
  
    width: 100%;
    height: 67px;
    background: #406971;
    box-shadow: 0px 6px 8px rgba(61, 67, 68, 0.81);
}
.logo{
    
    width: 219px;
    height: 34px;
    text-decoration: none;
    margin-left: 186px;
    font-family: 'Imperial Script';
    
    font-weight: 400;
    font-size: 30px;
    line-height: 36px;

    color: #FFFFFF;
}
ul {
    list-style: none;
}
a.home {
    position: absolute;
    width: 40px;
    height: 14px;
    text-decoration: none;
    
    
    font-weight: 700;
    font-size: 13px;
    line-height: 16px;
    
    color: #F3F3F3;
}
span{

    
    font-weight: 700;
    font-size: 10px;
    line-height: 8px;
    
    color: #10454F;
    
    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
a.ajoute {
    position: absolute;
    width: 40px;
    height: 14px;
    text-decoration: none;

    
    font-weight: 700;
    font-size: 13px;
    line-height: 16px;
    margin: 0px 67px;
    color: #F3F3F3;
}
div#navbarNav {
    display: flex;
    flex-direction: row;
    position: absolute;
    right: 50%;
}
#cover {
    height: 50%;
    left: 12%;
    background: rgba(160, 160, 148, 0.53);
    box-shadow: 6px 1px 15px rgba(66, 66, 66, 0.57);
    border-radius: 27px;
    top: 55.7px;
}
img {
  
    width: 100%;
    height: 174px;
    background: url(pexels-pixabay-164558-removebg-preview.png);
    backdrop-filter: blur(44.5px);
    border-radius: 27px;
}
#cover, img {
    position: relative;
    width: 882.32px;
    height: 270.78px;
    right: 0px;
}
#searching {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(30%, 278%);
}
input#search {
    width: 571px;
    height: 40px;
    background: #F3F3F3;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    border: none;
    padding-left: 23px;
}
#btn-search {
    width: 281px;
    height: 29px;
    background: #F3F3F3;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 2px;
    border: none;
    position: absolute;
    right: 36%;
    top: 111%;
    color: #10454F;
  
font-weight: 700;
font-size: 16px;
line-height: 10px;
}
div#filtering {
    display: flex;
    flex-direction: row;
    position: relative;
    top: 613%;
    justify-content: space-evenly;
}
input#min, input#max  {
    background: #F3F3F3;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    border: none;
    padding-left: 13px;
    font-size: 14px;
}
label {
 
    padding: 0px 9px;
    font-weight: 700;
    font-size: 16px;
    line-height: 11px;

    color: #10454F;

    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
input#btn-filter {
    width: 88px;
    position: relative;
    border: none;
    height: 29px;
    background: #BDE038;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 2px;
    font-weight: 700;
    
    font-size: 11px;
    line-height: 16px;

    color: #10454F;
}





</style>
