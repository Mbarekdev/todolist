/**
 * Create functions Add, edit, delete,sort
 * tasks that have been given by the  user on input todos.
 */

var task = document.getElementById("addTask"); // get the input field by it's id
var url = $("#formTodos").attr("action"); // get the rout send a request on ajax

task.addEventListener("keydown", addtasklist); // function add task on to do list

// function on press key Enter the data will be sent to contorller that will make the request create on database.
function addtasklist(e) {
    if (e.code === "Enter") {
        var namel = $("input[name='namel']").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            url: url,
            data: { name: namel, category: 1, status: 0 },
            success: function (data) {
                alert(data.msg);
            },
        });
    }
}
