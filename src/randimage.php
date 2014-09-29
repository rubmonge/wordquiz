<?php

class RandImage {

    static public function image() {
        $images = glob(__DIR__ . '/../assets/img/inh/*');
        $n = rand(0, count($images) - 1);
        $aux = $images[$n];
        $aux = explode('assets', $aux);
        $image = "assets" . $aux[1];
        return $image;
    }

    static public function images() {
        $aimages = glob(__DIR__ . '/../assets/img/inh/*');
        foreach ($aimages as $image) {
            $aux = explode('assets', $image);
            $images[] = "assets" . $aux[1];
        }
        shuffle($images);
        return $images;
        ;
    }

}
