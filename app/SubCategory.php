<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['subCategoryName', 'categoryId', 'subCategoryDescription', 'publicationStatus'];
}
