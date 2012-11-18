<?php

namespace Idioma\Tokenize\Punkt;

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
 * Stores variables, mostly regular expressions, which may be
 * language-dependent for correct application of the algorithm.
 * An extension of this class may modify its properties to suit
 * a language other than English; an instance can then be passed
 * as an argument to Idioma\Tokenize\Punkt\SentenceTokenizer and
 * Idioma\Tokenize\Punkt\Trainer constructors.
 */
class LanguageVars
{

    /**
     * Characters which are candidates for sentence boundaries.
     * @var array
     */
    protected $sentEndChars = ['.', '?', '!'];

    /**
     * Sentence internal punctuation, which indicates an abbreviation if
     * preceded by a period-final token.
     * @var string
     */
    protected $internalPunctuation = ',:;';

    /**
     * Used to realign punctuation that should be included in a sentence
     * although it follows the period (or ?, !).
     * @var string
     */
    protected $boundaryRealignment = '/["\')\]}]+?(?:\s+|(?=--)|$)/';

    /**
     * Excludes some characters from starting word tokens.
     * @var string
     */
    protected $wordStart = '/[^\(\"\`{\[:;&\#\*@\)}\]\-,]/';

    /**
     * Characters that cannot appear within words.
     * @var string
     */
    protected $nonWordChars = '/(?:[?!)\";}\]\*:@\'\({\[])/';

    /**
     * Hyphen and ellipsis are multi-character punctuation
     * @var string
     */
    protected $multiCharPunct = '/(?:\-{2,}|\.{2,}|(?:\.\s){2,}\.)/';

    /**
     * @access public
     * @return string
     * @static
     */
    public static function sentEndChars()
    {
        return sprintf('[%s]', implode('', self::sentEndChars));
    }

    /**
     * Tokenize a string to split off punctuation other than periods.
     *
     * @param  string $s
     *
     * @access public
     * @return string
     */
    public function wordTokenize($s)
    {

    }

}