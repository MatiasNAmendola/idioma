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
use Idioma\Probability\FreqDist;

/**
 * The maximum likelihood estimate for the probability distribution
 * of the experiment used to generate a frequency distribution. The
 * "maximum likelihood estimate" approximates the probability of
 * each sample as the frequency of that sample in the frequency
 * distribution.
 */
class MLEProbDist implements ProbDistInterface
{

    protected $freqdist;

    public function __construct(FreqDist $freqdist)
    {
        $this->freqdist = $freqdist;
    }

    public function freqdist()
    {
        return $this->freqdist;
    }

    public function prob($sample)
    {
        return $this->freqdist()->freq($sample);
    }

    public function max()
    {
        return $this->freqdist()->max();
    }

    public function samples()
    {
        return $this->freqdist()->keys();
    }

}