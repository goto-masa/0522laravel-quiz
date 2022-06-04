<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * 登録単語一覧
     * @param Word $word
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // ★ ユーザーの単語一覧を取得する
        $words = Auth::user()->words()->get();


        // dd($words);
        return view('words/index', [
            'words' => $words,
        ]);
    }
}
