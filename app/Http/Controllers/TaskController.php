<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; //we have connected the TASK MODEL in the TAskCotroller
//it allows the controller to use the task model 
// the flow would be like this Blade(template) -> Route -> cntroller -> Model -> Database(atong MYSQL :) );
class TaskController extends Controller
{
    //tasks!!!! not task 
    public function index()
    {
        //so we retrive all task from the database
        //we getting all task records and putting them inside $task as a variable
        $tasks = Task::all();

         //then send the task to the task page like we outputing the data
         //here it means we open tasks/index.blade.php page and give the $task data
         return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        //so this is the page where we create a new task and this connects to the Route::get('/tasks/create', thingy
        //to the  our blade file to create new tasks ok
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        //here it save/store a new task to databse
        //we are using some kind of associate array to store data in databse
        //Task::create([ creates new records in task info to enter data in databse
        Task::create([
            'task_name'=>$request->task_name,
            'discription'=>$request->discription,
            'status'=>$request->status,
            'due_date'=>$request->due_date,
        ]);

        //after saving we go back to task list/page
        return redirect('/tasks');
    }
    public function edit($id)
    {
        //here it search a task using id
        $task = Task::findOrFail($id);

        //then it sends the task to the edit page
        //which is the blade file to edit task
        // $id  came from the route Route::get('/tasks/{id}/edit',[TaskController::class, 'edit']); 
        //findOrFail means finding the task by its id and but it doesnt exit it will error
        return view('tasks.edit',compact('task'));
    }

    public function update(Request $request, $id)
    {
        //here it find the task we want to update acc to its id
        $task = Task::findOrFail($id);

        //updates the info of the task
        $task->update([
            'task_name'=>$request->task_name,
            'discription'=>$request->discription,
            'status'=>$request->status,
            'due_date'=>$request->due_date,
        ]);

        //after updating it go's back to the task list page
        //redirect means go back to the page
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        //here it finds the task with its ID that we want to delete
        $task = Task::findOrFail($id);

        //here it mean delete the task from the database ERASE BOI
        $task->delete();

        //then after deleting it go back to task list/page
        return redirect('/tasks');
    }

    public function updatestatus($id)
    {

        ////here it finds the task with its ID that we want to change status
        $task = Task::findOrFail($id);

        //we use if conditions to see if the task status conditions pending,completed
        //if its PENDING it will change to completed if its been clicked so user can change status by click later on
        if($task->status == 'Pending')
            {
                $task->status = 'Completed';
            }else{
                $task->status = 'Pending';
            }
        
            //then it saves the new task status to DATABASE
            $task->save();

            ////then after it updated the status it go back to task list/page
            return redirect('/tasks');

    }


}
