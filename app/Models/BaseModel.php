<?php

namespace App\Models;

use Altek\Accountant\Contracts\Recordable as IRecordable;
use Altek\Accountant\Recordable;
use Altek\Eventually\Eventually;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class BaseModel
 */
abstract class BaseModel extends Model implements IRecordable
{

    use Eventually, Recordable, Searchable;

    /**
     * Displayable Fields for export.
     *
     * @var array
     */
    public static $displayableFields = [];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    abstract public function searchableAs(): string;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    abstract public function toSearchableArray(): array;
}
