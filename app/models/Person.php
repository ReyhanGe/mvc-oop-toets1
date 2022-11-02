<?php

class Person
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPersonler()
    {
        $this->db->query("SELECT * FROM `richestpeople`;");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getSinglePerson($id = null)
    {
        $this->db->query("SELECT * FROM `richestpeople` WHERE `id` = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function deletePerson($id)
    {
        $this->db->query("DELETE FROM richestpeople WHERE id = :id");
        $this->db->bind("id", $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createPerson($post)
    {
        $this->db->query("INSERT INTO richestpeople(id, name, networth, age, MyCompany) 
                            VALUES(:id, :name, :networth, :age, :MyCompany)");

        $this->db->bind(':id', NULL, PDO::PARAM_INT);
        $this->db->bind(':name', $post["name"], PDO::PARAM_STR);
        $this->db->bind(':networth', $post["networth"], PDO::PARAM_STR);
        $this->db->bind(':age', $post["age"], PDO::PARAM_INT);
        $this->db->bind(':MyCompany', $post["MyCompany"], PDO::PARAM_STR);
        return $this->db->execute();
    }
}
?>






<td>" . htmlentities($value->name, ENT_QUOTES, 'ISO-8859-1') . "</td>
                        <td>" . htmlentities($value->networth, ENT_QUOTES, 'ISO-8859-1') . "</td>
                        <td>" . htmlentities($value->age, ENT_QUOTES, 'ISO-8859-1') . "</td>
                        <td>" . htmlentities($value->MyCompany, ENT_QUOTES, 'ISO-8859-1') . "</td>
                        