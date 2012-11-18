<?php

require_once __DIR__ . '/../autoloader.php';

$stemmer = new \Idioma\Stem\RegexStemmer('/(ing$|s$|e$)/', 4);
var_dump($stemmer->stem('cars'));
var_dump($stemmer->stem('mass'));
var_dump($stemmer->stem('was'));
var_dump($stemmer->stem('bee'));
var_dump($stemmer->stem('compute'));