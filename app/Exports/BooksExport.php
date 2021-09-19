<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    public function headings():array {
        return [
            'ID',
            'User ID',
            'Judul',
            'Penulis',
            'Kategori',
            'Tahun Terbit',
            'Tgl Beli',
            'Jumlah Halaman',
            'Ulasan',
            'Nilai'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Book::getRecords());
    }
}
