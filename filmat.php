<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Styles/filmatS.css">
    </head>
    <body>
        <div class="header">
            <ul class="header-list">
                <li><a id="liFix" href="./index.php">HOME</a></li>
                <li><a id="liFix" href="">FILMA</a></li>
                <li><a id="liFix" href="./about.html">ABOUT</a></li>
                <li><a id="liFix" href="./contact.html">CONTACT US</a></li>
                <li><a id="liFix" href="login.html">LOG OUT</a></li>
            </ul>
        </div>
        <div class="filmat">
            <div class="content">
            <h3 id="welcomeText">Shfletim te kendshem...</h3>
            <?php 
            for($i=0; $i<4 ; $i++){
            echo '<section id="moviesContainer">';
            
            include_once "./models/DbConn.php";
            $sql = "SELECT TOP 5 * FROM Film ORDER BY Film_ID DESC";

            $obj = new DBConnection();
            $connection = $obj->getConnection();

            $statement = $connection->prepare($sql);
            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($row as $roww) {
                
                $id = $roww['Film_ID'];
                $title = $roww['Title'];
                
                echo '<div class="movie">';
                echo '<a style="text-decoration: none; color: white;" href="./Reviews/movieR.php?id='.$id.'">';
                echo '<img src="'.$roww['Image'].'">';
                echo '<h3>'.$roww['Title'].'</h3>';
                echo '</a>';
                echo '<p>'.$roww['Category'].'</p>';
                echo '</div>';
                
            }
            echo '</section>';
            }
            ?>
            </div>
            <div class="footer">
                <h4>Recensime te kinemase</h4>
                <p>Copyright &#169;  2020 </p>
            </div>
        </div>

        </body>
</html>