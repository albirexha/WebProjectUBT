<?php
class DBConnection
{
    public function getConnection()
    {
        try {
            //$connection = new PDO("sqlsrv:Server=$this->servername;Database=$this->databaseName", $this->user, $this->password);
            $connection = new PDO('sqlsrv:Server=DESKTOP-9HAC2BS\SQLEXPRESS; Database=rcsDB', 'user1', '1234');
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
        return $connection;
    }
}
?>