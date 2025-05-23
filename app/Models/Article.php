<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'status',
        'user_id',
    ];

    // Auto generate slug dari title
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
        
        static::updating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Route model binding menggunakan slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Scope untuk artikel published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}