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



namespace App\Search;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

/**
 * Description of Search
 *
 * @author Niels.Klazenga <Niels.Klazenga at rbg.vic.gov.au>
 */
class Search {
    
    /**
     * 
     * @param Request $request
     * @return Builder
     */
    public static function apply($model, $filter)
    {
        Log::debug(json_encode($filter));

        //$filters = self::parseFilters($filter);

        $query = (new $model)->newQuery();

        $query = static::applyDecoratorsFromRequest($filter, $query);

        Log::debug($query->getBindings());
        Log::debug($query->toSql());

        return $query;
    }

    /**
     * 
     * @param Request $request
     * @param Builder $query
     * @return Builder
     */
    private static function applyDecoratorsFromRequest($filters, Builder $query)
    {
        if ($filters) {
            $operators = ['eq', 'lt', 'lte', 'gt', 'gte', 'contains', 'like', 'in', 'empty', 'not', 'startsWith'];
            foreach ($filters as $field => $filter) {
                Log::debug(json_encode($filter));
                if (is_array($filter)) {
                    if (in_array(key(array_slice($filter, 0, 1)), $operators)) {
                        $filter1 = [];
                        $filter1['field'] = $field;
                        foreach ($filter as $k => $value) {
                            if ($k == 'not') {
                                $filter1['not'] = true;
                            }
                            else {
                                $filter1['operator'] = $k;
                                $filter1['value'] = $value;
                            }
                        }
                        $query = \App\Search\Filter::apply($query, $filter1);
                    }
                    else {
                        $query = $query->whereHas($field, function($query) use ($filter) {
                            return self::applyDecoratorsFromRequest($filter, $query);
                        });
                    }
                }
            }
    
        }
        return $query;
    }
}


