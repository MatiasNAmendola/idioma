<?php

require_once __DIR__ . '/../autoloader.php';

$document = 'This really is a great test, would you like to do some tests, my name is Jelle Spekken';
$stemmer  = (new \Idioma\Stem\PorterStemmer());

$tokens = [];
foreach ((new \Idioma\Tokenize\Regex\WordPunctTokenizer())->tokenize($document) as $token) {
    $tokens[] = $stemmer->stem($token);
}

var_dump($tokens);