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

        if(!$student){
            return 'There is not student!';
        }

        return response()->json($student,200);

    }

    public function deploy($id){
        $student_find = Student::find($id);
        
        $student_find->delete();
        return "removed";
    }

    public function update(Request $request,$id){
        $student = Student::find($id);



        $validator = Validator::make($request->all(),[

            'name' => 'required',
            'email' => 'required|email',
            'number_phone' => 'required'
        ]);

        if($validator ->fails()){
            return 'Mistake when you text the data';
        }
            
        $student->name = $request->name;
        $student->email = $request->email;
        $student->number_phone = $request->number_phone;
        
        $student->save();

        return "Updated student $student";


    }


}
