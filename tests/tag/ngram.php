<?php

require_once __DIR__.'/../autoloader.php';

$document = 'Dit is een lekkere test.';
$tokens   = (new \Idioma\Tokenize\Simple\SpaceTokenizer())->tokenize($document);

$tagger   = (new \Idioma\Tag\NgramTagger(2))->tag($tokens);
var_dump($tagger);