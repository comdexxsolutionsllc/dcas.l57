<?php

namespace App\General;

use App\Models\Roles\RoleCollection;
use Illuminate\Support\Facades\Auth;

/**
 * Helper Class
 */
class DCASHelper
{

    /**
     * Get currently used guard name with path.
     *
     * @return array
     */
    public static function getGuardBuildMenu()
    {
        return ('\\App\\Models\\Roles\\' . ucfirst(self::getGuard()))::buildMenu();
    }

    /**
     * Get currently used guard name.
     *
     * @return string
     */
    public static function getGuard()
    {
        $guards = RoleCollection::factory();

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }
    }

    /**
     * Get middleware name.
     *
     * @return string
     */
    public static function getMiddleware()
    {
        return 'auth:' . self::getGuard();
    }

    /**
     * Create hardware serial number.
     *
     * @return string
     *
     * @uses \format 4CE0460D0G.
     */
    public static function make_serial_number(): string
    {
        $alpha = range('A', 'Z');
        $numbers = range(0, 9);

        $secondValues = array_rand($alpha, 2);
        $thirdValues = array_rand($numbers, 4);

        $serialNumber = $numbers[array_rand($numbers)] . $alpha[$secondValues[0]] . $alpha[$secondValues[1]] . $numbers[$thirdValues[0]] . $numbers[$thirdValues[1]] . $numbers[$thirdValues[2]] . $numbers[$thirdValues[3]] . $alpha[array_rand($alpha)] . $numbers[array_rand($numbers)] . $alpha[array_rand($alpha)];

        return $serialNumber;
    }

    /**
     * Create random password.
     *
     * @return string
     */
    public static function random_password(): string
    {
        return substr(\Hash::make(str_random(15)), - 26, - 1);
    }

    /**
     * Get all roles.
     *
     * @return array
     */
    public static function get_roles(): array
    {
        $output = [];

        $files = \File::files(app_path('/Models/Roles'));

        foreach ($files as $file) {
            if ($file->getFilename() !== 'BaseRole.php') {
                array_push($output, strtolower(preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($file))));
            }
        }

        $output = array_diff($output, ['irole', 'rolecollection']);

        return $output;
    }

    /**
     * Get all models.
     *
     * @param bool $withoutPath
     *
     * @return array
     */
    public static function get_models($withoutPath = false): array
    {
        $files = \File::allFiles(app_path('Models'));
        $fileList = [];

        if ($withoutPath) {
            foreach ($files as $file) {
                array_push($fileList, explode('.php', $file->getFilename())[0]);
            }

            return $fileList;
        }

        // optimize this mess.
        foreach ($files as $file) {
            foreach (explode(app_path(), $file) as $f) {
                foreach (explode('.php', $f) as $modelList) {
                    if ($modelList != "") {
                        array_push($fileList, '\App' . str_replace('/', '\\', $modelList));
                    }
                }
            }
        }

        return $fileList;
    }

    /**
     * Find a model.
     *
     * @param $query
     *
     * @return mixed|null
     */
    public static function get_model($query)
    {
        if ($query->has('model')) {
            foreach (get_models(true) as $model) {
                if (str_contains($model, ucfirst($query->get('model')))) {
                    foreach (get_models() as $m) {
                        if (strpos($m, ucfirst($query->get('model')))) {
                            return $m;
                        }
                    }
                }
            }
        }

        return null;
    }

    /**
     * Output named routes.
     *
     * @param string $routeBase
     *
     * @return array
     */
    public static function makeNamedRoutes(string $routeBase): array
    {
        $routeTypes = [
            'index',
            'create',
            'show',
            'edit',
            'store',
            'update',
            'destroy',
        ];

        $routeValues = [];

        foreach ($routeTypes as $rt) {
            array_push($routeValues, self::plural($routeBase) . ".{$routeBase}.{$rt}");
        }

        return array_combine($routeTypes, $routeValues);
    }

    /**
     * Pluralize a string.
     *
     * @param     $string
     * @param int $count
     *
     * @return string
     */
    public static function plural($string, $count = 2): string
    {
        return Pluralize::make($string, $count);
    }
}
