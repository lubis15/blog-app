<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    use HasFactory, Sluggable;

    //boleh di isi
    // protected $fillable = ['judul', 'excerpt', 'body'];


    //gak boleh di isi, sisanya boleh
    protected $guarded = ['id'];

    //with (untuk eager loading,  supaya mempersedikit query ke database dan mengambil query pada data yang sudah ada )
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        //this used arrow function
        $query->when(
            $filters['user'] ?? false,
            fn ($query, $user) =>
            $query->whereHas(
                'user',
                fn ($query) =>
                $query->where('username', $user)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

 
}
