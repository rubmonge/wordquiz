<?php

class State {

    public $filename = 'src/state.txt';
    public $state = null;

    public function __construct() {
        if ($this->checkIfFileExists()) {
            $this->readFile();
        } else {
            $this->initState()->writeFile();
        }
    }

    public function addWord($word) {
        if (!in_array($word, $this->state['words'])) {
            array_push($this->state['words'], $word);
            sort($this->state['words']);
        }
        return $this;
    }

    public function addTry() {
        $this->state['tries'] ++;
        return $this;
    }

    public function addClue() {
        $this->state[$this->state['level']]['clues'] ++;
        return $this;
    }

    public function addLevel() {
        $this->state['level'] ++;
        return $this;
    }

    private function checkIfFileExists() {
        if (is_file($this->filename))
            return true;
        return false;
    }

    private function initState() {
        $this->state = array(
            'level' => 0,
            'words' => array(),
            'tries' => 0,
            0 => array(
                'clues' => 0,
            )
        );
        return $this;
    }

    private function readFile() {
        $aux = file_get_contents($this->filename);
        $this->state = json_decode($aux, true);
        return $this;
    }

    public function writeFile() {
        $aux = file_put_contents($this->filename, json_encode($this->state));
        return $this;
    }

    public function sendMail($message) {
        $para = 'rubenmonge@gmail.com';
        $titulo = 'Han pasado de nivel';
        $mensaje = $message;
        $cabeceras = 'From: rubenmonge@gmail.com' . "\r\n" .
                'Reply-To: rubenmonge@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($para, $titulo, $mensaje, $cabeceras);
    }

}
