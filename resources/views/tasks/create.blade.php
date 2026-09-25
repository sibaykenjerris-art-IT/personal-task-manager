<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD TASK</title>
    <!--CSS link-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
        <!--COMMENT COPY PATE-->
         <h1>Add New Task</h1>

         <!--this is where we create a new task-->
         <!--here this matches our Route::post('/tasks', [TaskController::class, 'store']);-->
        <form action="/tasks" method="POST">

         @csrf

                <label>Task Name:</label>
                <input type="text" name="task_name" required>

                <br><br>

                <label>Description:</label>
                <textarea name="discription" required></textarea>

                <br><br>
    
                <label>Status:</label>
                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>

                <br><br>

                <label>Due Date:</label>
                    <input type="date" name="due_date" required>

                <br><br>

                <button type="submit">Add Task</button>

            </form>

            <br>

            <a href="/tasks">Back to Tasks</a>

    
</body>
</html>