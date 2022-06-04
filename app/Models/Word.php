<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Word extends Model
{
    use HasFactory;
    public function words()
    {
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'id',
        'title',
        'translation'
    ];

    // public function sentences()
    // {
    //     return $this->hasMany('App\Models\Sentence', 'sentence_id', 'id');
    // }

    // public static function showColumns()
    // {
    //     $word = new Word;
    //     $sql = 'SHOW COLUMNS FROM ' . $word->table;
    //     $columns    = DB::select($sql);
    //     var_dump($columns);
    // }
}
