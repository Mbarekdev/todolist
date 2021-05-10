<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- cdn link for css boostrap files --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>To do list tiny project</title>
</head>
<body>

    <div class="container">
        <h1>todos</h1>
        <form id="formTodos" method="POST" action="{{ url('Taskadded') }}">
            <div class="form-row">
    
                    <div class="col-12">
                        <input type="text" id="addTask" name="namel" class="form-control namelist" placeholder="What needs to be done ?">
                    </div>
                    <div class="col-3">
                        <select class="custom-select" id="inlineFormCustomSelect">
                            <option selected>Liste 1</option>
                            <option value="1">Liste 2</option>
                            <option value="2">Liste 3</option>
                            <option value="3">Liste 4</option>
                        </select>
                    </div>
    
                    <div class="col-12 result">
                        <input type="text" class="form-control"  readonly>
                        <span class="delete">X</span>
                    </div>
                
                    <div class="col-12 actions">
                        <ul class="listManager">
                            <li class="items"><span>0</span> item left</li>
                            <li class="items "><a href="#" class="active">All</a></li>
                            <li class="items"><a href="#">Active</a></li>
                            <li class="items"><a href="#">Completed</a></li>
                            <li class="items"><a href="#">Clear completed</a></li>
                        </ul>
                    </div>
                    
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
{{-- cnd link for boostrap js files and app.js file for functionalities of todolist --}}
<script src="js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>