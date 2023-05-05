<?php

namespace App\Traits;

use App\Models\Meta;
use Illuminate\Database\Eloquent\Builder;

trait HasMetaTrait
{

    public static function bootHasMetaTrait(): void
    {

    }


    public function setMeta(string $key, $value = null): Meta
    {
        $meta = Meta::firstOrCreate([
            'metable_type' => self::class,
            'metable_id' => $this->id,
            'key' => $key
        ]);
        $meta->update(['value' => $value]);
        return $meta;
    }

    public function getMeta(string $key, $default = false)
    {
        $meta = $this->metaQuery()->where('key', $key)->first();
        return $meta->value ?? $default;
    }

    public function getMetas()
    {
        return $this->metaQuery()->get();
    }

    public function metaQuery(): Builder
    {
        return Meta::where('metable_type', self::class)->where('metable_id', $this->id);
    }

    public function scopeMeta($query, string $key, $value = null): mixed
    {
        return $query->where($key, $value);
    }
}
