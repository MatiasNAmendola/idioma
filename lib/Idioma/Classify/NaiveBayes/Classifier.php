<?php

namespace Idioma\Classify\NaiveBayes;

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

use Idioma\Classify\ClassifierInterface;
use Idioma\Probability\FreqDist;

/**
 * A Naive Bayes classifier. Naive Bayes classifiers are
 * parameterized by two probability distributions:
 *
 *   - P(label) gives the probability that an input will receive each
 *     label, given no information about the input's features.
 *
 *   - P(fname=fval|label) gives the probability that a given feature
 *     (fname) will receive a given value (fval), given that the
 *     label (label).
 *
 * If the classifier encounters an input with a feature that has
 * never been seen with any label, then rather than assigning a
 * probability of 0 to all labels, it will ignore that feature.
 *
 * The feature value 'null' is reserved for unseen feature values;
 * you generally should not use 'null' as a feature value for one of
 * your own features.
 */
class Classifier implements ClassifierInterface
{

    protected $labels = [];
    protected $n = 0;

    public function train(array $featuresets)
    {
        $n = $this->n;
        $sets = [];
        foreach ($featuresets as $featureset) {
            $tokens = $featureset[0];
            $label  = $featureset[1];

            if (!isset($sets[$label])) {
                $sets[$label] = new FreqDist;
            }

            foreach ($tokens as $token) {
                $sets[$label]->inc($token);
                $n++;
            }
        }

        $this->labels = $sets;
        $this->n = $n;
    }

    public function classify(array $tokens)
    {
        $score = [];
        $tokenDist = new FreqDist($tokens);
        foreach ($this->labels as $label => $words) {
            $score[$label] = 0;
            foreach ($tokenDist->samples() as $word => $count) {
                $samples = $words->samples();
                $s = isset($samples[$word]) ? $samples[$word] : 0.1;
                $score[$label] = log($s / (float) count($words->samples()));
            }
        }

        return $score;
    }

}