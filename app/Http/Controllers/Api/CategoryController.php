<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //

    public function all()
    {
        return Category::all();
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'icon' => 'nullable|image|mimes:png,jpeg,jpg,svg|max:2048'
        ]);

        $category = Category::where('name', $request['name'])->first();

        if ($category) return response()->json(['message' => 'Category already exist']);

        if ($request->hasFile('icon')) $data['icon'] = $request->file('icon')->store('icons', 'public');
        
        if (Category::create($data)) {
            return response()->json([
                'message' => 'category created',
                'status'  => 'success'
            ], 200);
        }
        else return response()->json(['error' => 'something goes wrong'], 500);
    }

    public function upload(Request $request, $id)
    {
      $category = Category::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        if ($request->hasFile('icon')) {
            if ($category->icon) {
                Storage::disk('public')->delete($category->icon);
            }
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }

        $category->update($data);
        return $category;
    }

    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        if (!$category) return response()->json(['error' => ' id does not exist'], 404);

        if ($category->icon) Storage::disk('public')->delete($category->icon);
        $category->delete();
        return response()->json(['message' => 'deleted success'], 200);
    }

}
