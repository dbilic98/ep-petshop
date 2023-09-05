<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategory = Subcategory::all();
        return  view('admin.subcategory.index')->with(['subcategory'=>$subcategory]);
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.subcategory.add')->with(['category'=>$category]);
    }

    public function insert(Request $request)
    {
        $subcategory = new Subcategory();

        $subcategory->naziv = $request->input('naziv');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->opis = $request->input('opis');
        $subcategory->save();
        return redirect('/subcategories')->with('status', 'Podkategorija uspješno dodana');
    }

    public function edit($id)
    {   $subcategory = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory'));

    }
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->naziv = $request->input('naziv');
        $subcategory->opis = $request->input('opis');

        $subcategory->update();
        return redirect('/subcategories')->with('status', "Podkategorija uspješno ažurirana");
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->delete();
        return redirect('subcategories')->with('status', "Podkategorija uspješno izbrisana");
    }
}
