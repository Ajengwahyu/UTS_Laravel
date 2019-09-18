<?php

namespace App\Http\Controllers;
use App\mobil;
use Illuminate\Http\Request;
use Auth;

class mobilcontroller extends Controller
{
    public function mobil() {
    	$data = "Data all mobil";
    	return response()->json($data, 200);
    }
    public function mobilAuth() {
    	$data = "Anyeong " . Auth::user()->username;
    	return response()->json($data, 200);
    }

    public function index(){
    	$data = mobil::all();
    	return response($data);
    }
    public function show($id){
    	$data = mobil::where('id',$id)->get();
    	return response($data);
    }
    public function store (Request $request){
    	try{
    		$data = new mobil();
    		$data->nama_mobil = $request->input('nama_mobil');
    		$data->merk = $request->input('merk');
            $data->bahan_bakar = $request->input('bahan_bakar');
            $data->plat_nomor = $request->input('plat_nomor');
            $data->warna = $request->input('warna');
            $data->jumlah = $request->input('jumlah');
    		$data->save();
    		return response()->json([
    			'status' => '1',
    			'message' => 'Tambah data mobil berhasil'
    		]);
    	} catch (\Exception $e) {
    		return response()->json([
    			'status' => '0',
    			'message' => 'Tambah data mobil gagal'
    		]);
    	}
    }
     public function update (Request $request, $id){
    	try{
    		$data = mobil::where('id',$id)->first();
    		$data->nama_mobil = $request->input('nama_mobil');
            $data->merk = $request->input('merk');
            $data->bahan_bakar = $request->input('bahan_bakar');
            $data->plat_nomor = $request->input('plat_nomor');
            $data->warna = $request->input('warna');
            $data->jumlah = $request->input('jumlah');
    		$data->save();
    		return response()->json([
    			'status' => '1',
    			'message' => 'ubah data mobil berhasil'
    		]);
    	} catch (\Exception $e) {
    		return response()->json([
    			'status' => '0',
    			'message' => 'ubah data mobil gagal'
    		]);
    	}
    }
    public function destroy ($id){
    	try{
    		$data = mobil::where('id',$id)->first();
    		$data->delete();
    		return response()->json([
    			'status' => '1',
    			'message' => 'hapus data mobil berhasil'
    		]);
    	} catch (\Exception $e) {
    		return response()->json([
    			'status' => '0',
    			'message' => 'hapus data mobil gagal'
    		]);
    	}
    }
}
