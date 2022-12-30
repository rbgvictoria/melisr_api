<?php

/**
 * Copyright 2020 Royal Botanic Gardens Victoria
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace App\Services;

use App\Models\CollectionObject;
use App\Models\Determination;
use App\Models\Loan;
use App\Models\LoanPreparation;
use App\Search\Search;
use Illuminate\Database\Eloquent\Builder;

class SearchService {

    /**
     * @param [type] $root
     * @param array $args
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function collectionObjectSearch($root, array $args): Builder
    {
        $filter = isset($args['filter']) ? $args['filter'] : null;
        return Search::apply(CollectionObject::class, $filter);
    }

    /**
     * @param [type] $root
     * @param array $args
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function determinationSearch($root, array $args): Builder
    {
        $filter = isset($args['filter']) ? $args['filter'] : null;
        return Search::apply(Determination::class, $filter);
    }

    /**
     * @param [type] $root
     * @param array $args
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function loanSearch($root, array $args): Builder
    {
        $query = (new \App\Models\Loan)->newQuery();
        if (isset($args['addressOfRecord'])) {
            $query = $query->where('AddressOfRecordID', $args['addressOfRecord']);
        }
        return $query;
    }

    /**
     * @param [type] $root
     * @param array $args
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function loanAdvSearch($root, array $args): Builder
    {
        $filter = isset($args['filter']) ? $args['filter'] : null;
        return Search::apply(Loan::class, $filter);
    }

    public function loanPreparationsByLoan($root, array $args): Builder
    {
        $query = (new LoanPreparation)->newQuery();
        $query = $query->where('LoanID', $args['loanID']);
        return $query;
    }

}


