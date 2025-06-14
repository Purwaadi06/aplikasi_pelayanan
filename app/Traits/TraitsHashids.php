<?php

namespace App\Traits;

use Vinkla\Hashids\Facades\Hashids;

trait TraitsHashids
{
    public function getRouteKey()
    {
        return $this->hashid;
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $decoded = Hashids::decode($value);
        if (empty($decoded)) {
            abort(404);
        }

        return $this->where('id', $decoded[0])->firstOrFail();
    }

    public function getHashidAttribute()
    {
        return Hashids::encode($this->id);
    }
}
