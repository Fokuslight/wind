<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PostFilter
{
    protected array $keys = [
        'title',
        'content',
        'published_at_from',
        'published_at_to',
        'views_from',
        'views_to',
        'category_title',
    ];

    public function apply(array $data, Builder $builder): Builder
    {
        foreach ($this->keys as $key) {
            if (isset($data[$key])) {
                $methodName = Str::camel($key);
                $this->$methodName($builder, $data[$key]);
            }
        }
        return  $builder;
    }

    protected function title(Builder $builder, $value)
    {
        $builder->where('title', 'ilike', "%$value%");
    }

    protected function content(Builder $builder, $value)
    {
        $builder->where('content', 'ilike', "%$value%");
    }

    protected function publishedAtFrom(Builder $builder, $value)
    {
        $builder->where('published_at', '>', $value);
    }

    protected function publishedAtTo(Builder $builder, $value)
    {
        $builder->where('published_at', '<', $value);
    }

    protected function viewsFrom(Builder $builder, $value)
    {
        $builder->where('views', '>', $value);
    }

    protected function viewsTo(Builder $builder, $value)
    {
        $builder->where('views', '<', $value);
    }

    protected function categoryTitle(Builder $builder, $value)
    {
//        $builder->whereHas('category', function($b) use ($value) {
//            $b->where('title', 'ilike', "%$value%");
//        });
        $builder->whereRelation('category','title', 'ilike', "%$value%");

    }
}

