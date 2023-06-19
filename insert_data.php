<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="links/bootstrap.min.css">
</head>

<body class="bg-info">
    <div class="container mt-5">
        <h1 class="text-center">PHP CURD Operation With Using Ajax</h1>
        <!-- Form -->
        <form id="addForm">
            <div class="mt-5">
                <div>
                    <label for="fname" class="fs-5">First Name</label>
                </div>
                <div class="mt-3">
                    <input type="text" id="fname" class="form-control border-primary border-3">
                </div>

                <div class="mt-3">
                    <label for="lname" class="fs-5">Last Name</label>
                </div>
                <div class="mt-3">
                    <input type="text" id="lname" class="form-control border-primary border-3">
                </div>

                <!-- button -->
                <div class="text-center mt-5">
                    <input type="submit" id="btn" value=" Save " class="btn btn-primary btn-lg border-dark border-3">
                </div>
            </div>
        </form>

        <!-- Table -->
        <table id="main" class="table border-1 border-dark mt-5">
            <tr>
                <td id="table_form">
                </td>
            </tr>

            <td id="table-data" class="table">
                <table class="table">

                </table>
            </td>
        </table>
    </div>




    <script src="links/jquery.js"></script>
    <script>
        $(document).ready(function () {

            // load Table Record
            function loadtable() {
                $.ajax({
                    url: "ajax_data.php",
                    type: "POST",
                    success: function (data) {
                        $("#table-data").html(data);
                    }
                });
            }
            loadtable(); // load table record on page load

            // Insert New Record
            $("#btn").on("click", function (e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();

                $.ajax({
                    url: "ajax_insert.php",
                    type: "POST",
                    data: { first_name: fname, last_name: lname },
                    success: function (data) {
                        if (data == 1) {
                            loadtable();
                            $("#addForm").trigger("reset");
                        }
                        else {
                            alert("can't save record");
                        }

                    }
                })
            })

            //Delete Record 
            $(document).on("click", ".Delete-btn", function () {

                if (confirm("Do you really want to delete this record ?")) {

                    var studentId = $(this).data("id");
                    var element = this;

                    $.ajax({
                        url: "ajax_delete.php",
                        type: "POST",
                        data: { id: studentId },
                        success: function (data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut();
                            } else {
                                alert("can't Delete Record").slideDown();
                            }
                        }
                    });
                }
            });

            // $(document).on("click",".edit-btn", function(){
            //     $(#exampleModal).show();

            // });
        });
    </script>
    <script src="links/bootstrap.min.js"></script>
</body>

</html>