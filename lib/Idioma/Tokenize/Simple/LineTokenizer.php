<?php

namespace Idioma\Tokenize\Simple;

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

use Idioma\Tokenize\Simple\TokenizerInterface;
use Idioma\Tokenize\Simple\TokenizerException;

/**
 *
 */
class LineTokenizer implements TokenizerInterface
{

    protected $blanklines;

    public function __construct($blanklines = 'discard')
    {
        $validBlanklines = ['discard', 'keep', 'discard-eof'];
        if (!in_array($blanklines, $validBlanklines)) {
            throw new TokenizerException(sprintf('Blank lines must be one of: %s', implode(', ', $validBlanklines)));
        }

        $this->blanklines = $blanklines;
    }

    public function tokenize($document)
    {
        $lines = explode("\n", $document);
        if ($this->blanklines == 'discard') {
            foreach ($lines as $key => $line) {
                $lines[$key] = rtrim($line);
            }
        } elseif ($this->blanklines == 'discard-eof') {
            if (!empty($lines)) {
                array_pop($lines);
            }
        }

        return $lines;
    }

}