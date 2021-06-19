<?php

namespace App\Http\Controllers\relations;

use App\Http\Controllers\Controller;
use App\Models\country;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\phone;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelationsController extends Controller
{
    public function hasOneRelation ()
    {
       $user = User::with(['getphone' => function($query)
       {
           $query -> select('user_id','code','phone_number') ;
       }])->find(Auth::user()->id) ;
    //    $phone = $user->getPhone;
    //    return $user -> getphone -> code ;
       return response()->json($user) ;
    }

    public function hasOneRelationreverse ()
    {
        $phone = Phone::with(['user' => function($query)
        {
            $query -> select ('name','id') ;
        }])->find(2) ;
        $phone ->makevisible(['user_id']) ;
        // $phone ->makeHidden(['code']) ;
        return response()->json($phone);
    }

    public function usersHasPhone ()
    {
        // $users = User::whereHas('phone')->get('name') ;
        
        $users = User::whereHas('phone' , function($query)
        {
            $query->where('code','02') ;
        })->get('name') ;
        return $users ;
    }

    public function usersNotPhone ()
    {
        $users = User::whereDoesnthave('phone')->get('name') ;
        return $users ;
    }
################################## One to Many  Relations ###########################
    public function getDoctors()
    {
        // $hospital = Hospital::find(1) ;
        // $hospital = Hospital::where('id',1)->get() ;
        //$hospital = Hospital::first() ;

        $hospital = Hospital::with('doctors')->find(2);
        // return response()->json($hospital) ;

        $doctors = $hospital->doctors ;

        foreach($doctors as $doc)
        {
            echo $doc['name'] . "<br>" ;
        }
    }

    public function hospitals()
    {

        $hospitals = Hospital::select('id', 'name', 'address')->get();
        return view('doctors.hospitals', ['hospitals' => $hospitals]);
    }

    public function doctors($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);
        $doctors = $hospital->doctors;
        return view('doctors.doctors', compact('doctors'));
    }

    public function hospitalsHasDoctor()
    {
        return $hospitals = Hospital::whereHas('doctors')->get();
    }

    public function HasMalesDoctor()
    {
        return $hospitals = Hospital::whereHas('doctors' , function($query)
        {
            $query->where('gender' ,2) ;
        })->get();
    }

    public function hasnotDoctors()
    {
        return $hospitals = Hospital::whereDoesnthave('doctors')->get('name');
    }

    public function deleteHospital($hospital_id)
    {
        $hospital = Hospital::find($hospital_id);
        if (!$hospital)
            return abort('404');
        //delete doctors in this hospital
        $hospital->doctors()->delete();
        $hospital->delete();
        return redirect() -> route('hospital.all');
    }

    public function DoctorServices()
    {
        $doctor = Doctor::with('services')->find(1);
        $services = $doctor -> services ;
        foreach($services as $ser)
        {
            echo $ser['name'] ."<br>" ;
        }
    }

    public function ServiceDoctors()
    {
        return $doctors = Service::with(['doctors' => function ($q) {
            $q->select('doctors.id','name');
        }])->find(1);
    }

    public function getDoctorServicesById($doctorId)
    {
        $doctor = Doctor::find($doctorId);
        $services = $doctor->services;  //doctor services

        $doctors = Doctor::select('id', 'name')->get();
        $allServices = Service::select('id', 'name')->get(); // all db serves

        return view('doctors.services', compact('services', 'doctors', 'allServices'));
    }

    public function saveServices(Request $req)
    {
        $doctor = Doctor::find($req->doctor_id) ;
        // $doctor ->services()->attach($req->servicesIds) ;
        // $doctor ->services()->sync($req->servicesIds) ;
        $doctor ->services()->syncwithoutdetaching($req->servicesIds) ;
        return redirect()->back() ;
    }

    public function getPatientProfile()
    {
        $patient = Patient::find(2) ;
        return $patient->doctor ;
    }

    public function getdoctorsbycountry()
    {
        $docs= country::with(['doctors' => function($q)
        {
            $q->select('doctors.name') ;
        }])->find(1);

        return  $docs ;
    }

    public function getdoctorsbyaccessors()
    {
        $doctors = Doctor::select('name','gender')->get();
        return $doctors ;

        // if(isset ($doctors) && $doctors->count() > 0)
        // {
        //     foreach($doctors as $doc)
        //     {
        //         $doc->gender = $doc->gender == 1 ? 'male' : 'famle' ; 
        //     }
        // }
    }
}






