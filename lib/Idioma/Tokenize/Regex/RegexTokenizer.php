<?php

namespace Idioma\Tokenize\Regex;

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
class RegexTokenizer
{

    protected $pattern;
    protected $gaps;
    protected $discardEmpty;
    protected $regex;

    public function __construct($pattern, $gaps = false, $discardEmpty = true)
    {
        $this->pattern = $pattern;
        $this->gaps = $gaps;
        $this->discardEmpty = $discardEmpty;
        $this->regex = $pattern;
    }

    public function tokenize($document)
    {
        if ($this->gaps) {
            if ($this->discardEmpty) {
                return array_filter(preg_split($this->pattern, $document), function($v) {
                    return !empty($v);
                });
            } else {
                return preg_split($this->pattern, $document);
            }
        } else {
            preg_match_all($this->pattern, $document, $matches);
            return $matches[0];
        }
    }

}