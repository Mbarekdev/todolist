<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/a896a72aca.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="./css/main.css">
    <title>Todo list for HbusinessSquare</title>
</head>
<body>

    <header>
        <h1> Todos</h1>
    </header>
    <main class="container">
        <form action="">
            <input type="text" class="todo-input">
            <select name="sortList" class="sortList" value="0">
                <option value="1"> List 1</option>
                <option value="2"> List 2</option>
                <option value="3"> List 3</option>
            </select>
        </form>
        <div class="todo-container">
            <ul class="todo-list">@foreach ($todos as $item)<div class="todo @if($item->status == 1) Completed @endif {{$item->category}}"><button class="completedBtn "><i class="fas fa-check @if($item->status == 1) green @endif"></i></button><li class="todo-item" >{{$item->name}}<input type="hidden" class="inputValue" value="{{$item->id}}"></li><button class="deletedBtn"><i class="fas fa-trash"></i></button></div>@endforeach</ul>
        </div>
        <div class="todoFilter"><ul class="todoF"><li><span class="todoItemCount"></span>Items</li><li>All</li><li>Active</li><li>Completed</li><li>Clear</li></ul></div>
    </main>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>