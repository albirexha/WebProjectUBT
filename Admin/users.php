<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<form class="userForm" name="signUpForm" action="models/insertUser.php" method="POST">
			        <h1>Create User</h1>
					<input type="text" name="Username" id="Username" placeholder="Username" >
					<input type="email" name="Email" id="Email" placeholder="Email" >
					<input type="password" name="Password" id="Password" placeholder="Password" >
					<input type="roleID" name="RoleID" id="RoleID" placeholder="RoleID" >
			        <button name="AddButton" id="userBtn" onclick="">Add User</button>
                </form>
    <form action="" method="POST">
        <?php
            include_once 'models/showUsers.php';

            $showusers = new UserView();
            $userat = $showusers->FillTableRowsWithStudents();

        ?>

                
<h1 style="text-align: center; margin-top:5%">Tabela e te gjithe usereve ne DB </h1>
<table id="tbl">
        <thead>
            <tr>
                <th> Username </th>
                <th> Email </th>
                <th> RoleID </th>
                <th> Delete </th>
            </tr>
        </thead>
    <tbody>
            <?php foreach ($userat as $roww){ ?>
            <tr>
                <td><?php echo $roww['Username'] ?></td>
                <td><?php echo $roww['Email'] ?></td>
                <td><?php echo $roww['RoleID'] ?></td>
                <td><a name="deleteUser" href="./models/deleteUser.php?id=<?php echo $roww['User_ID'];?>">Delete</a>
            </tr>
            <?php }?>
        </tbody>
            </table>
            </form>
   
            

        </div>
</body>
</html>