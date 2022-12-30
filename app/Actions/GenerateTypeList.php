<?php
// Copyright 0000-12-30 00:00:00 Royal Botanic Gardens Board
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class GenerateTypeList {

    public function __invoke()
    {
        $result = DB::connection('information_schema')
                ->select("select t.table_name, u.column_name
            from TABLES t
            join KEY_COLUMN_USAGE u on t.TABLE_SCHEMA=u.TABLE_SCHEMA and t.TABLE_NAME=u.TABLE_NAME and u.CONSTRAINT_NAME='PRIMARY'
            where t.TABLE_SCHEMA='melisr'");

        $tables_to_exclude = config('melisr-api.exclude_tables');
        $list = [];
        foreach ($result as $row) {
            if (!in_array($row->table_name, $tables_to_exclude)) {
                $type = substr($row->column_name, 0, strlen($row->column_name)-2);

                if (strtolower($type) != $row->table_name) {
                    if (substr($row->table_name, -4) == 'attr') {
                        switch($row->table_name) {
                            case 'collectingeventattr':
                                $type = 'CollectingEventAttribute';
                                break;
                            case 'collectionobjectattr':
                                $type = 'CollectionObjectAttr';
                                break;
                            case 'preparationattr':
                                $type = 'PreparationAttr';
                                break;
                        };
                    }
                    else {
                        $type = ucfirst($row->table_name);
                    }
                }

                $list[$row->table_name] = $type;
            }
        }
        return $list;
    }
}
