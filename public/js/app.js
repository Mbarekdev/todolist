var task = document.getElementById("addTask");
var url = $("#formTodos").attr("action");

task.addEventListener("keydown", addtasklist);

function addtasklist(e) {
    if (e.code === "Enter") {
        var namel = $("input[name='namel']").val();
        //alert(namel);
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
