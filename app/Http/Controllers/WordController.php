<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;


class WordController extends Controller
{
    /**
     * タスク一覧
     * @param Word $word
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $words = Word::all();
        return view('words.index', ['words' => $words,]);
    }
    public function create()
    {
        $words = Word::all();
        return view('words.index', ['words' => $words,]);
    }
}
