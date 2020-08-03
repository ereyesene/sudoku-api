<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\SudokuLib;
Use App\sudoku;

class SudokuController extends Controller
{
    public function index(SudokuLib $customServiceInstance){
      return $customServiceInstance->generateSudoku();
    }

    public function upload(SudokuLib $customServiceInstance, Request $request){
      return $customServiceInstance->generateSudokuFromJson($request);
    }

    public function store(SudokuLib $customServiceInstance, Request $request){
      return Sudoku::create($request->all());
    }

    public function show(SudokuLib $customServiceInstance){
      return Sudoku::all();
    }
}
