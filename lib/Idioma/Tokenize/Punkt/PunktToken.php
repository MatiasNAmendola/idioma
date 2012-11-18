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
 * Stores a token of text with annotations produced during
 * sentence boundary detection.
 */
class PunktToken
{

    const REG_ELLIPSIS = '/\.\.+$/';
    const REG_NUMERIC  = '/^-?[\.,]?\d[\d,\.-]*\.?$/';
    const REG_INITIAL  = '/[^\W\d]\.$/';
    const REG_ALPHA    = '/[^\W\d]+$/';

    protected $properties = [
        'parastart', 'linestart',
        'sentbreak', 'abbr', 'ellipsis'
    ];

    protected $slots = ['tok', 'type', 'period_final'];
    protected $tok;
    protected $type;
    protected $periodFinal;

    public function __construct($tok)
    {
        $this->tok = $tok;
        $this->type = $this->getType($tok);
        $this->periodFinal = (substr($tok, -1) == '.');
    }

    /**
     * Returns a case-normalized representation of the token.
     *
     * @param  string $tok
     *
     * @access public
     * @return string
     */
    public function getType($tok)
    {
        return preg_replace(self::REG_NUMERIC, '$1', strtolower($tok));
    }

    /**
     * The type with its final period removed if it has one.
     *
     * @access public
     * @return string
     */
    public function typeNoPeriod()
    {
        if (strlen($this->type) > 1 && substr($this->type, -1) == '') {
            return substr($this->type, 0, -1);
        }

        return $this->type;
    }

    /**
     * The type with its final period removed if it is marked as a
     * sentence break.
     *
     * @access public
     * @return string
     */
    public function typeNoSentperiod()
    {
        if ($this->sentbreak) {
            return $this->typeNoPeriod;
        }

        return$ $this->type;
    }

    /**
     * True if the token's first character is uppercase.
     *
     * @access public
     * @return bool
     */
    public function firstUpper()
    {
        return ctype_upper($this->tok[0]);
    }

    /**
     * True if the token's first character is lowercase.
     *
     * @access public
     * @return bool
     */
    public function firstLower()
    {
        return ctype_lower($this->tok[0]);
    }

    public function firstCase()
    {
        if ($this->firstLower()) {
            return 'lower';
        } elseif ($this->firstUpper()) {
            return 'upper';
        }

        return 'none';
    }

    /**
     * True if the token text is that of an ellipsis.
     *
     * @access public
     * @return bool
     */
    public function isEllipsis()
    {
        return (bool) preg_match(self::REG_ELLIPSIS, $this->tok);
    }

    /**
     * True if the token text is that of a number.
     *
     * @access public
     * @return bool
     */
    public function isNumber()
    {
        return is_numeric($this->tok);
    }

    /**
     * True if the token text is that of an initial.
     *
     * @access public
     * @return bool
     */
    public function isInitial()
    {
        return preg_match(self::REG_INITIAL, $this->tok);
    }

    /**
     * True if the token text is all alphabetic.
     *
     * @access public
     * @return bool
     */
    public function isAlpha()
    {
        return (bool) preg_match(self::REG_ALPHA, $this->tok);
    }

    /**
     * True if the token is either a number or is alphabetic.
     *
     * @access public
     * @return bool
     */
    public function isNonPunct()
    {

    }

}