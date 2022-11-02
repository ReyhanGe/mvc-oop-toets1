<?php
class Insanlar extends Controller
{
    private $personModel;

    public function __construct()
    {
        $this->personModel = $this->model('Deneme');
    }

    public function index()
    {
        $personler = $this->personModel->getInsanlar();

        $rows = '';

        foreach ($personler as $value) {
            $rows .= "<tr>                        
                        <td>" . htmlentities($value->ad, ENT_QUOTES, 'ISO-8859-1') . "</td>
                        <td>" . htmlentities($value->soyad, ENT_QUOTES, 'ISO-8859-1') . "</td>
                        <td>" . htmlentities($value->yer, ENT_QUOTES, 'ISO-8859-1') . "</td>
                        <td><a href='" . URLROOT . "/personler/delete/$value->id'>delete</a></td>
                    </tr>";
        }

        $data = [
            'title' => "Landen van de wereld",
            'personler' => $rows
        ];
        $this->view('personler/index', $data);
    }

    public function delete($id)
    {
        $this->personModel->deleteDeneme($id);

        $data = [
            'deleteStatus' => "Het record met id = $id is verwijdert"
        ];
        $this->view("personler/delete", $data);
        header("Refresh:2; url=" . URLROOT . "/personler/index");
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            try {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->personModel->createDeneme($_POST);
                header("Location:" . URLROOT . "/personler/index");
            } catch (PDOException $e) {
                echo "Het inserten van het record is niet gelukt";
                header("Refresh:3; url=" . URLROOT . "/personler/index");
            }
        } else {
            $data = [
                'title' => "Voeg een niew land in"
            ];
            $this->view("personler/create", $data);
        }
    }
}
?>