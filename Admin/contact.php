<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1 style="text-align: center; margin-top:5%">Tabela e te gjithe user contacts ne DB </h1>
<?php
        include_once 'models/showContact.php';

        $showcontacts = new ContactView();
        $contacts = $showcontacts->FillTableRowsWithContact();

    ?>

    <div>
        <table id="tbl" class="table table-border">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th> Name </th>
                    <th> Message </th>
                    <th> Delete </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $roww){ ?>
                <tr>
                    <td><?php echo $roww['User_ID']?></td>
                    <td><?php echo $roww['Username']?></td>
                    <td><?php echo $roww['Message'] ?></td>
                    <td><a href="./models/deleteContact.php?id=<?php echo $roww['Contact_ID'];?>">Delete</a>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>