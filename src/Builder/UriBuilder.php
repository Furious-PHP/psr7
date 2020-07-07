<?php

declare(strict_types=1);

namespace Arslanoov\Psr7\Builder;

use function ltrim;

final class UriBuilder
{
    private string $uri = '';

    public function withScheme(string $scheme): self
    {
        $builder = clone $this;

        if ('' !== $scheme) {
            $builder->uri .= $scheme . ':';
        }

        return $builder;
    }

    public function withAuthority(string $authority): self
    {
        $builder = clone $this;

        if ('' !== $authority) {
            $builder->uri .= '//' . $authority;
        }

        return $builder;
    }

    public function withPath(string $authority, string $path): self
    {
        $builder = clone $this;

        if ('' !== $path) {
            if ('/' !== $path[0]) {
                if ('' !== $authority) {
                    $path = '/' . $path;
                }
            } elseif (isset($path[1]) && '/' === $path[1]) {
                if ('' === $authority) {
                    $path = '/' . ltrim($path, '/');
                }
            }

            $builder->uri .= $path;
        }

        return $builder;
    }

    public function withQuery(string $query): self
    {
        $builder = clone $this;

        if ('' !== $query) {
            $builder->uri .= '?' . $query;
        }

        return $builder;
    }

    public function withFragment(string $fragment): self
    {
        $builder = clone $this;

        if ('' !== $fragment) {
            $builder->uri .= '#' . $fragment;
        }

        return $builder;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }
}