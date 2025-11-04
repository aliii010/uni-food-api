<?php

namespace App\Http\filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter {
    protected $builder;
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    /*
        $request->all() is something like that:
        [
            "include": "relationship name",
            "filter": [
                "attribute": "Value1,Value2",
                "attribute2": "Value1"
            ]
        ]
    */
    public function apply(Builder $builder) {
        $this->builder = $builder;

        foreach($this->request->all() as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }

        return $builder;
    }

    public function filter($filtersArray) {
        foreach($filtersArray as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }

        return $this->builder;
    }

}