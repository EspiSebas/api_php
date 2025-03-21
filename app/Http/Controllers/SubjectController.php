<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    public function index(){
        
        $subject = Subject::all();
        
        if(!$subject -> isEmpty()){
             return response()->json($subject,200);
        }else{
             return 'This is empty';
        }
     
     }
 
     public function saveSubject(Request $request){
        
        $validator = Validator::make($request->all(),[
 
             'name' => 'required',
             'class_room' => 'required',
             'student_id' => 'required|exists:student,id'
             
         ]);
         
         
         if($validator ->fails()){
             return 'Mistake when you text the data';
         }
             
         $subject = Subject::create([
                 'name' => $request->name,
                 'class_room' => $request->class_room,
                 'student_id' => $request->student_id, 
                
             ]);
             return response()->json($subject,200);
 
        }


        public function showOne($id){
            $subject = Subject::find($id);

            if(!$subject){
                return 'Not found the subject';
            }

            return response()->json($subject,200);
        }

        public function deploySubjet($id){

            $subjetFind = Subject::find($id);
            if($subjetFind){
                $subjetFind->delete();
                return "removed";
            }

            return 'Not found !!';
            
        }
 
        public function updateSubject(Request $request,$id){

            $subject = Subject::find($id);
        
            $validator = Validator::make($request->all(),[
     
                 'name' => 'required',
                 'class_room' => 'required',
                 'student_id' => 'required|exists:student,id'
                 
             ]);
             
             
             if($validator ->fails()){
                 return 'Mistake when you text the data';
             }
                 
             $subject->name = $request->name;
             $subject->class_room = $request->class_room;
             $subject->student_id = $request->student_id;
            
             $subject->save();

             return "Updated subject $subject";
     
            }
 
}
