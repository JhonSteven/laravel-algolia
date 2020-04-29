<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class QuranText extends Model
{
    use Searchable;

    protected $primaryKey = 'index';

    protected $table = "quran_text";

    public function searchableAs()
    {
        return 'quran';
    }

    public function getScoutKeyName()
    {
        return 'index';
    }
}
