<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class studentController extends Controller
{
    public function index(){


        $students = Student::all();
        if(!$students -> isEmpty()){
            return response()->json($students,200);
        }else{
            return 'This is empty';
        }

    }

    public function save(Request $request){

       $validator = Validator::make($request->all(),[

            'name' => 'required',
            'email' => 'required|email',
            'number_phone' => 'required'
        ]);

        if($validator ->fails()){
            return 'Mistake when you text the data';
        }
            
        $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'number_phone' => $request->number_phone
            ]);
            return 'Added correctly';
        


    }

    public function showOne($id){
        $student = Student::find($id);

        if(!$student -> isEmpty()){
            return response()->json($student,200);
        }else{
            return 'it doesnt exist !!!';
        }
    }

    public function deploy($id){
        $student = Student::find($id);

        if(!$student -> isEmpty()){
            $student->delete();
            return 'Removed correctly';

        }else{
            return 'it doesnt exist !!!';
        }
    }


}
