<?php

namespace App\Http\Controllers;
use App\Room;
use App\Ward;
use App\WardRoom;
use Hamcrest\Thingy;
use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Http\Controllers\WardRoomController;



class WardController extends Controller
{
    public function add(Request $request)
    {


        if ($request->isMethod(Request::METHOD_POST)) {
            $this->validate($request, array(
                'ime' => 'required|max:255',
                'prezime' => 'required| max:255',
                'oib' => 'required|size:11|unique:Wards',
                'br_zdravstvene' => 'required|size:9|unique:Wards',
                'kontakt'=>'max:64',
                'br_sobe'=>'required|not in:Nije unešeno'
            ));



            $novi_korisnik = new Ward();
            $novi_korisnik->first_name = e($request->ime);
            $novi_korisnik->last_name = e($request->prezime);
            $novi_korisnik->dat_rođenja=e($request->dat_rođenja);
            $novi_korisnik->adress = e($request->adresa);
            $novi_korisnik->oib = e($request->oib);
            $novi_korisnik->br_zdravstvene = e($request->br_zdravstvene);
            $novi_korisnik->br_sobe = e($request->br_sobe);
            $novi_korisnik->kontakt=e($request->kontakt);
            $novi_korisnik->terapija=e($request->terapija);
            $novi_korisnik->stvari=e($request->stvari);
            $novi_korisnik->save();

            app('App\Http\Controllers\WardRoomController')->create($novi_korisnik->id,$novi_korisnik->br_sobe);


            SESSION::flash('uspjeh', 'Osoba uspješno dodana!');



        }
        $ids=Room::pluck('id');
        $ids=$ids->toArray();
        array_unshift($ids,'Nije unešeno');
        $ids=array_combine($ids,$ids);
        return view('Person.add')->with('ids',$ids);
    }

    public function show($id)
    {
        $Ward = Ward::find($id);


        $slike = [];
        $filesInFolder = \File::files(public_path('/uploads/nalazi/'.$Ward->map_name));

        foreach($filesInFolder as $path)
        {
            $slike[] = pathinfo($path)['basename'];
        }


        return view('Person.info')->with('Ward',$Ward);

    }

    public function delete($id)
    {

        $Ward = Ward::find($id);  // pretraga korisnika preko ID-a
        $slika=$Ward->profile_picture;

        if($slika!='default.jpg')
        File::delete(public_path('uploads/profile_pictures/'.$slika));
        $this->rrmdir(public_path('uploads/nalazi/'.$Ward->id.$Ward->first_name.$Ward->last_name));

        DB::table('ward_rooms')->where('Ward_id',$Ward->id)->delete();

        $Ward->delete(); //pozivanje delete funkcije na elementu
        SESSION::flash('obrisan', 'Osoba je uspješno obrisana!');
        return redirect()->route('addWard');

    }

    public function allWards()
    {
        $Wards = Ward::orderBy('last_name')->get();

        return view('Person.list', [
            'Wards' => $Wards
        ])->with('Wards', $Wards);

    }

