<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT TASK</title>
     <!--CSS link-->
       <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!--COMMENT COPY PATE-->
    <h1>EDIT TASK</h1>

    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        <!--we use PUT becuase of Route::put('/tasks/{id}',)-->
        @method('PUT')  

        <!--the task name-->
        <label>Task Name:</label>
    <input type="text" name="task_name" value="{{ $task->task_name }}" required>

        <!--the discription-->
        <label for="discription">Description:</label>
        <textarea name="discription" required>{{$task->discription}}</textarea><br><br>

        <!--the status-->
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="pending" {{$task->status == 'pending' ? 'selected' : ''}}>Pending</option>
            <option value="in_progress" {{$task->status == 'in_progress' ? 'selected' : ''}}>In Progress</option>
            <option value="completed" {{$task->status == 'completed' ? 'selected' : ''}}>Completed</option>
        </select><br><br>

        <!--the due date-->
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" value="{{$task->due_date}}" required><br><br>

        <button type="submit">Update Task</button>
    </form>
</body>
</html>