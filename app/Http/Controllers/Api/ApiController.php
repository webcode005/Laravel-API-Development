<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;

class ApiController extends Controller
{
        //Create Student
        public function CreateStudent(Request $request) {
            return student::create($request->all);
        }
        // List Students
            public function listStudents() {
                $students = Student::all();
                return response()->json([
                            "status" => 1,
                            "message" => "Students",
                            "data" => $students
                        ]);             
                

        }
        // Single student API
           
        public function getSingleStudent($id) {
            return Student::find($id);

        }



        // Update Student
        public function updateStudent(Request $request , $id) {
                
                $student = Student::findOrFail($id);
                $student->update($request->all());

                return $student;
        }

        // Delte Student
        
        public function deleteStudent($id) {
            Student::find($id)->delete();

                return 204;
        }   
}
