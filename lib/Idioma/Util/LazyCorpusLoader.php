<?php

namespace Idioma\Util;

/**
 * Copyright (C) 2012-2013 Jelle Spekken
 *
 * Licensed under the Apache License, Version 2.0 (the 'License');
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an 'AS IS' BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 *
 */
class LazyCorpusLoader
{

    protected $words = [];

    public function __construct($name)
    {
        $filename = str_replace('.', DIRECTORY_SEPARATOR, $name);
        $path = realpath(__DIR__.'/../../../corpora');

        $words = [];
        $fh = fopen($path.'/'.$filename, 'r');
        while(!feof($fh)) {
            $words[] = trim(fgets($fh));
        }

        $this->words = $words;
    }

    public function words()
    {
        return $this->words;
    }

}