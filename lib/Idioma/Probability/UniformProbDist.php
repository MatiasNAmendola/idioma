<?php

namespace Idioma\Probability;

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

use Idioma\Probability\ProbDistInterface;

/**
 * A probability distribution that assigns equal probability to each
 * sample in a given set; and a zero probability to all other samples.
 */
class UniformProbDist implements ProbDistInterface
{

    protected $samples = [];
    protected $prob = 0;

    /**
     * Construct a new uniform probability distribution, that assigns
     * equal probability to each sample in $sampels.
     *
     * @param  array $samples
     *
     * @access public
     */
    public function __construct($samples)
    {
        $this->samples = $samples;
        $this->prob = 1.0 / count($this->samples);
    }

    /**
     * Return the probability of this distribution.
     *
     * @param  string $sample
     *
     * @access public
     * @return float|int
     */
    public function prob($sample)
    {
        return in_array($sample, $this->samples) ? $this->prob : 0;
    }

    /**
     * Return a list of all samples.
     *
     * @access public
     * @return array
     */
    public function samples()
    {
        return $this->samples;
    }

}