<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Item extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ['item_name', 'description', 'price', 'path_to_img'];

    public $sortable = ['item_name', 'price'];
}
