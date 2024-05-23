<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;

class EmployeemngController extends Controller
{
        public function index(){
            $employees = EmployeeModel::all();
    
            return view('employee.index', compact('employees'));
        }
    
        public function store(Request $request)
        {
            $this->validateInput($request);
    
            $keys = ['first_name', 'last_name', 'birthday', 'phone'];
            $input = $this->createQueryInput($keys, $request);
    
            EmployeeModel::create($input);
    
            return redirect()->route('employee.index');
        }
    
        public function edit($id)
        {        
            $employee = EmployeeModel::findOrFail($id);
    
            return view('employee.edit', compact('employee'));
        }
    
        public function update(Request $request, $id)
        {
            $this->validateInput($request);
    
            $employee = EmployeeModel::findOrFail($id);
    
            $keys = ['first_name', 'last_name', 'birthday', 'phone'];
            $input = $this->createQueryInput($keys, $request);
    
            $employee->update($input);
    
            return redirect()->route('employee.index');
        }
    
        public function destroy($id)
        {
            $employee = EmployeeModel::findOrFail($id);
    
            $employee->delete();
    
            return redirect()->route('employee.index');
        }
    
        protected function validateInput(Request $request)
        {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'birthday' => 'required|date',
                'phone' => 'required|string|max:15',
            ]);
        }
        protected function createQueryInput(array $keys, Request $request)
        {
            return $request->only($keys);
        }
    }
