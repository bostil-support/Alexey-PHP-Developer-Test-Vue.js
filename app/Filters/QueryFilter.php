<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class QueryFilter
{
    protected Request $request;

    protected Builder $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = Str::camel($field);
            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], [$value]);
            }
        }
    }

    protected function fields(): array
    {
        return array_filter(
            array_map(function ($val) {
                if (!is_iterable($val)) {
                   return trim($val);
                }
                return $val;
            }, $this->request->all())
        );
    }
}