    public function editWard($id, Request $request)
    {

        if ($request->isMethod(Request::METHOD_PUT)) {
            $this->validate($request, array(
                'first_name' => 'required|max:255',
                'first_name' => 'required| max:255',
                'oib' => 'required|size:11',
                'br_zdravstvene' => 'required|size:9',
                'br_sobe'=>'required|not in:Nije unešeno'
            ));


            $novi_korisnik = Ward::find($id);
            $novi_korisnik->first_name = e($request->first_name);
            $novi_korisnik->last_name = e($request->last_name);
            $novi_korisnik->dat_rođenja=e($request->dat_rođenja);
            $novi_korisnik->adress = e($request->adress);
            $novi_korisnik->oib = e($request->oib);
            $novi_korisnik->br_zdravstvene = e($request->br_zdravstvene);

            if($novi_korisnik->br_sobe!=$request->br_sobe){
            app('App\Http\Controllers\WardRoomController')->delete($novi_korisnik->id,$novi_korisnik->br_sobe);
            app('App\Http\Controllers\WardRoomController')->create($novi_korisnik->id,$request->br_sobe);
                $novi_korisnik->br_sobe = e($request->br_sobe);
            }
            else
                $novi_korisnik->br_sobe = e($request->br_sobe);


            $novi_korisnik->terapija=e($request->terapija);
            $novi_korisnik->stvari=e($request->stvari);
            $novi_korisnik->kontakt=e($request->kontakt);
            $novi_korisnik->save();

            SESSION::flash('promjena', 'Podatci uspješno promjenjeni!');


            $ids=Room::pluck('id');
            $ids=$ids->toArray();
            array_unshift($ids,$novi_korisnik->br_sobe);
            $ids=array_combine($ids,$ids);
            return view('Person.edit')->with(['Ward'=>$novi_korisnik,'ids'=>$ids]);

        }
        else{
            $novi_korisnik=Ward::find($id);
            $ids=Room::pluck('id');
            $ids=$ids->toArray();
            array_unshift($ids,$novi_korisnik->br_sobe);
            $ids=array_combine($ids,$ids);
            return view('Person.edit')->with(['Ward'=>$novi_korisnik,'ids'=>$ids]);
        }
    }
    public function addProfile_picture(Request $request,$id)
    {
        if($request->hasFile('profile_picture'))
        {
            $this->validate($request, array(
                'profile_picture' => 'image',));    // pogledaj jeli slika

            $Ward=Ward::find($id);
            $stara_slika=$Ward->profile_picture;
            if($stara_slika!="default.jpg")
                File::delete(public_path('uploads/profile_pictures/'.$stara_slika)); // ako se mijenja slika a nije prvi put onda izbrisi proslu

            $slika=$request->file('profile_picture');                   //spremi sliku u folder
            $ime=time().'.'.$slika->getClientOriginalExtension();
            Image::make($slika)->resize(300,300)->save(public_path('uploads/profile_pictures/'.$ime));


            $Ward->profile_picture=$ime;
            $Ward->save();
            return view('Person.info')->with('Ward', $Ward);

        }
        else
        {
            $Ward=Ward::find($id);
            return view('Person.info')->with('Ward', $Ward);

        }


    }

    public function addPictures(Request $request, $id)
    {

        $Ward=Ward::find($id);
        $mapname=$Ward->id.$Ward->first_name.$Ward->last_name;
        $Ward->map_name=$mapname;
        $Ward->save();


        $slika=$request->file('addPictures');
        $ime_slike=time().'.'.$slika->getClientOriginalExtension();

        if(file_exists(storage_path('app/public/uploads/nalazi/'.$mapname)))
        {
            Image::make($slika)->save(storage_path('app/public/uploads/nalazi/'.$mapname.'/'.$ime_slike));
            return redirect()->route('showWard', ['id' => $id]);
        }


        else
        {
            File::makeDirectory(storage_path('app/public/uploads/nalazi/' . $mapname,$mode = 777,true));
            Image::make($slika)->save(storage_path('app/public/uploads/nalazi/'.$mapname.'/'.$ime_slike));
            return redirect()->route('showWard', ['id' => $id]);
        }
    }

    public function deletePicture($id,$slika)
    {
        $Ward=Ward::find($id);
        file::delete(storage_path('app/public/uploads/nalazi/'.$Ward->id.$Ward->first_name.$Ward->last_name.'/'.$slika));
        return redirect()->route('showWard', ['id' => $id]);


    }
   public  function rrmdir($dir)    // brise rekurrzivno fileove u direktoriju kad se brise osoba
   {
        if (is_dir($dir))
        {

            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir."/".$object))
                        rrmdir($dir."/".$object);
                    else
                        unlink($dir."/".$object);
                }
            }
            rmdir($dir);
        }
   }

   public function showImage($id,$filename)
   {
       $ward=Ward::find($id);
       return response()->download(storage_path('app/public/uploads/nalazi/'.$ward->id.$ward->first_name.$ward->last_name.'/'.$filename), null, [], null);
   }

}
