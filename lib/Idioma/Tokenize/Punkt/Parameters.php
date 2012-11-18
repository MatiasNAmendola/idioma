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
 * Stores data used to perform sentence boundary detection with Punkt.
 */
class Parameters
{

    /**
     * A set of word types for known abbreviations.
     * @var array
     */
    protected $abbrevTypes;

    /**
     * A set of word type arrays for known common collocations
     * where the first word ends in a period. E.g., ('S.', 'Bach')
     * is a common collocation in a text that discusses 'Johann
     * S. Back'. These count as negative evidence for sentence
     * boundaries.
     * @var array
     */
    protected $collocations;

    /**
     * A set of word types for words that often appear at the
     * beginning of sentences.
     * @var array
     */
    protected $sentStarters;

    /**
     * A array mapping word types to the set of orthographic
     * contexts that word type appears in. Contexts are represented
     * by adding orthographic context flags: ...
     * @var array
     */
    protected $orthoContext;

    public function __construct()
    {
        $this->abbrevTypes = [];
        $this->collocations = [];
        $this->sentStarters = [];
        $this->orthoContext = [];
    }

    public function clearAbbrevs()
    {
        $this->abbrevTypes = [];
    }

    public function clearCollocations()
    {
        $this->collocations = [];
    }

    public function clearSentStarters()
    {
        $this->sentStarters = [];
    }

    public function clearOrthoContext()
    {
        $this->orthoContext = [];
    }

    public function addOrthoContext($typ, $flag)
    {
        $this->orthoContext[$typ] |= $flag;
    }

}