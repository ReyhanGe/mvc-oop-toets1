<?php
class Insanlar extends Controller
{
    private $personModel;

    public function __construct()
    {
        $this->personModel = $this->model('Person');
    }

    public function index()
    {
        $insanlar = $this->personModel->getInsanlar();

        $rows = '';

        foreach ($insanlar as $value) {
            $rows .= "<tr>                        
            <td>" . htmlentities($value->name, ENT_QUOTES, 'ISO-8859-1') . "</td>
            <td>" . htmlentities($value->networth, ENT_QUOTES, 'ISO-8859-1') . "</td>
            <td>" . htmlentities($value->age, ENT_QUOTES, 'ISO-8859-1') . "</td>
            <td>" . htmlentities($value->MyCompany, ENT_QUOTES, 'ISO-8859-1') . "</td>
                        <td><a href='" . URLROOT . "/insanlar/delete/$value->id'>delete</a></td>
                    </tr>";
        }

        $data = [
            'title' => "Landen van de wereld",
            'insanlar' => $rows
        ];
        $this->view('insanlar/index', $data);
    }

    public function delete($id)
    {
        $this->personModel->deletePerson($id);

        $data = [
            'deleteStatus' => "Het record met id = $id is verwijdert"
        ];
        $this->view("insanlar/delete", $data);
        header("Refresh:2; url=" . URLROOT . "/insanlar/index");
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            try {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->personModel->createPerson($_POST);
                header("Location:" . URLROOT . "/insanlar/index");
            } catch (PDOException $e) {
                echo "Het inserten van het record is niet gelukt";
                header("Refresh:3; url=" . URLROOT . "/insanlar/index");
            }
        } else {
            $data = [
                'title' => "Voeg een niew land in"
            ];
            $this->view("insanlar/create", $data);
        }
    }
}
?>