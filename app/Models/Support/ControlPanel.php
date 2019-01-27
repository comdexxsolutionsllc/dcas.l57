<?php

namespace App\Models\Support;

use App\Models\BaseModel;

/**
 * App\Models\Support\ControlPanel
 *
 * @property int                             $id
 * @property string                          $control_panel
 * @property int                             $free
 * @property string                          $frontend
 * @property string                          $backend
 * @property string                          $databases
 * @property string                          $dns
 * @property string                          $ftp
 * @property string                          $email
 * @property int                             $multi_server
 * @property string                          $operating_system
 * @property int                             $ipv6_enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereBackend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereControlPanel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereDatabases($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereDns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereFrontend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereFtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereIpv6Enabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereMultiServer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereOperatingSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Support\ControlPanel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ControlPanel extends BaseModel
{

    /**
     * @var array
     */
    protected $fillable = [
        'control_panel',
        'free',
        'frontend',
        'backend',
        'databases',
        'dns',
        'ftp',
        'email',
        'multi_server',
        'operating_system',
        'ipv6_enabled',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'controlpanel_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
