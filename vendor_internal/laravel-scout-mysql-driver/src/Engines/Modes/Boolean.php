<?php

namespace ComdexxSolutionsLLC\MySQLScout\Engines\Modes;

use Laravel\Scout\Builder;

class Boolean extends Mode
{

    public function buildParams(Builder $builder)
    {
        $this->whereParams[] = $builder->query;

        return $this->whereParams;
    }

    public function buildWhereRawString(Builder $builder)
    {
        $queryString = '';

        $queryString .= $this->buildWheres($builder);

        $indexFields = implode(',', $this->modelService->setModel($builder->model)->getFullTextIndexFields());

        $queryString .= "MATCH($indexFields) AGAINST(? IN BOOLEAN MODE)";

        return $queryString;
    }

    public function isFullText()
    {
        return true;
    }
}
