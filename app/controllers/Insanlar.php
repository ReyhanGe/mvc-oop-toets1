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
            <td>" . htmlentities($value->Name, ENT_QUOTES, 'ISO-8859-1') . "</td>
            <td>" . htmlentities($value->Networth, ENT_QUOTES, 'ISO-8859-1') . "</td>
            <td>" . number_format($value->Age, 0, ',', '.') . "</td>
            <td>" . htmlentities($value->MyCompany, ENT_QUOTES, 'ISO-8859-1') . "</td>
                <td><a href='" . URLROOT . "/insanlar/delete/$value->Id'>delete</a></td>
                    </tr>";
        }

        $data = [
            'title' => "Landen van de wereld",
            'insanlar' => $rows
        ];
        $this->view('insanlar/index', $data);
    }

    public function delete($Id)
    {
        $this->personModel->deletePerson($Id);

        $data = [
            'deleteStatus' => "Het record met id = $Id is verwijdert"
        ];
        $this->view("insanlar/delete", $data);
        header("Refresh:2; url=" . URLROOT . "/insanlar/index");
    }

}
?>