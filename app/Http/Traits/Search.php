<?php

namespace App\Http\Traits;

use Exception;
use Illuminate\Support\Facades\Schema;

trait Search {

    public function scopeSearch($query, $searchQuery, array $searchFields = [])
    {
        $fields = $this->validateSearchFields($searchFields);

        return static::where(function ($query) use ($fields, $searchQuery) {
            $c = 1;
            foreach ($fields as $field) {
                if ($c == 1) {
                    $query->where($field, 'LIKE', "%$searchQuery%");
                    $c++;
                } else {
                    $query->orWhere($field, 'LIKE', "%$searchQuery%");
                }
            }
        });
    }

    /**
     * Validate if search fields exists in database
     * @return array
     * @throws Exception
     */
    protected function validateSearchFields($searchFields)
    {
        $fieldsFromDatabase = Schema::getColumnListing($this->getTable());

        foreach ($searchFields as $field) {
            if (in_array($field, $fieldsFromDatabase)) {
                $fields[] = $field;
            } else {
                throw new Exception('Search field ' . $field .  ' is invalid.');
            }
        }

        return $fields ?? $fieldsFromDatabase;
    }




}
