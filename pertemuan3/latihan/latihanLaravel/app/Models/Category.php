<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    //Kolom yang dilindungi dari mass assignment (hanya 'id' yang tidak boleh diisi manual)
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug'; //Gunakan kolom 'slug' untuk route model binding
    }

    //Relasi: Satu kategori memiliki banyak post (One-to-Many)
    public function posts()
    {
        return $this->hasMany(Post::class);
        //category_id adalah foreign key di tabel posts yang menunjuk ke categories.id
        //artinya satu kategori bisa memiliki banyak postingan
    }
}
