@extends('index')
@section('content')
<div class="container">
    <h1>todos</h1>
    <form>
        <div class="form-row">

                <div class="col-12">
                    <input type="text" class="form-control" placeholder="What needs to be done ?">
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
@endsection