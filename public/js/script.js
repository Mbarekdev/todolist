// selectors
const todoInput = document.querySelector(".todo-input");
const todoList = document.querySelector(".todo-list");
const sortList = document.querySelector(".todoFilter");
const filderDiv = document.querySelector(".todoFilter");
const SortbyCat = document.querySelector(".sortList");
const itemcount = document.querySelector(".todoItemCount");

// variables
var result = null;

//Event listeners
document.addEventListener("DOMContentLoaded", getTodolist);
todoInput.addEventListener("keydown", addTodo);
todoList.addEventListener("click", deletcheck);
sortList.addEventListener("click", sortTodo);
todoList.addEventListener("dblclick", updateondoubleclick);
SortbyCat.addEventListener("click", SortbyCategory);

//Functions

// add todo to the list of tasks
function addTodo(event) {
    if (event.key == "Enter") {
        // prevent form from submit
        event.preventDefault();

        // Create todo div to display the input result
        const todoDiv = document.createElement("div");
        todoDiv.classList.add("todo");
        todoDiv.classList.add(SortbyCat.value);

        //Check list button;
        const completedButton = document.createElement("button");
        completedButton.innerHTML = '<i class="fas fa-check"></i>';
        completedButton.classList.add("completedBtn");
        todoDiv.appendChild(completedButton);

        //Create li
        const newTodo = document.createElement("li");
        newTodo.classList.add("todo-item");
        newTodo.innerText = todoInput.value;

        // check if the input is empty
        if (todoInput.value === "") {
            alert("you much enter a value");
        } else {
            todoDiv.appendChild(newTodo);
        }

        // Save the next todo to the database
        savetodo(todoInput.value, SortbyCat.value);

        //create input into list of li
        const newInput = document.createElement("input");
        newInput.classList.add("inputValue");
        newInput.setAttribute("type", "hidden");
        newInput.setAttribute("value", result);
        newTodo.appendChild(newInput);

        //Delete list button;
        const deleteButton = document.createElement("button");
        deleteButton.innerHTML = '<i class="fas fa-trash"></i>';
        deleteButton.classList.add("deletedBtn");
        todoDiv.appendChild(deleteButton);

        //Append to List
        todoList.appendChild(todoDiv);

        //clear todo input value
        todoInput.value = "";
    }
}

// delete the item from the task also check the task if the task completed

function deletcheck(even) {
    const item = even.target;
    //Delete task if it completed
    if (item.classList[0] === "deletedBtn") {
        const todo = item.parentElement;
        deletetodo(todo);
        todo.remove();
    }

    //check Task if it completed

    if (item.classList[0] === "completedBtn") {
        const todo = item.parentElement;
        if (todo.classList[1] === "Completed") {
            updatecheck(todo, 0);
        } else {
            updatecheck(todo, 1);
        }
        todo.childNodes[0].childNodes[0].classList.toggle("green");
        todo.classList.toggle("Completed");
    }
}
//On double click make an update on current todo
function updateondoubleclick(even) {
    const item = even.target; // get target
    if (item.classList[0] === "todo-item") {
        // check if item has class
        var id = item.childNodes[1].value;

        // create input field and make it visible also affect the the value of the element that will be updated
        const EditInput = document.createElement("input");
        EditInput.setAttribute("value", item.innerText);
        item.innerText = "";
        EditInput.setAttribute("type", "text");
        EditInput.setAttribute("class", "EditeInput");
        item.appendChild(EditInput);
        EditInput.select();
        EditInput.focus();

        // add function  on keydown enter to save and update the DOM element
        EditInput.onkeydown = function (e) {
            if (e.key === "Enter") {
                item.innerText = EditInput.value;
                var inputValue = EditInput.value;
                //create input into list of li
                const newInput = document.createElement("input");
                newInput.classList.add("inputValue");
                newInput.setAttribute("type", "hidden");
                newInput.setAttribute("value", id);
                item.appendChild(newInput);
                // call function  update and save the new updated value
                updatetodo(inputValue, id);
                // Delete the element input
                EditInput.remove();
            }
        };
    }
}

// sort the list of tasks by clicking on options
function sortTodo(even) {
    const todos = todoList.childNodes;
    todos.forEach(function (todoF) {
        switch (even.target.innerText) {
            case "All":
                todoF.style.display = "flex";
                getTodolist();
                break;
            case "Completed":
                if (todoF.classList.contains("Completed")) {
                    todoF.style.display = "flex";
                    getTodolist();
                } else {
                    todoF.style.display = "none";
                    getTodolist();
                }
                break;
            case "Active":
                if (!todoF.classList.contains("Completed")) {
                    todoF.style.display = "flex";
                    getTodolist();
                } else {
                    todoF.style.display = "none";
                    getTodolist();
                }
                break;
            case "Clear":
                const todos = todoList.childNodes;
                for (let i = 0; i < todos.length; i++) {
                    if (todos[i].classList.contains("Completed")) {
                        deletecompleted(1);
                        todos[i].remove();
                        getTodolist();
                    }
                }
        }
    });
}

// Display the todo list by Catégory chosen.

function SortbyCategory(even) {
    const todos = todoList.childNodes;
    todos.forEach(function (todo) {
        console.log(todo.innerText);
        console.log(even.target.value);
        switch (even.target.value) {
            case "1":
                if (todo.classList.contains(1)) {
                    todo.style.display = "flex";
                } else {
                    todo.style.display = "none";
                }
                break;
            case "2":
                if (todo.classList.contains(2)) {
                    todo.style.display = "flex";
                } else {
                    todo.style.display = "none";
                }
                break;
            case "3":
                if (todo.classList.contains(3)) {
                    todo.style.display = "flex";
                } else {
                    todo.style.display = "none";
                }
                break;
        }
    });
}

// Get the count of the all todo list available
function getTodolist() {
    const listcountItem = todoList.childNodes;
    itemcount.innerText = listcountItem.length;
    if (listcountItem.length === 0) {
        filderDiv.style.display = "none";
    } else {
        filderDiv.style.display = "flex";
    }
}
// save the added input to ajax and send it to controller
function savetodo(todo, cat) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var ajxRst = $.ajax({
        type: "POST",
        async: "false",
        url: "/Taskadded",
        data: {
            taskname: todo,
            taskcategory: cat,
            taskstatus: 0,
        },
        success: function (response) {
            getTodolist();
            result = response.id;
        },
    });
    return result;
}
//delete a todo from the list if it's completed.
function deletetodo(todo) {
    const id = todo.children[1].childNodes[1].value;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "delete",
        url: "/deleteTask/" + id,
        data: { id: id },
        success: function (response) {
            getTodolist();
        },
    });
}

function updatecheck(todo, checkedT) {
    const id = todo.children[1].childNodes[1].value;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "post",
        url: "/updatecheck/" + id,
        data: { id: id, status: checkedT },
        success: function (response) {
            console.log(response.msg);
        },
    });
}

function deletecompleted(checkT) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "post",
        url: "/deleteAll",
        data: { status: checkT },
        success: function (response) {
            getTodolist();
        },
    });
}

function updatetodo(inputValue, id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "post",
        url: "/updatedtodo",
        data: { id: id, name: inputValue },
        success: function (response) {
            console.log(response);
        },
    });
}
