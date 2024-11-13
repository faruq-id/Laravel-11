<?php
// app/Helpers/PageTitleHelper.php

namespace App\Helpers;

use App\Models\Category;
use App\Models\User;

class PageTitleHelper
{
    public static function getPageTitle($filters)
    {
        if (isset($filters['search']) && isset($filters['category'])) {
            $category = Category::where('slug', $filters['category'])->first();
            return $category ? 'Category: ' . $category->name . ' / Search: ' . $filters['search'] : 'Category: Tidak Ditemukan';
        } elseif (isset($filters['category'])) {
            $category = Category::where('slug', $filters['category'])->first();
            return $category ? count($category->posts) . ' Category: ' . $category->name : 'Category: Tidak Ditemukan';
        } elseif (isset($filters['search']) && isset($filters['author'])) {
            $author = User::where('username', $filters['author'])->first();
            return $author ? 'Post by: ' . $author->name . ' / Search: ' . $filters['search'] : 'Post by: Tidak Ditemukan';
        } elseif (isset($filters['author'])) {
            $author = User::where('username', $filters['author'])->first();
            return $author ? count($author->posts) . ' Post by: ' . $author->name : 'Post by: Tidak Ditemukan';
        } elseif (isset($filters['search'])) {
            return 'Search results from: ' . $filters['search'];
        } else {
            return 'Blogs';
        }
    }
}
