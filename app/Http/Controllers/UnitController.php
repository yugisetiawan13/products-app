<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request){
        
        $search = $request->search; //Merupakan aksi untuk memparsing value input menjadi hasil pada tabel


        // Get Data Model unit dan membuat pencarian berdasarkan field unit_name
        $units = Unit::withCount(['products'])
        ->where('unit_name','LIKE','%'.$search.'%')
        ->paginate(10); //Membuat Paginate / membatasi data yang di tampilkan sebanyak 10 data

        return view('pages.unit.index',['units' => $units]);
    }

    public function add(){
        return view('pages.unit.add');
    }

    public function store(Request $request){
        
        // Validasi data dari Backend
        $this->validate($request,[
            'unit_name' => 'required|min:5|max:30|string',
            'desc' => 'nullable|min:5|max:200'
        ]);

        try {
            $unit = new Unit;

            $unit->unit_namess = ucwords($request->unit_name);
            $unit->desc = ucwords($request->desc);

            $unit->save();
        } catch (\Exception $e) {

            // Menampilkan value psan error yang di tentukan oleh controller ketika ada gagal
            // withInput artinya menyinpan value input yang di masukkan sebelum nya pada saat error
            // with yaitu mengirim value feedback / pesan ketika terjadi error atau berhasil ke frontend
            return redirect()->back()->withInput()->with('error-msg','Failed Add Unit');
        }

        return redirect()->route('unit')->with('success-msg', 'Success Add Unit');

        
    }

    public function edit($id){

        // findOrfail digunakan untuk mencari / mengidentifikasi apakah id yang di cari ada dalam database
        $units = Unit::findOrFail($id);

        return view('pages.unit.edit',[
            'units' => $units
        ]);
    }

    public function update(Request $request,$id){

        $units = Unit::findOrfail($id);

        $this->validate($request,[
            'unit_name' => 'required|min:5|max:30|string',
            'desc' => 'nullable|min:5|max:200'
        ]);

        try {

            $units->unit_name = $request->unit_name;
            $units->desc = $request->desc;

            $units->update();
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error-msg', 'Failed Edit Unit');
        }

        return redirect()->route('unit')->with('success-msg', 'Success Edit Unit');
    }   

    public function delete($id){

        $units = Unit::findOrFail($id);

        try {

            $units->delete();

        } catch (\Exception $e) {

            return redirect()->back()->with('error-msg', 'Failed Delete Unit');
        }

        return redirect()->route('unit')->with('success-msg', 'Success Delete Unit');
    }
}
