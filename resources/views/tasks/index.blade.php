<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK MANAGER</title>

     <!--CSS link-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>PERSONAL TASK MANAGER</h1>

    <a href="/tasks/create">Add a new Task</a>

    <hr>

    <h2>My TASK</h2>

    <!--COMMENT COPY PATE-->

    @if($tasks->count() > 0)

        <!--this is table-->
        <table border="1" cellpadding="10">
            <tr>
                    <!-- our rows of heads-->
                    <th>ID</th>
                    <th>Task Name</th>
                    <th>Discription</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>ACTION</th>
                    
            </tr>

            @foreach($tasks as $task)
            <!--here it means to go through task in $tasks-->
                <tr>
                    <!-- our rows of data/cells-->
                    <td>{{$task->id}}</td>
                    <td>{{$task->task_name}}</td>
                    <td>{{$task->discription}}</td>
                    <td>{{$task->status}}</td>
                    <td>{{$task->due_date}}</td>
                    
                    <td>

                        <a href="/tasks/{{$task->id}}/edit">Edit</a>

                        <form action="/tasks/{{$task->id}}" method="POST" style="display:inline;">
                            <!--this means it protect from from unautherized requets @csrf-->
                            @csrf
                            @method('DELETE')
                            <button type="submit">DELETE</button>
                        </form>

                        <form action="/tasks/{{$task->id}}/status" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit">CHANGE STATUS</button> 
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
        @else
            <p>NO TASK FOUND</p>

         @endif
</body>
</html>