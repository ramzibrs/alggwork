<?php

namespace App\Http\Controllers\employeur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilaya;
use App\Models\travaille;
use App\Models\candidature;
use App\Models\cv;
use App\Models\projet;
use App\Models\annonce;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;



class CvController extends Controller
{
    public function index(){
        $wilaya=wilaya::orderBy('numero_du_wilaya', 'asc')->get();
        return view('cv' , compact('wilaya'));
    }

    public function travaille(){
        $wilaya=wilaya::get();
        return view('travaille' , compact('wilaya'));
    }

    public function employeur(){
        $cv=cv::orderBy('approuvé', 'desc')->paginate(2);
        return view('employeur' , compact('cv'));
    }

    public function entrercv(request $request){
        $cv=new Cv;
        if($request->hasFile('diplome'))
        {

            $file=$request->file('diplome');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/cv/dip',$filename);
            $cv->diplome_formation=$filename;
        }
        if($request->hasFile('Curriculum-vital'))
        {

            $file=$request->file('Curriculum-vital');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/cv',$filename);
            $cv->cv=$filename;
        }
        $cv->nom=$request->input('nom');
        $cv->prenom=$request->input('prenom');
        $cv->date_de_naissanse=$request->input('date');
        $cv->adresse=$request->input('adresse');
        $cv->nom_wilaya=$request->input('wilaya');
        $cv->numero_de_telephone=$request->input('phone');
        $cv->adresse_email=$request->input('Email');
        $cv->genre=$request->input('genre');
        $cv->user_id=$request->input('user_id');
        $cv->user_name=$request->input('user_name');
        $cv->save();
        return redirect('/');
    }

    public function entrertravaille(request $request){
        $travaille=new Travaille;
        if($request->hasFile('contrat'))
        {

            $file=$request->file('contrat');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/travaille',$filename);
            $travaille->contrat=$filename;
        }
        if($request->hasFile('photo'))
        {

            $file=$request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/travaille',$filename);
            $travaille->photo=$filename;
        }
        $travaille->intitule=$request->input('intitule');
        $travaille->salaire=$request->input('salaire');
        $travaille->horaires=$request->input('horaires');
        $travaille->nom_wilaya=$request->input('ville');
        $travaille->localisation=$request->input('localisation');
        $travaille->information=$request->input('information');
        $travaille->diplome=$request->input('diplome');
        $travaille->necessite=$request->input('necessite');
        $travaille->user_id=$request->input('user_id');
        $travaille->user_name=$request->input('user_name');
        $travaille->save();
        return redirect('/');
    }

    public function jobs(){
        $travaille=travaille::orderBy('approuvé', 'desc')->paginate(2);
        return view('jobs' , compact('travaille'));
    }

    public function empvue($id){
        $cv =cv::where('id',$id)->find($id);
        return view('empvue' , compact('cv'));
    }

    public function jobview($id){
        $travaille =travaille::where('id',$id)->find($id);
        return view('jobview' , compact('travaille'));
    }

    public function trvcond($id){
        $travaille =travaille::where('id',$id)->find($id);
        $wilaya=wilaya::orderBy('numero_du_wilaya', 'asc')->get();
        if(Auth::user()->id!=$travaille->user_id )
        {
            return view('candidature' , compact('wilaya','travaille'));
        }
        else
        {
            return back();
        }


    }

    public function entrercandidature(request $request){
        $candidature=new candidature;
        if($request->hasFile('diplome'))
        {

            $file=$request->file('diplome');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/candidature/candidaturedip',$filename);
            $candidature->diplome_formation=$filename;
        }
        if($request->hasFile('Curriculum-vital'))
        {

            $file=$request->file('Curriculum-vital');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/candidature/cv',$filename);
            $candidature->cv=$filename;
        }
        $candidature->nom=$request->input('nom');
        $candidature->prenom=$request->input('prenom');
        $candidature->trv_id=$request->input('trvid');
        $candidature->date_de_naissanse=$request->input('date');
        $candidature->adresse=$request->input('adresse');
        $candidature->nom_wilaya=$request->input('wilaya');
        $candidature->numero_de_telephone=$request->input('phone');
        $candidature->adresse_email=$request->input('Email');
        $candidature->genre=$request->input('genre');
        $candidature->intitule=$request->input('intitule');
        $candidature->user_id=$request->input('user_id');
        $candidature->user_name=$request->input('user_name');
        $candidature->save();
        return redirect('/');
    }


