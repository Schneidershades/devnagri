<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\Api\ApiResponder;
use Illuminate\Support\Facades\Schema;

class Controller extends BaseController
{
    use ApiResponder, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getColumns($table)
    {
        $columns = Schema::getColumnListing($table);
        return $columns;
    }

    public function requestAndDbIntersection($request, $model, array $excludeFieldsForLogic = [], array $includeFields = [])
    {
        $excludeColumns = array_diff($request->all(), $excludeFieldsForLogic);

        $allReadyColumns = array_merge($excludeColumns, $includeFields);

        $requestColumns = array_keys($allReadyColumns);

        $tableColumns = $this->getColumns($model->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $model->{$field} = $allReadyColumns[$field];
        }

        return $model;
    }
}
