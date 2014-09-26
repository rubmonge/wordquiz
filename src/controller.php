<?php

require 'config.php';
require 'state.php';
$state = new State();

$data['new_clue'] = false;
$word = filter_input(INPUT_POST, 'word', FILTER_DEFAULT);
if (strlen(trim($word))) {
    $state->addTry()->addWord($word);
    if (!(count($state->state['words']) % $wordsForClue)) {
        $data['new_clue'] = true;
        $state->addClue();
    }
    $state->writeFile();

    $data['validation'] = $validations[rand(0, count($validations) - 1)];
    $data['validation'] = str_replace('##REPLACE##', ucfirst($word), $data['validation']);
}
$data['message'] = $messages[rand(0, count($messages) - 1)];

$data['tries'] = $state->state['tries'];

$data['clues'] = array();
for ($i = 0; $i < $state->state['clues']; $i++) {
    if (isset($clues[$i])) {
        $data['clues'][$i] = $clues[$i];
    }
}
$data['words'] = $state->state['words'];
