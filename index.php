<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Styles/indexS.css">
        <div id="hiddenUsername" style="display: none;">
         <?php
            session_start();
            echo htmlspecialchars($_SESSION['username']);
        ?>
    </div>
    </head>
    <body>
        <div class="header">
            <ul class="header-list">
                <li><a id="liFix" href="">HOME</a></li>
                <li><a id="liFix" href="./filmat.php">FILMA</a></li>
                <li><a id="liFix" href="./about.html">ABOUT</a></li>
                <li><a id="liFix" href="./contact.html">CONTACT US</a></li>
                <li><a id="liFix" href="./login.html">LOG OUT</a></li>

            </ul>
        </div>
        <div class="content">
            <div class="welcome" id="welcome">
                <img src="./Images/movieVector.png">
                <p id="wUser">sadasd</p>
            </div>
            <a id="newPosts" href="#jumpNew">POSTIMET E REJA<br>
            <img id="downJump" src="./Images/down.png"></a>
            <div class="slideshow">
                <div class="mySlides">
                  <a href=""><img src="./Images/topMovies.jpg" ></a>
                </div>
              
                <div class="mySlides">
                  <a href=""><img src="./Images/tvSeries.jpg" ></a>
                  
                </div>

        </div>
        </div>
        <section class="newContent" id="newContent">
            <span id="jumpNew"></span>
            <h1> Me te rejat </h1>
            <h3 style="color: blue"> Shikoni vleresimet/recensimet me te reja te filmave dhe serialeve </h3>
            <section id="moviesContainer">
            
            <?php 
            include_once "./models/DbConn.php";
            $sql = "SELECT TOP 4 * FROM Film ORDER BY Film_ID DESC";

            $obj = new DBConnection();
            $connection = $obj->getConnection();

            $statement = $connection->prepare($sql);
            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($row as $roww) {
                $id = $roww['Film_ID'];
                echo '<div class="movie">';
                echo '<a style="text-decoration: none; color: black;" href="./Reviews/movieR.php?id='.$id.'">';
                echo '<img src="'.$roww['Image'].'">';
                echo '<h3>'.$roww['Title'].'</h3>';
                echo '<p>'.$roww['Category'].'</p>';
                echo '</a>';
                echo '</div>';
                //echo '<li class="Category" style="font-size:200%; text-align: center;">'.$roww['Category_Name']. '</br>';
            }
            ?>
            
            
            
            </section>
            </section>
        <section class="suggestions" id="suggestions">
        <h2>Deshironi qe ne te recensojme filmin/serialin tend te preferuar?</h2>
        <div id="suggest">
        <form class="contact-form" action="views/insertRekomandimiView.php" method="POST">
            <div class="containerSuggest">             
                  <p>Pershkruaje ate!</p>
                  <textarea name="Message" id="suggestBox" placeholder="Informacione rreth filmit apo serialit..." style="height:150px"></textarea>
                  <input name="SendBtn" type="submit" value="Submit" id="btn" >
                </form>
              </div>
        </form>
    </div>
    </section>
    <div class="about" id="about">
        <div class="footer1">
            <div class="left-side">
            <br>
            <br>
            <p>Ne menyre qe te njoftoheni per cdo postim te ri permes email, shkruani email tuaj ne anen e djathte.</p>
            </div>
            <div class="right-side">
            <h4>NEWSLETTER<h4>
                <br>
            <input type="text" id="emailNL" name="emailNL" placeholder="Your email..">
            <input type="submit" id="btnNL" value="Submit" onclick="validateEmailNL();">

        </div>
        </div>
        <div id="CR">
        <h4>Recensime te kinemase</h4>
        <p>Copyright © 2020 </p>
    </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="Scripts/indexS.js"></script>
    </body>

</html>