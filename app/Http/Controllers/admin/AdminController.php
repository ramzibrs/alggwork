<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilaya;
use App\Models\candidature;
use App\Models\cv;
use App\Models\travaille;
use App\Models\projet;
use App\Models\annonce;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function index(){
        return view('admin.parametres');

    }

    public function wilaya(){
        $wilaya=wilaya::get();
        return view('admin.wilaya' , compact('wilaya'));

    }

    public function addwilaya(){
        return view('admin.addwilaya');

    }

    public function entrerwilaya(request $request){
        $wilaya=new wilaya();
        $wilaya->nom=$request->input('nom');
        $wilaya->numero_du_wilaya=$request->input('numero');
        $wilaya->save();
        return redirect('/wilaya');

    }

    public function offres(){
        $travaille=travaille::orderBy('approuvé', 'asc')->paginate(5);
        return view('admin.offres' , compact('travaille'));

    }

    public function cev(){
        $cv=cv::orderBy('approuvé', 'asc')->paginate(5);
        return view('admin.cev' , compact('cv'));

    }

    public function suprimer_offre($id){
        $travaille = travaille::find($id);
        if($travaille->contrat)
        {
            $path = 'images/travaille/' .$travaille->contrat;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $path = 'images/travaille/' .$travaille->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $travaille->delete();
            return redirect('/offres')->with('status1','product deleted succesfully');
        }
    }
    public function suprimer_cv($id){
        $cv = cv::find($id);
        if($cv->cv)
        {
            $path = 'images/cv/' .$cv->diplome_formation;
            if(File::exists($path))
            {
                File::delete($path);
            }
            if($cv->cv)
            {
                $path = 'images/cv/' .$cv->cv;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            $cv->delete();
            return redirect('/cev')->with('status1','product deleted succesfully');
            }
        }
    }

    public function suprimer_wilaya($id){
        $wilaya = wilaya::find($id);
            $wilaya->delete();
            return redirect('/wilaya')->with('status1','product deleted succesfully');
    }

    public function modifier_wilaya($id){
        $wilaya = wilaya::find($id);
        return view('admin.modifier_wilaya' ,compact('wilaya'));

    }

    public function mise_wilaya(request $request ,$id){
        $wilaya= wilaya::find($id);
        $wilaya->nom=$request->input('nom');
        $wilaya->numero_du_wilaya=$request->input('numero');
        $wilaya->update();
        return redirect('/wilaya');

    }

    public function approuver(Request $request ,$id)
    {
       $cv = cv::find($id);
       $cv -> approuvé = $request->input('approuver');
       $cv ->update();
       return back();
    }

    public function approuvert(Request $request ,$id)
    {
       $travaille = travaille::find($id);
       $travaille -> approuvé = $request->input('approuver');
       $travaille ->update();
       return back();
    }

    public function cand(){
        $candidature=candidature::orderBy('approuvé', 'asc')->paginate(5);
        return view('admin.cand' , compact('candidature'));

    }

    public function approuverr(Request $request ,$id)
    {
       $candidature = candidature::find($id);
       $candidature -> approuvé = $request->input('approuverr');
       $candidature ->update();
       return back();
    }

    public function suprimer_can($id){
        $candidature = candidature::find($id);
        if($candidature->cv)
        {
            $path = 'images/candidature/candidaturedip/' .$candidature->diplome_formation;
            if(File::exists($path))
            {
                File::delete($path);
            }
            if($candidature->cv)
            {
                $path = 'images/candidature/cv/' .$candidature->cv;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            $candidature->delete();
            return redirect('/cand')->with('status1','product deleted succesfully');
            }
        }
    }

    public function proj(){
        $projet=projet::orderBy('approuvé', 'asc')->paginate(5);
        return view('admin.proj' , compact('projet'));

    }

    public function approuverp(Request $request ,$id)
    {
       $projet = projet::find($id);
       $projet -> approuvé = $request->input('approuver');
       $projet ->update();
       return back();
    }

    public function suprimer_proj($id){
        $projet = projet::find($id);
            if($projet->photo)
            {
                $path = 'images/projet/images/' .$projet->photo;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            $projet->delete();
            return redirect('/proj')->with('status1','product deleted succesfully');
            }
        }

        public function tendancea(Request $request ,$id)
    {
       $projet = projet::find($id);
       $projet -> tendance = $request->input('tendancea');
       $projet ->update();
       return back();
    }

    public function tendanced(Request $request ,$id)
    {
       $projet = projet::find($id);
       $projet -> tendance = $request->input('tendanced');
       $projet ->update();
       return back();
    }

    public function ann(){
        $annonce=annonce::orderBy('approuvé', 'asc')->paginate(5);
        return view('admin.ann' , compact('annonce'));

    }

    public function approuvera(Request $request ,$id)
    {
       $annonce = annonce::find($id);
       $annonce -> approuvé = $request->input('approuvera');
       $annonce ->update();
       return back();
    }

    public function suprimer_ann($id){
        $annonce = annonce::find($id);
            if($annonce->photo)
            {
                $path = 'images/annonce/images/' .$annonce->photo;
                if(File::exists($path))
                {
                    File::delete($path);
                }
            $annonce->delete();
            return redirect('/ann')->with('status1','product deleted succesfully');
            }
        }

        public function tendanceaa(Request $request ,$id)
    {
       $annonce = annonce::find($id);
       $annonce -> tendance = $request->input('tendanceaa');
       $annonce ->update();
       return back();
    }

    public function tendancead(Request $request ,$id)
    {
       $annonce = annonce::find($id);
       $annonce -> tendance = $request->input('tendancead');
       $annonce ->update();
       return back();
    }

}
