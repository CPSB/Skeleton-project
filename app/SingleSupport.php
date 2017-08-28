<?php

namespace ActivismeBE;

use Illuminate\Database\Eloquent\Model;

class SingleSupport extends Model
{
    protected $fillable = ['petition', 'city', 'name', 'country', 'postal_code', 'city_name', 'email', 'publish'];

    public function cntry()
    {
        return $this->belongsTo(Countries::class, 'country');
    }
}
