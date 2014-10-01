<?php

require 'state.php';
require 'check.php';
require 'randimage.php';
require 'config.php';


$state = new State();
$check = new Check($state->state['level'], $words);

$data['new_clue'] = false;
$data['end_of_game'] = false;
$data['image'] = RandImage::image();

$word = filter_input(INPUT_POST, 'word', FILTER_DEFAULT);

if (strlen(trim($word))) {
    $state->addTry()->addWord($word);

    if ($check->check($word)) {
        /* Acierta la palabra -> subimos nivel */
        $data['hit'] = $answers[$state->state['level']];
        $state->addLevel()->sendMail('Han pasado al nivel: '.$state->state['level']);
        
    } else {
        /* No acierta -> nos reimos un poco */
        if (!(count($state->state['words']) % $wordsForClue)) {
            $data['new_clue'] = true;
            $state->addClue();
        }
        $data['validation'] = $validations[rand(0, count($validations) - 1)];
        $data['validation'] = str_replace('##REPLACE##', ucfirst($word), $data['validation']);
    }

    $state->writeFile();
}
if ($check->endOfGame($state->state['level'])) {
    $data['end_of_game'] = true;
    $data['hit'] = $answers[$state->state['level']];
    $state->sendMail('Se han pasado el juego');
}

$data['message'] = $messages[rand(0, count($messages) - 1)];
$data['tries'] = $state->state['tries'];
$data['level'] = $state->state['level'];

$data['clues'] = array();

for ($i = 0; $i < $state->state[$state->state['level']]['clues']; $i++) {
    if (isset($clues[$state->state['level']][$i])) {
        $data['clues'][$i] = $clues[$state->state['level']][$i];
        $data['current_clue'] = $data['clues'][$i];
    }
}

$data['words'] = $state->state['words'];
