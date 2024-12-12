<?php 

namespace App\Models;

// use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model 
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, Notifiable;

    protected $fillable = ['title', 'slug', 'category_id', 'keywords', 'metadesc', 'image', 'body', 'author_id', 'status']; // declarasi filed2 yang boleh di isi manual dari form

    protected $with = ['author', 'category']; //eager loading untuk kebutuhan relasi (query)

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // app/Models/Post.php
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter (Builder $query, array $filters): void
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        // if($filters['search'] ?? false) {  
        $query->when(
            $filters['search'] ?? false, 
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    // public function getBlogsPictureAttribute(): string
    // {
    //     return $this->attributes['image'] && Storage::has($this->attributes['image']) ? Storage::url($this->attributes['image']) : Storage::url('/blogs/no-image.png');
    // }
}
?>