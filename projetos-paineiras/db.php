<?php

class db
{

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'paineiras';

    public function connectDatabase()
    {
        //mysqli_connect(local do bando de dados, usuario, senha, nome)
        $connectDb = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        //mysqli_set_charset(conexão com o BD, charset)
        mysqli_set_charset($connectDb, 'utf8');
        return $connectDb;
    }
}
