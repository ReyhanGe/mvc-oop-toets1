<?php

class Person
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInsanlar()
    {
        $this->db->query("SELECT * FROM `richestpeople`;");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getSinglePerson($Id = null)
    {
        $this->db->query("SELECT * FROM `richestpeople` WHERE `Id` = :Id");
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function deletePerson($Id)
    {
        $this->db->query("DELETE FROM richestpeople WHERE Id = :Id");
        $this->db->bind("Id", $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createPerson($post)
    {
        $this->db->query("INSERT INTO richestpeople(Id, name, networth, age, MyCompany) 
                            VALUES(:Id, :name, :networth, :age, :MyCompany)");

        $this->db->bind(':Id', NULL, PDO::PARAM_INT);
        $this->db->bind(':name', $post["name"], PDO::PARAM_STR);
        $this->db->bind(':networth', $post["networth"], PDO::PARAM_STR);
        $this->db->bind(':age', $post["age"], PDO::PARAM_INT);
        $this->db->bind(':MyCompany', $post["MyCompany"], PDO::PARAM_STR);

        return $this->db->execute();
    }
}
?>