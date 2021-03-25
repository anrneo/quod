<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Word;
use Illuminate\Http\Request;

class HangmanController extends Controller
{
    private $letters;
    public function __construct()
    {
        $this->letters = explode (',','A,B,C,D,E,F,G,H,I,J,K,L,M,N,Ñ,O,P,Q,R,S,T,U,V,X,Y,Z');
    }

    public function index()
    {
        $caregories = Categorie::All();
        $word = Word::where('categorie_id', $caregories[0]->id)->get()->random();
        return view('welcome',['letters' => $this->letters, 'caregories' => $caregories,  'word' => $word, 'id' => 0]);
    }

    public function show(Request $request)
    {
        $id = $request->input('category');
        $caregories = Categorie::All();
        $word = Word::where('categorie_id', $id)->get()->random();
        return view('welcome',['letters' => $this->letters, 'caregories' => $caregories,  'word' => $word, 'id' => (int)$id]);
    }
}
