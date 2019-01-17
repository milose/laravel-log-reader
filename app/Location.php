<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Location extends Model
{
    public function getFilesAttribute()
    {
        return collect(scandir($this->location))
            ->filter(function ($item) {
                return $item[0] != '.';
            })
            ->map(function ($item) {
                return collect([
                    'name' => $item,
                    'location' => $this->location . '/' . $item,
                    'url' => self::toUrl($this->location . '/' . $item),
                ]);
            })
            ->filter(function ($item) {
                return is_file($item['location']);
            });
    }

    public static function toUrl($location)
    {
        return str_replace('/', '*', $location);
    }

    public static function toPath($location)
    {
        return str_replace('*', '/', $location);
    }
}
