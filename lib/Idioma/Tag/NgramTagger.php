<?php

namespace Idioma\Tag;

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
class NgramTagger implements TaggerInterface
{

    protected $n;

    public function __construct($n)
    {
        $this->n = $n;
    }

    public function tag($tokens)
    {
        $tags = [];
        foreach (range(0, count($tokens) -1) as $i) {
            $tag = [];
            for ($j = 0; $j < $this->n; $j++) {
                if (isset($tokens[$i + $j])) {
                    $tag[] = $tokens[$i + $j];
                }
            }
            $tags[] = $tag;
        }
        return $tags;
    }

}