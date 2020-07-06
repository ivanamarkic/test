<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\raspored;
use App\smijer;
use App\godina;
use App\predmet;


class PagesController extends Controller
{    

    public function index() {

        $smijer = smijer::all();
        $godina = godina::all();

        return view('pages.index')->with('smijer',$smijer)->with('godina',$godina);

    }

    public function DodajRaspored() {

        return view('pages.DodajRaspored');

    }

    public function dodaj(Request $request) {

        $predmet = predmet::all();
        $godinaraspored= array();
        $rasporedzaprikazat = array();     

        foreach ($predmet as $element){
                    if ($element->fk_godina == $request->godina){
                        $godinaraspored[]=$element;
                    }
        }
            
        foreach ($godinaraspored as $element){
            $rasporedzaprikazat = raspored::all()->filter(function($record) use($element) {
            if($record->id_raspored == $element->fk_raspored) {
            $a = (object) array_merge( 
            (array) $record, (array) $element);
            return $a;
            }
         });
        }
        
        $data =  $rasporedzaprikazat;
         $i=0;

       foreach ($data as $element){
        $datasend[$i] = array('title:' => $element->ime_predmeta,'start:'=> $element->vrijemeod,'end:'=>$element->vrijemedo,'allDay:' => false,'className:'=>$element->mjesto);
        $i++;
       } 
        
        return response()->json(['success' => true, 'data' => $datasend]);
    }

    public function DodajUsere() {

        return view('pages.DodajUsere');

    }


}
