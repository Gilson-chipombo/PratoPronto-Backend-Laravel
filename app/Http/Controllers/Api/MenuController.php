<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function all()
    {
        return Menu::with('category')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'category'    => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:4096',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('menus', 'public');

        if (Menu::create($data)) return response()->json(['message' => 'Menu created'], 200);
        else return response()->json(['error' => 'Something goes wrong'], 500);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $data = $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'available'   => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:4096',
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        $menu->update($data);
        return response()->json(['message' => 'Menu updated'], 200);
    }

    public function delete($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }
        $menu->delete();

        return response()->json(['message' => 'Menu removido']);
    }
}
