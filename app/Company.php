<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * Company has many Cus.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    protected $guarded = [];
    public function customers()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = company_id, localKey = id)
    	return $this->hasMany(Customer::class, 'company_id', 'id');
    }
}
