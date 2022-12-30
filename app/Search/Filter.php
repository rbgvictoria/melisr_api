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

use Illuminate\Database\Eloquent\Builder;


class Filter {

    public static function apply(Builder $builder, $filter)
    {
        if (isset($filter['not']) && $filter['not']) {
            switch ($filter['operator']) {
                case 'empty':
                    return $builder->whereNotNull($filter['field']);
                    break;
                case 'like':
                    return $builder->where($filter['field'], 'not like', $filter['value']);
                    break;
                case 'contains':
                    return $builder->where($filter['field'], 'not like', "%{$filter['value']}%");
                    break;
                case 'startsWith':
                    return $builder->where($filter['field'], 'not like', "{$filter['value']}%");
                break;
                case 'eq':
                    return $builder->where($filter['field'], '!=', $filter['value']);
                    break;
                case 'in':
                    return $builder->whereNotIn($filter['field'], $filter['value']);
                    break;
                case 'lt':
                    return $builder->where($filter['field'], '!<', $filter['value']);
                    break;
                case 'lte':
                    return $builder->where($filter['field'], '!<=', $filter['value']);
                    break;
                case 'gt':
                    return $builder->where($filter['field'], '!>', $filter['value']);
                    break;
                case 'gte':
                    return $builder->where($filter['field'], '!>=', $filter['value']);
                    break;
                case 'between':
                    return $builder->whereNotBetween($filter['field'], $filter['value']);
                    break;
                default:
                    break;
    
            }
    
        }
        else {
            switch ($filter['operator']) {
                case 'empty':
                    return $builder->whereNull($filter['field']);
                    break;
                case 'like':
                    return $builder->where($filter['field'], 'like', $filter['value']);
                    break;
                case 'contains':
                    return $builder->where($filter['field'], 'like', "%{$filter['value']}%");
                    break;
                case 'startsWith':
                    return $builder->where($filter['field'], 'like', "{$filter['value']}%");
                    break;
                case 'eq':
                    return $builder->where($filter['field'], $filter['value']);
                    break;
                case 'in':
                    return $builder->where($filter['field'], $filter['value']);
                    break;
                case 'lt':
                    return $builder->where($filter['field'], '<', $filter['value']);
                    break;
                case 'lte':
                    return $builder->where($filter['field'], '<=', $filter['value']);
                    break;
                case 'gt':
                    return $builder->where($filter['field'], '>', $filter['value']);
                    break;
                case 'gte':
                    return $builder->where($filter['field'], '>=', $filter['value']);
                    break;
                case 'between':
                    return $builder->whereBetween($filter['field'], $filter['value']);
                    break;
                default:
                    break;
            }
        }
    }
}