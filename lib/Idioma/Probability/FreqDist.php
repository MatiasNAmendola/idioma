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

/**
 * A frequency distribution for the outcomes of an experiment. A
 * frequency distribution records the number of times each outcome of
 * an experiment has occurred. For example, a frequency distribution
 * could be used to record the frequency of each word type in a
 * document. Formally, a frequency distribution can be defined as a
 * function mapping from each sample to the number of times that
 * sample occurred as an outcome.
 *
 * Frequency distributions are generally constructed by running a
 * number of experiments, and incrementing the count for a sample
 * every time it is an outcome of an experiment. For example, the
 * following code will produce a frequency distribution that encodes
 * how often each word occurs in a test:
 *
 *   $document = 'this is an example sentence';
 *   $fdist    = new Idioma\Probability\FreqDist;
 *   foreach ((new Idioma\Tokenize\Regex\WhitespaceTokenizer())->tokenize($fdist) as $token) {
 *     $fdist->inc($token);
 *   }
 */
class FreqDist
{

    protected $n = 0;
    protected $samples = [];

    /**
     * Construct a new frequency distribution. If $samples is
     * given, then the frequency distribution will be initialized
     * with the count of each object in $samples; otherwise, it
     * will be initialized to be empty.
     *
     * @param  null $samples The samples to initialize the frequency
     *                       distribution with
     *
     * @access public
     */
    public function __construct($samples = null)
    {
        $this->n = 0;
        if ($samples !== null) {
            $this->update($samples);
        }
    }

    /**
     * Increment this FreqDist's count for the given sample.
     *
     * @param  $sample The sample whose count should be incremented.
     *
     * @access public
     * @return void
     */
    public function inc($sample)
    {
        !isset($this->samples[$sample]) ? $this->samples[$sample] = 1 : $this->samples[$sample]++;
        $this->n++;
    }

    /**
     * Update the frequency distribution with the provided list of samples.
     * This is a faster way to add multiple samples to the distribution.
     *
     * @param  $samples The samples to add.
     *
     * @access public
     * @return void
     */
    public function update($samples)
    {
        foreach ($samples as $sample) {
            $this->inc($sample);
        }
    }

    /**
     * Return the total number of sample outcomes that have been
     * recorded by this FreqDist. For the number of unique
     * sample values (or bins) with counts greater than zero,
     * use FreqDist->b()
     *
     * @access public
     * @return int
     */
    public function n()
    {
        return $this->n;
    }

    /**
     * Return the total number of sample values (or "bins") that
     * have counts greater than zero. For the total
     * number of sample outcomes recorded, use FreqDist->n()
     *
     * @access public
     * @return int
     */
    public function b()
    {
        $samples = [];
        foreach ($this->samples() as $sample => $count) {
            $samples[$sample] = true;
        }
        return count($samples);
    }

    /**
     * Return the frequency of a given sample. The frequency of a
     * sample is defined as the count of that sample divided by the
     * total number of sample outcomes that have been recorded by
     * this FreqDist. The count of a sample is defined as the
     * number of times that sample outcome was recordedby this
     * FreqDist. Frequencies are always real numbers in the range
     * [0, 1]
     *
     * @param  mixed $sample The sample whose frequency should
     *                       be returned.
     *
     * @access public
     * @return float|int
     */
    public function freq($sample)
    {
        if ($this->n == 0 || !isset($this->samples[$sample])) {
            return 0;
        }

        return (float) $this->samples[$sample] / $this->n;
    }

    /**
     * Return the sample with the greatest number of outcomes in this
     * frequency distribution. if two or more samples have the same
     * number of outcomes, return one of them; which sample is
     * returned is undefined. If no outcome have occurred in this
     * frequency distribution, return null.
     *
     * @access public
     * @return mixed
     * @throws \Exception
     */
    public function max()
    {
        if ($this->n == 0) {
            throw new \Exception('A FreqDist must have at least one sample before max is defined.');
        }

        $samples = $this->samples;
        arsort($samples);
        return key($samples);
    }

    /**
     * Return a list of all samples that have been recorded as
     * outcomes by this frequency distribution.
     *
     * @access public
     * @return array
     */
    public function samples($sort = false)
    {
        $samples = $this->samples;
        if ($sort === true) {
            arsort($samples);
        }

        return $samples;
    }

}