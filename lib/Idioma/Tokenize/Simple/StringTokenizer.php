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

/**
 *
 */
class StringTokenizer implements TokenizerInterface
{

    public function tokenize($document)
    {
        return explode($this->string, $document);
    }

}