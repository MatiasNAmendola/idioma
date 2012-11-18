<?php

namespace Idioma\Classify;

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
 * A processing interface for labeling tokens with a single category
 * label (or "class"). Labels are typically strs or
 * ints, but can be any immutable type. The set of labels
 * that the classifier chooses from must be fixed and finite.
 */
interface ClassifierInterface
{

    /**
     * Given a set of training instances.
     *
     * @param  array $featuresets
     *
     * @access public
     * @return mixed
     */
    public function train(array $featuresets);


    /**
     * Use a trained set to predict a label given for an unlabelled instance.
     *
     * @access public
     * @return mixed
     */
    public function classify(array $featureset);

}