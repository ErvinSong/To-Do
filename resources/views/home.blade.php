<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width-device-width, initial-scale=1.0">
    <title> To Do List </title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/mdb.min.css" />
    <script type="text/javascript" src="js/mdb.min.js"></script>
</head>
<body style="background-color:cornflowerblue;"">
    <p><center>
    <div class = "container w-25 mt-5">
        <div class = "card shadow-sm">
            <div class = "card-body">
                <h3>To Do List</h3>
                <form action = "{{route('store')}}" method = "POST" autocomplete = "off">
                    @csrf
                    <div class = "input-group">
                        <input type = "text" name = "content" class = "form-control" 
                            placeholder = "Add your new todo">
                        <button type = "submit" class = "btn btn-dark btn-sm px-4 "><i class = "fas fa-plus"></i></button>
                    </div>
                </form>
                @if (count($todolists))
                <ul class = "list-group list-group-flush mt-3">
                    @foreach ($todolists as $todolist)
                        <li class = "list-group-item">
                            <form action = "{{route('destroy', $todolist -> id)}}" method = "POST">
                                {{$todolist -> content}}
                                @csrf
                                @method('delete')
                                <button type = "submit" class = "btn btn-link btn-sm float-end">
                                    <i class = "fas fa-trash">
                                    </i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
                @else
                <p class = "text-center mt-3">No Tasks!!!</p>
                @endif
            </div>
            @if (count($todolists))
                <div class = "card-footer">
                    You have {{count($todolists)}} pending tasks.
                </div>
            @else
            @endif
        </div>
    </div>
    </center></p>
</body>
</html>