<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Buku;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request, $bookId)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category([
            'name' => $request->input('name'),
            'book_id' => $bookId, // Set the book_id for the new category
        ]);
        $buku = Buku::findOrFail($bookId);
        
        // Save the category
        $category->save();
        

        // You can add a success message or redirect to a different page
        return redirect()->route('galeri.buku',['title' => $buku->buku_seo])
            ->with('success', 'Category added successfully');
    }
}
