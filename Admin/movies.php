<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<form class="signUpForm" id="shtoFilm" action="models/insertMovie.php" method="POST" enctype="multipart/form-data">
			        <h1>Shto Filmin me Recensim</h1>
					<input type="text" name="Title" id="Username" placeholder="Titulli i filmit" required>
                    <input type="text" name="Director" id="Email" placeholder="Regjisori" required>
                    <input type="text" name="Kategoria" id="Kategoria" placeholder="Kategoria" required>
                    <textarea style="resize: none;  width: 800px; height: 150px;"form ="shtoFilm" name="Subject" cols="35" wrap="soft"></textarea>
                    <input type="file" id="image" name="image" accept="image/*" required>
                    <button name="AddButton" id="SignUpButton" onclick="">Shto Filmin</button>
                    
</form>

<form action="" method="POST">
        <?php
            include_once 'models/showMovies.php';

            $showMovies = new movieView();
            $movies = $showMovies->FillTableRowsWithMovies();

        ?>

<h1 style="text-align: center; margin-top:5%">Tabela e te gjithe filmave ne DB </h1>
<table id="tbl">
        <thead>
            <tr>
                <th> Titulli </th>
                <th> Regjisori </th>
                <th> Permbajtja </th>
                <th> Kategoria </th>
                <th> Image </th>
                <th> Delete </th>
            </tr>
        </thead>
    <tbody>
            <?php foreach ($movies as $roww){ ?>
            <tr>
                <td><?php echo $roww['Title'] ?></td>
                <td><?php echo $roww['Director'] ?></td>
                <td><?php echo "// Long Text" ?></td>
                <td><?php echo $roww['Category'] ?></td>
                <td><?php echo $roww['Image'] ?></td>
                <td><a href="./models/deleteMovie.php?id=<?php echo $roww['Film_ID'];?>">Fshij</a>
            </tr>
            <?php }?>
        </tbody>
            </table>
            </form>
</body>
</html>