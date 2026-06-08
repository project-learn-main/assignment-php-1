<?php

class Database
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $connection;

    public function __construct($db_host, $db_name, $db_user, $db_pass)
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    public function connect()
    {
        $this->connection = new mysqli(
            $this->db_host,
            $this->db_user,
            $this->db_pass,
            $this->db_name
        );

        if ($this->connection->connect_error) {
            die("Lỗi kết nối: " . $this->connection->connect_error);
        }

        // echo "Kết nối thành công! <br>";
    }

    public function disconnect()
    {
        if ($this->connection !== null) {
            $this->connection->close();
            $this->connection = null;
            echo "Ngắt kết nối thành công! <br>";
        }
    }

    public function getConnection()
{
    return $this->connection;
}
}

$db = new Database(
    "localhost",
    "shop_db",
    "root",
    ""
);

$db->connect();
