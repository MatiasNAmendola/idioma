<?php

namespace Idioma\Stem;

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

use Idioma\Stem\StemmerInterface;

/**
 * A stemmer that uses regular expressions to identify morphological
 * affixes. Any substrings that match the regular expressions will
 * be removed.
 *
 *   $stemmer = new Idioma\Stem\RegexStemmer('/(ing$|s$|e$)/');
 *   $stemmer->stem('cars');
 */
class RegexStemmer implements StemmerInterface
{

    /**
     * The regular expression that should be used to identify morphological affixes.
     * @var string
     */
    protected $regex;

    /**
     * The minimum length of string to stem.
     * @var int
     */
    protected $min;

    /**
     * Public class constructor.
     *
     * @param  string $regex The regular expression that should be used to
     *                       identify morphological affixes.
     * @param  int    $min   The minimum length of string to stem.
     *
     * @access public
     */
    public function __construct($regex, $min = 0)
    {
        $this->regex = $regex;
        $this->min = $min;
    }

    /**
     * String affixes from the token and return the stem.
     *
     * @param  string $word The token that should be stemmed.
     *
     * @access public
     * @return mixed
     */
    public function stem($word)
    {
        if (strlen($word) < $this->min) {
            return $word;
        }

        return preg_replace($this->regex, '', $word);
    }

}