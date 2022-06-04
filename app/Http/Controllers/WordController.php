<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWord;
use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;


class WordController extends Controller
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




    public function showCreateWord()
    {
        $user = Auth::user();
        $id = $user->id;
        return view('words/create', ['id' => $id]);
    }
    /**
     * タスク一覧
     * @param Word $word
     * * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        for ($i = 0; $i < 10; $i++) {
            // dd($request);
            $word = new Word();
            $word->title = $request->title[$i];
            $word->translation = $request->translation[$i];
            Auth::user()->words()->save($word);
        };
        return redirect()->route('words.index');
    }



    /**
     * 単語編集フォーム
     * @param Word $word
     * @return \Illuminate\View\View
     */
    public function showEditForm(Word $word)
    {
        // $this->checkRelation($folder, $task);
        // dd($word);
        return view('words/edit', [
            'word' => $word,
        ]);
    }

    /**
     * 単語編集
     * @param Folder $folder
     * @param Task $task
     * @param EditTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Word $word, Request $request)
    {
        // $this->checkRelation($folder, $task);

        // $word = new Word;
        // dd($word);
        // $word->id = $request->word->id;
        $word->title = $request->title;
        $word->translation = $request->translation;
        $word->user_id = $request->user()->id;
        $word->save();

        return redirect()->route('words.index');
    }
    // private function checkRelation(Folder $folder, Task $task)
    // {
    //     if ($folder->id !== $task->folder_id) {
    //         abort(404);
    //     }
    // }
}