    public function contcv($id){
        $cv =cv::where('id',$id)->find($id);
        if(Auth::user()->id!=$cv->user_id )
        {
            return view('contcv' , compact('cv'));
        }
        else
        {
            return back();
        }

    }

    public function vcv(){
        $cv=cv::orderBy('approuvé', 'desc')->paginate(2);
        return view('vcv' , compact('cv'));
    }

    public function vtrv(){
        $travaille=travaille::orderBy('approuvé', 'desc')->paginate(2);
        return view('vtrv' , compact('travaille'));
    }

    public function vcand(){
        $candidature=candidature::orderBy('approuvé', 'desc')->paginate(2);
        $travaille=travaille::get();
        return view('vcand' , compact('candidature' , 'travaille'));
    }

    public function trvclist($id){
        $candidature=candidature::orderBy('approuvé', 'desc')->paginate(2);
        $travaille =travaille::where('id',$id)->find($id);
        if(Auth::user()->id==$travaille->user_id )
        {
            return view('trvclist' , compact('candidature' , 'travaille'));
        }
        else
        {
            return back();
        }

    }

    public function empvuec($id1 , $id2){
        $candidature =candidature::where('id',$id1)->find($id1);
        $travaille=travaille::where('id',$id2)->find($id2);
        if( $candidature->trv_id==$travaille->id)
        {
            return view('empvuec' , compact('candidature' ,'travaille'));
        }
        else
        {
            return back();
        }


    }

    public function contcvc($id){
        $candidature =candidature::where('id',$id)->find($id);
        if(Auth::user()->id!=$candidature->user_id )
        {
            return view('contcvc' , compact('candidature'));
        }
        else
        {
            return back();
        }


    }

    public function search()
    {
        $search_text=$_GET['query'];
        $travaillewi=travaille::where('nom_wilaya','LIKE','%'.$search_text.'%')
        ->orwhere('intitule','LIKE','%'.$search_text.'%')
        ->orwhere('localisation','LIKE','%'.$search_text.'%')->orderBy('approuvé', 'desc')->paginate(2);
        return view('searchj' ,compact(['travaillewi']));


    }

    public function searcho()
    {
        $search_text=$_GET['query'];
        $cvn=DB::table('cvs')->where('nom','LIKE','%'.$search_text.'%')
        ->orwhere('prenom','LIKE','%'.$search_text.'%')
        ->orwhere('nom_wilaya','LIKE','%'.$search_text.'%')
        ->orwhere('genre','LIKE','%'.$search_text.'%')->orderBy('approuvé', 'desc')->paginate(2);
        return view('searcho' ,compact(['cvn']));


    }

    public function searchc($id)
    {
        $search_text=$_GET['query'];
        $candidaturen=candidature::where('nom','LIKE','%'.$search_text.'%')
        ->orwhere('prenom','LIKE','%'.$search_text.'%')
        ->orwhere('nom_wilaya','LIKE','%'.$search_text.'%')
        ->orwhere('genre','LIKE','%'.$search_text.'%')->orderBy('approuvé', 'desc')->paginate(2);
        $travaille =travaille::where('id',$id)->find($id);
        return view('searchc' ,compact(['candidaturen','travaille']));


    }

    public function modtrv($id){
        $travaille =travaille::where('id',$id)->find($id);
        $wilaya=wilaya::get();
        if(Auth::user()->id==$travaille->user_id)
        {
            return view('modtrv' , compact('travaille','wilaya'));
        }
        else
        {
            return back();
        }
    }

