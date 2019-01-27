<?php

return [

    /*
|--------------------------------------------------------------------------
| CodeGenerator config overrides
|--------------------------------------------------------------------------
|
| It is a good idea to sperate your configuration form the code-generator's
| own configuration. This way you won't lose any settings/preference
| you have when upgrading to a new version of the package.
|
| Additionally, you will always know any the configuration difference between
| the default config than your own.
|
| To override the setting that is found in the codegenerator.php file, you'll
| need to create identical key here with a different value
|
| IMPORTANT: When overriding an option that is an array, the configurations
| are merged together using php's array_merge() function. This means that
| any option that you list here will take presence during a conflict in keys.
|
| EXAMPLE: The following addition to this file, will add another entry in
| the common_definitions collection
|
|   'common_definitions' =>
|   [
|       [
|           'match' => '*_at',
|           'set' => [
|               'css-class' => 'datetime-picker',
|           ],
|       ],
|   ],
|
 */

    'irregular_plurals' => [
        'software'    => 'software',
        'information' => 'information',
        'info'        => 'info',
    ],

    'organize_migrations' => true,

    'plural_names_for' => [
        'controller-name'    => false,
        'request-form-name'  => false,
        'route-group'        => true,
        'language-file-name' => true,
        'resource-file-name' => true,
        'table-name'         => true,
    ],

    'controllers_path' => 'Http/Controllers/GENERATED',

    'form_requests_path' => 'Http/Requests/GENERATED',

    'languages_path' => 'resources/lang/GENERATED',

    'models_path' => 'Models/GENERATED',
];
