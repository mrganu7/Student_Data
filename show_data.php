<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

 <link rel="stylesheet" href="links/bootstrap.min.css">

</head>
<body class="bg-info">
    <table id="main" class="table border-1 border-dark">
        <tr>
            <td id="header">
                <h2 class="text-center">PHP with Ajax</h2>
            </td>

        </tr>
        <tr>
            <td id="table_load">
                <div class="text-center"><input type="button" id="load" class="btn btn-primary btn-lg" value="load" ></div>
            </td>
        </tr>
        <tr>
            <td id="table_data" class="table-bordered">
               
            </td>
        </tr>
    </table>
    <script src="links/jquery.js"></script>
   

    <script type="text/javascript">
        $(document).ready(function(){
            $("#load").on("click", function(e){
                $.ajax({
                    url: "ajax_data.php",
                    type :"POST",
                    success : function(data){
                        $("#table_data").html(data);
                    }
                });
            });
        });
        
    </script>
     <script src="links/bootstrap.min.js"></script>
</body>
</html>