<?php 
include_once "../models/DbConn.php";
$id = $_GET['id'];
            $sql = "SELECT * FROM Film WHERE Film_ID=$id";

            $obj = new DBConnection();
            $connection = $obj->getConnection();

            $statement = $connection->prepare($sql);
            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            $title;
            $subject;
            $img;
            $director;
            foreach ($row as $roww) {
                $title = $roww['Title'];
                $subject = $roww['Subject'];
                $img = $roww['Image'];
                $director = $roww['Director'];
            }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="reviewStyle.css">
    </head>
    <body>
        <div class="header">
            <ul class="header-list">
                <li><a id="liFix" href="../index.php">HOME</a></li>
                <li><a id="liFix" href="../filmat.php">FILMA</a></li>
                <li><a id="liFix" href="../about.html">ABOUT</a></li>
                <li><a id="liFix" href="../contact.html">CONTACT US</a></li>
                <li><a id="liFix" href="../login.html">LOG OUT</a></li>
            </ul>
        </div>
    <div id="movieName">
    <h1><?php echo $title; ?></h1>
    <h3><?php echo $director; ?></h3>
    </div>
    <div id="movieReview">
        <img src="../<?php echo $img; ?>">
    <div id="reviewText">
            <p><?php echo $subject ?></p>
            <!-- <p>I've never met anyone like Forrest Gump in a movie before, and for that matter I've never seen a movie quite like "Forrest Gump." Any attempt to describe him will risk making the movie seem more conventional than it is, but let me try. It's a comedy, I guess. Or maybe a drama. Or a dream.</p>
            <p>The screenplay by Eric Roth has the complexity of modern fiction, not the formulas of modern movies. Its hero, played by Tom Hanks, is a thoroughly decent man with an IQ of 75, who manages between the 1950s and the 1980s to become involved in every major event in American history. And he survives them all with only honesty and niceness as his shields.</p>
            <p>And yet this is not a heartwarming story about a mentally retarded man. That cubbyhole is much too small and limiting for Forrest Gump. The movie is more of a meditation on our times, as seen through the eyes of a man who lacks cynicism and takes things for exactly what they are. Watch him carefully and you will understand why some people are criticized for being "too clever by half." Forrest is clever by just exactly enough.</p>
            <p>Tom Hanks may be the only actor who could have played the role.</p>
            <p>I can't think of anyone else as Gump, after seeing how Hanks makes him into a person so dignified, so straight-ahead. The performance is a breathtaking balancing act between comedy and sadness, in a story rich in big laughs and quiet truths.</p> -->
        </div>
    </div>
    <div class="footer">
        <h4>Recensime te kinemase</h4>
        <p>Copyright &#169;  2020 </p>
    </div>
</body>
</html>