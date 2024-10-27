<?php

namespace App;

use App\Exceptions\Container\ContainerException;
use App\Exceptions\Container\NotFoundException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];

            if (is_callable($entry)) {
                return $entry($this);
            }

            $id = $entry;
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete): void
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id)
    {
        $reflectionClass = new \ReflectionClass($id);
        if (! $reflectionClass->isInstantiable()) {
            throw new ContainerException('Class "' . $id . '" is not instantiable');
        }

        $constructor = $reflectionClass->getConstructor();
        if(! $constructor) {
            return new $id;
        }

        $parameters = $constructor->getParameters();

        if(! $parameters) {
            return new $id;
        }

        $dependencies = array_map(function (\ReflectionParameter $param) use ($id) {
            $name = $param->getName();
            $type = $param->getType();

            if(! $type) {
                throw new ContainerException(
                    'Failed to resolve class "' . $id . '" - param "' . $name . '" is missing a type hint');
            }
            if ($type instanceOf \ReflectionUnionType) {
                throw new ContainerException(
                    'Failed to resolve class "' . $id . '" - because of union type');
            }

            if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()) {
                return $this->get($type->getName());
            }

            throw new ContainerException(
                'Failed to resolve class "' . $id . '" - because of invalid param' . $name
            );
        }, $parameters);

        return $reflectionClass->newInstanceArgs($dependencies);
    }

}