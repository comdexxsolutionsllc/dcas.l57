<?php

namespace App\Http\Controllers;

use App\General\DCASHelper;
use Laracsv\Export;

class CSVExporter extends Controller
{

    /**
     * @var \Laracsv\Export
     */
    protected $csvExporter;

    /**
     * CSVExporter constructor.
     *
     * @param \Laracsv\Export $csvExporter
     */
    public function __construct(Export $csvExporter)
    {
        $this->middleware(['auth']);

        $this->csvExporter = $csvExporter;
    }

    /**
     * Download CSV File.
     *
     * @param null $file
     */
    public function __invoke($file = null)
    {
        $query = request()->query;

        $model = DCASHelper::get_model($query);

        $file = $this->csvExporter->build($model::get(), $model::$displayableFields);

        $file->download($query->get('file'));
    }
}
