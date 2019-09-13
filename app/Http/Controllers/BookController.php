<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;
use Auth; //tambahkan ini


class BookController extends Controller
{
  public function index(){
    $data = Book::all();
    return response($data);
  }
  public function show($id){
    $data = Book::where('id',$id)->get();
    return response($data);
  }
  public function store (Request $request){
    try{
      $data = new Book();
      $data->title = $request->input('title');
      $data->description = $request->input('description');
      $data->save();
      return response()->json([
        'status'  =>'1',
        'message' =>'Tambah data buku berhasil!'
      ]);
    }catch(\Exception $e){
      return response()->json([
        'status'  =>'0',
        'message' =>'Tambah data buku gagal!'
      ]);
    }
  }
  public function update(Request $request, $id){
    try{
      $data = Book::where('id', $id)->first();
      $data->title = $request->input('title');
      $data->description = $request->input('description');
      $data->save();

      return response()->json([
        'status'  => '1',
        'message' =>  'Ubah data buku berhasil!'
      ]);
    }catch(\Exception $e){
      return response()->json([
        'status'  => '0',
        'message' =>  'Ubah data buku gagal!'
      ]);
    }
  }
  public function destroy($id){
    try{
      $data = Book::where('id',$id)->first();
      $data->delete();

      return response()->json([
        'status'  => '1',
        'message' => 'Hapus data buku berhasil!'
      ]);
    }catch(\Exception $e){
      return response()->json([
        'status'  => '0',
        'message' =>  'Hapus data buku gagal!'
      ]);
    }
  }
}
