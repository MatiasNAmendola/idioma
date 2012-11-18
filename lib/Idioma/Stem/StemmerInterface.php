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

/**
 * A processing interface for removing morphological affixes from
 * words. This process is known as stemming.
 */
interface StemmerInterface
{

    /**
     * Strip affixes from the token and return the stem.
     *
     * @param  string $token The token that should be stemmed.
     *
     * @access public
     * @return string
     */
    public function stem($token);

}