    public function misetrv(request $request ,$id)
    {
        $travaille = travaille::find($id);
        if($request->hasFile('contrat'))
        {
            $path='images/travaille/'.$travaille->contrat;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('contrat');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/travaille',$filename);
            $travaille->contrat=$filename;
        }


        if($request->hasFile('photo'))
        {
            $path='images/travaille/'.$travaille->photo;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/travaille',$filename);
            $travaille->photo=$filename;
        }
        $travaille->intitule=$request->input('intitule');
        $travaille->salaire=$request->input('salaire');
        $travaille->horaires=$request->input('horaires');
        $travaille->nom_wilaya=$request->input('ville');
        $travaille->localisation=$request->input('localisation');
        $travaille->information=$request->input('information');
        $travaille->diplome=$request->input('diplome');
        $travaille->necessite=$request->input('necessite');
        $travaille->user_id=$request->input('user_id');
        $travaille->user_name=$request->input('user_name');
        $travaille->update();
        return redirect('/vtrv')->with('status','modifier avec succés');

    }

    public function suptrv($id)
    {
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
            return redirect('/vtrv')->with('status1','modifier avec succés');
        }
    }

    public function modcv($id){
        $cv =cv::where('id',$id)->first();
        $wilaya=wilaya::get();
        if(Auth::user()->id==$cv->user_id)
        {
            return view('modcv' , compact('cv','wilaya'));
        }
        else
        {
            return back();
        }

    }


    public function misecv(request $request ,$id)
    {
        $cv = cv::find($id);
        if($request->hasFile('diplome'))
        {
            $path='images/cv/dip/'.$cv->diplome_formation;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('diplome');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/cv/dip',$filename);
            $cv->diplome_formation=$filename;
        }


        if($request->hasFile('Curriculum-vital'))
        {
            $path='images/cv/'.$cv->cv;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('Curriculum-vital');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/cv',$filename);
            $cv->cv=$filename;
        }
        $cv->nom=$request->input('nom');
        $cv->prenom=$request->input('prenom');
        $cv->date_de_naissanse=$request->input('date');
        $cv->adresse=$request->input('adresse');
        $cv->nom_wilaya=$request->input('wilaya');
        $cv->numero_de_telephone=$request->input('phone');
        $cv->adresse_email=$request->input('Email');
        $cv->genre=$request->input('genre');
        $cv->user_id=$request->input('user_id');
        $cv->user_name=$request->input('user_name');
        $cv->update();
        return redirect('/vcv')->with('status','modifier avec succés');

    }

    public function supcv($id)
    {
        $cv = cv::find($id);
        if($cv->cv)
        {
            $path = 'images/cv/dip/' .$cv->diplome_formation;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $path = 'images/cv/' .$cv->cv;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $cv->delete();
            return redirect('/vcv')->with('status1','modifier avec succés');
        }
    }

    public function modcand($id1 , $id2){
        $candidature =candidature::where('id',$id1)->find($id1);
        $travaille =travaille::where('id',$id2)->find($id2);
        $wilaya=wilaya::get();
        if(Auth::user()->id==$candidature->user_id & $candidature->trv_id==$travaille->id)
        {
            return view('modcand' , compact('candidature','wilaya' , 'travaille'));
        }
        else
        {
            return back();
        }

    }


    public function misecand(request $request ,$id)
    {
        $candidature = candidature::find($id);
        if($request->hasFile('diplome'))
        {
            $path='images/candidature/candidaturedip/'.$candidature->diplome_formation;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('diplome');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/candidature/candidaturedip',$filename);
            $candidature->diplome_formation=$filename;
        }


        if($request->hasFile('Curriculum-vital'))
        {
            $path='images/candidature/cv/'.$candidature->cv;
            if(File::exists($path))
            {
                File::delete($path);

            }

            $file=$request->file('Curriculum-vital');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/candidature/cv',$filename);
            $candidature->cv=$filename;
        }
        $candidature->nom=$request->input('nom');
        $candidature->prenom=$request->input('prenom');
        $candidature->trv_id=$request->input('trvid');
        $candidature->date_de_naissanse=$request->input('date');
        $candidature->adresse=$request->input('adresse');
        $candidature->nom_wilaya=$request->input('wilaya');
        $candidature->numero_de_telephone=$request->input('phone');
        $candidature->adresse_email=$request->input('Email');
        $candidature->genre=$request->input('genre');
        $candidature->intitule=$request->input('intitule');
        $candidature->user_id=$request->input('user_id');
        $candidature->user_name=$request->input('user_name');
        $candidature->update();
        return redirect('/vcand')->with('status','modifier avec succés');
    }

    public function supcand($id)
    {
        $candidature = candidature::find($id);
        if($candidature->cv)
        {
            $path = 'images/candidature/candidaturedip/' .$candidature->diplome_formation;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $path = 'images/candidature/cv/' .$candidature->cv;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $candidature->delete();
            return redirect('/vcand')->with('status1','modifier avec succés');
        }
    }

    public function projet(){
        $wilaya=wilaya::orderBy('numero_du_wilaya', 'asc')->get();
        return view('projet' , compact('wilaya'));
    }

    public function annonce(){
        $wilaya=wilaya::orderBy('numero_du_wilaya', 'asc')->get();
        return view('annonce' , compact('wilaya'));
    }

    public function entrerprojet(request $request){
        $projet=new Projet;
        if($request->hasFile('photo'))
        {

            $file=$request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/projet/images',$filename);
            $projet->photo=$filename;
        }
        $projet->intitule=$request->input('intitule');
        $projet->type=$request->input('type');
        $projet->besoins=$request->input('besoins');
        $projet->bénéficier=$request->input('beneficier');
        $projet->condition=$request->input('condition');
        $projet->nom_wilaya=$request->input('wilaya');
        $projet->adresse=$request->input('adresse');
        $projet->numero_de_telephone=$request->input('phone');
        $projet->adresse_email=$request->input('Email');
        $projet->description=$request->input('description');
        $projet->user_id=$request->input('user_id');
        $projet->user_name=$request->input('user_name');
        $projet->save();
        return redirect('/');
    }

    public function entrerannonce(request $request){
        $annonce=new Annonce;
        if($request->hasFile('photo'))
        {

            $file=$request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('images/annonce/images',$filename);
            $annonce->photo=$filename;
        }
        $annonce->titre=$request->input('titre');
        $annonce->sous_titre=$request->input('soustitre');
        $annonce->adresse=$request->input('adresse');
        $annonce->nom_wilaya=$request->input('wilaya');
        $annonce->numero_de_telephone=$request->input('phone');
        $annonce->adresse_email=$request->input('Email');
        $annonce->description=$request->input('description');
        $annonce->user_id=$request->input('user_id');
        $annonce->user_name=$request->input('user_name');
        $annonce->save();
        return redirect('/');
    }

    public function lsprojets(){
        $projet=projet::orderBy('approuvé', 'desc')->paginate(2);
        return view('lsprojets' , compact('projet'));
    }

    public function lsannonces(){
        $annonce=annonce::orderBy('approuvé', 'desc')->paginate(2);
        return view('lsannonces' , compact('annonce'));
    }

    public function lsidée(){
        $annonce=annonce::orderBy('approuvé', 'desc')->paginate(2);
        return view('lsidée' , compact('annonce'));
    }

    public function searchp()
    {
        $search_text=$_GET['query'];
        $projetsea=projet::where('nom_wilaya','LIKE','%'.$search_text.'%')
        ->orwhere('intitule','LIKE','%'.$search_text.'%')
        ->orwhere('type','LIKE','%'.$search_text.'%')
        ->orwhere('adresse','LIKE','%'.$search_text.'%')->orderBy('approuvé', 'desc')->paginate(2);
        return view('searchp' ,compact(['projetsea']));


    }

    public function projetview($id){
        $projetv =projet::where('id',$id)->find($id);
        return view('projetview' , compact('projetv'));
    }


}
