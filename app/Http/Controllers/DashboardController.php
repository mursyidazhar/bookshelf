<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::latest();
        $categories = Category::all();

        if(request('search')) {
            $books->where('judul', 'like', '%' .request('search') . '%')
                ->orWhere('penulis', 'like', '%' . request('search') . '%');
        }

        if(request('filter')) {
            $books->where('categories_id', request('filter'));
        }
        
        if(request('filter') == 0) {
            $books->get();
        }

        return view('dashboard.index', [
            'books' => $books->simplePaginate(10),
            'categories' => $categories
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required|string',
            'thn_terbit' => 'required',
            'photo' => 'required|image',
            'categories_id' => 'required|exists:categories,id',
            'jml_halaman' => 'required|integer',
            'tgl_beli' => 'required',
            'nilai' => 'required|integer'

        ]);

        // BUAT NAMA FOTO
        $namaFoto = time() . '-' . $request->judul . '.' . $request->photo->extension();
        // SIMPAN FOTO DI FOLDER PUBLIC LALU IMAGES
        $request->photo->move(public_path('images'), $namaFoto);

        $books = Book::create([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'thn_terbit' => $request->input('thn_terbit'),
            'photo' => $namaFoto,
            'categories_id' => $request->input('categories_id'),
            'jml_halaman' => $request->input('jml_halaman'),
            'tgl_beli' => $request->input('tgl_beli'),
            'ulasan' => $request->input('ulasan'),
            'nilai' => $request->input('nilai')
            ]);
        return redirect('/dashboard');
    }
    public function show()
    {
        $books = Book::paginate(20);
        return view('dashboard.show', compact('books'));
    }
    public function edit($id)
    {
        $item = Book::findOrFail($id);
        $categories = Category::all();

        return view('dashboard.edit', compact('item', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $namaFoto = time() . '-' . $request->judul . '.' . $request->photo->extension();
        $data['photo'] = $namaFoto;
        // SIMPAN FOTO DI FOLDER PUBLIC LALU IMAGES
        $request->photo->move(public_path('images'), $namaFoto);
        $item = Book::findOrFail($id);

        $item->update($data);

        return redirect('/dashboard');
    }
}
