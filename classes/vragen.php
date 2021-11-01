<?php 
class Vragen {
    public $choices = [];

    public $id;
    public $title;

    private $sqlQuery;
    public function __construct()
    {
        require_once ('classes/db.php');
        require_once ('classes/sql.php');
        $database = new Dbconfig();
        $db = $database->getConnection();
        $this->sqlQuery = new Sql($db);
    }


    public function MultipleChoice()
    {
//        $count = 0;
//        $this->choices = $this->sqlQuery->GetChoices($this->id);
//        $html = "
//        <div class='inputWrapper'>
//            <label>{$this->title}</label>
//        </div>";
//        foreach ($this->choices as $item) {
//            $count++;
//            $html = $html . "<label for='input'>{$item['Antwoord']}</label>
//                      <input class='question-radioinput form-check-input' type='radio' name={$this->id} value='{$item['Antwoord']}'>";
//            //Check if question number is even
//            if ($count % 2 == 0) {
//                $html = $html."<br/>";
//            }
//        }
        $count = 0;
        $this->choices = $this->sqlQuery->GetChoices($this->id);
        $html = "
        <div class='inputWrapper'>
            <label>{$this->title}</label>
        </div>
        <table><tr>";
        foreach ($this->choices as $item) {
            $count++;
            $html = $html . "<th><label for='input' style='margin-left: 10px'>{$item['Antwoord']}</label></th>
                     <th><input class='question-radioinput form-check-input' type='radio' name={$this->id} value='{$item['Antwoord']}'></th>";
            if ($count % 2 == 0) {
                $html = $html."</tr><tr>";
            }
        }
        $html = $html. "</table>";

        return $html;

    }
    public function Test() {
        $count = 0;
        $this->choices = $this->sqlQuery->GetChoices($this->id);
        $html = "
        <div class='inputWrapper'>
            <label>wadap</label>
        </div>
        <table><tr>";
        foreach ($this->choices as $item) {
            $count++;
            $html = $html . "<th>Test</th>";
            if ($count % 2 == 0) {
                $html = $html."</tr><tr>";
            }
        }
        $html = $html. "</table>";

        return $html;
    }

    public function Boolean() {
        $html = "
                <div class='inputWrapper'>
                <label>{$this->title}</label>
                </div>
                <label for='input'>Ja</label>
                <input class='question-radioinput' type='radio' name={$this->id} value='ja'>
                <label for='input'>Nee</label>
                <input class='question-radioinput' type='radio' name={$this->id} value='nee'>
        ";

        return $html;

    }

    public function Number()
    {
        return "                
            <div class='inputWrapper'>
                <label for='input1'>{$this->title}</label>
                <input class='question-textinput' type='text' name={$this->id}>
            </div>";
    }

    public function CheckList()
    {
        $count = 0;
        $this->choices = $this->sqlQuery->GetChoices($this->id);
        $html = "             
        <div class='inputWrapper'>
            <label>{$this->title}</label>
        </div>
        <table><tr>";
        foreach ($this->choices as $item) {
            $count++;
            $html = $html . "<th><label for='input' style='margin-left: 10px'>{$item['Antwoord']}</label></th>
                            <th><input class='question-radioinput form-check-input' type='checkbox' name={$this->id}.[] value='{$item['Antwoord']}'></th>";
            //Check if question number is even
            if ($count % 2 == 0) {
                $html = $html."</tr><tr>";
            }
        }
        $html = $html. "</table>";


        return $html;
    }
}

