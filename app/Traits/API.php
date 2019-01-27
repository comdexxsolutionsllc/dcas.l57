<?php

namespace App\Traits;

trait API
{

    /**
     * @param       $resourceName
     * @param mixed ...$args
     *
     * @return object
     * @throws \ReflectionException
     */
    public function resource($resourceName, ...$args)
    {
        // Get's the request's api version, or the latest if undefined
        $v = config('app.api_version', config('app.api_latest'));

        $className = $this->getResourceClassname($resourceName, $v);

        if (! class_exists($className)) {
            $className = $this->getResourceClassname($resourceName, config('app.api_latest'));
        }

        $class = new \ReflectionClass($className);

        return $class->newInstanceArgs($args);
    }

    /**
     * Parse Api\BusinessResource for
     * App\Http\Resources\Api\v{$v}\BusinessResource
     *
     * @param string $className
     * @param string $v
     *
     * @return string
     */
    protected function getResourceClassname($className, $v)
    {
        $re = '/.*\\\\(.*)/';

        return 'App\Http\Resources\\' . preg_replace($re, 'Api\\v' . $v . '\\\$1', $className);
    }
}
