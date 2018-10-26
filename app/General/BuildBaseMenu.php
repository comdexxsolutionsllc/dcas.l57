<?php

namespace App\General;

use Illuminate\Routing\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class BuildBaseMenu
{

    /**
     * @var \Illuminate\Support\Collection
     */
    protected static $routes;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected static $routeTitles;

    /**
     * @var \Illuminate\Support\Collection
     */
    protected static $menu;

    /**
     * @var string
     */
    protected static $baseIconSet = 'minus-square';

    /**
     * Output menu.
     *
     * @return array
     */
    public static function build(): array
    {
        return static::buildMenu()->toArray();
    }

    /**
     * Build menu structure.
     *
     * @return \Illuminate\Support\Collection
     */
    protected static function buildMenu(): Collection
    {
        $text = [];
        $url = [];

        $routes = static::filterRoutes(static::getAllUris());
        $routeTitles = static::unchunkRoutes($routes);

        $icons = array_pad([], sizeof($routes), ['icon' => static::$baseIconSet]);

        static::$menu = static::prepareMenu($routeTitles, $routes);

        foreach (static::$menu->keys() as $index => $keys) {
            array_push($text, [
                'id'   => $index,
                'text' => $keys,
            ]);
        }

        foreach (static::$menu->values() as $values) {
            array_push($url, [
                'url' => $values,
            ]);
        }

        $menuWithoutIcons = static::rArrayMergeDistinct($text, $url);

        $output = collect(static::rArrayMergeDistinct($menuWithoutIcons, $icons))->filter(function ($value, $key) {
            if (Arr::exists($value, 'id')) {
                return $value;
            }
        });

        return $output;
    }

    /**
     * Filter routes.
     *
     * @param \Illuminate\Support\Collection $routes
     *
     * @return \Illuminate\Support\Collection
     */
    protected static function filterRoutes(Collection $routes): Collection
    {
        $filtered = $output = [];

        /**
         * Strip core site, API, debugging, & testing routes from output.
         */
        foreach ($routes as $route) {
            if (! preg_match('/^(?:\/?)(?:api|broadcasting|_debugbar|_dusk|graphql|horizon|login|logout|metrics|oauth|opcache-api|password|register|telescope)(?:\/?)/', $route)) {
                array_push($filtered, $route);
            }
        }

        /**
         * Strip / root route from output.
         */
        if ($rootIndex = array_search('/', $filtered)) {
            unset($filtered[$rootIndex]);
        }

        unset($filtered[0]);

        /**
         * Strip dashboard root route from output.
         */
        if ($rootIndex = array_search('dashboard', $filtered)) {
            unset($filtered[$rootIndex]);
        }

        /**
         * Strip Email Verification Resender route from output.
         */
        if ($rootIndex = array_search('email/resend', $filtered)) {
            unset($filtered[$rootIndex]);
        }

        /**
         * Strip Email Verification route from output.
         */
        if ($rootIndex = array_search('email/verify', $filtered)) {
            unset($filtered[$rootIndex]);
        }

        /**
         * Strip dashboard roots, metrics, create, & edit routes from output.
         */
        foreach ($filtered as $filter) {
            if (! preg_match('/^(dashboard\/internal\/metrics)/', $filter) && ! preg_match('/\/?{\w+}\/?/', $filter) && ! preg_match('/\/{1}create/', $filter) && ! preg_match('/dashboard\/internal/', $filter) && ! preg_match('/dashboard\/vendor/', $filter) && ! preg_match('/dashboard\/whitegloves/', $filter)) {
                array_push($output, $filter);
            }
        }

        static::$routes = collect($output);

        return static::$routes;
    }

    /**
     * Get all route URIs.
     *
     * @return \Illuminate\Support\Collection
     */
    protected static function getAllUris(): Collection
    {
        $routes = collect(\Route::getRoutes())->map(function (Route $route) {
            return $route->uri();
        })->unique();

        $routes = $routes->toArray();

        asort($routes, SORT_STRING);

        $routes = collect($routes);

        return $routes;
    }

    /**
     * Unchunk routes to create link titles.
     *
     * @param \Illuminate\Support\Collection $routes
     *
     * @return \Illuminate\Support\Collection
     */
    protected static function unchunkRoutes(Collection $routes): Collection
    {
        $output = [];
        $routes = $routes->toArray();

        asort($routes, SORT_STRING);

        /**
         * @todo refactor.
         */
        foreach ($routes as $route) {
            if (sizeof($routeChunk = explode('/', $route)) > 1) {
                if (str_contains($routeChunk[0], 'dashboard')) {
                    array_push($output, ucwords($routeChunk[1]));
                } else {
                    array_push($output, ucwords("{$routeChunk[0]} | {$routeChunk[1]}"));
                }
            } else {
                array_push($output, ucwords($route));
            }
        }

        static::$routeTitles = collect($output);

        return static::$routeTitles;
    }

    /**
     * Merge menu titles with menu routes.
     *
     * @param \Illuminate\Support\Collection $titles
     * @param \Illuminate\Support\Collection $links
     *
     * @return \Illuminate\Support\Collection
     */
    protected static function prepareMenu(Collection $titles, Collection $links): Collection
    {
        return $titles->combine($links);
    }

    /**
     * Merge two multi-dimensional arrays.
     *
     * @param array $array1
     * @param array $array2
     *
     * @return array
     */
    protected static function rArrayMergeDistinct(array $array1, array $array2): array
    {
        $merged = $array1;

        foreach ($array2 as $key => &$value) {
            if (is_array($value) && isset ($merged[$key]) && is_array($merged[$key])) {
                $merged[$key] = static::rArrayMergeDistinct($merged[$key], $value);
            } else {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }
}
