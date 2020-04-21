<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html> 
<html>  
<head>    
        <title>U-CINEMA</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script type="text/javascript">
            function validasi() {
                var title = document.getElementById("title").value;
                var duration = document.getElementById("duration").value;
                var synopsis = document.getElementById("synopsis").value;
                var date = document.getElementById("datepicker").value;
                var poster = document.getElementById("poster").value;
                var extension = $('#poster').val().split('.').pop().toLowerCase();  
                var fields = $("input[name='genre[]']").serializeArray();
                if (title != "" && duration !="" && synopsis !="" && date !="" && poster != "") {
                    
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                    {  
                        alert('Invalid Image File');  
                        $('#image').val('');  
                        return false;  
                    } 
                    else if (fields.length === 0) 
                    { 
                        alert('Select at least 1 genre!'); 
                        // cancel submit
                        return false;
                    } 
                    else 
                    { 
                        return true;
                    }
                    // event.preventDefault();
                    
                }else{
                    alert('All field must be not be empty!');
                    return false;
                }
            }
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
        </script>
        <style>
            #logout{
                transition-duration: 1s;
            }
            #logout:hover{
                background-color: orange;
                color: white;
            }
            .navbar .glyphicon{
                font-size : 2em;
            }
            table .glyphicon{
                font-size: 1.5em;
            }
        </style>
</head>  
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h4 style="color:grey"> 
                        <?php 
                            echo "Hello, " . $_SESSION['name']; 
                        ?>
                    </h4>
                </div>
                <div class="navbar-nav nav navbar-right">
                    <li class="navbar-right" style="color:black;display:flex; justify-content:space-between; margin-left:35em;">
                        <a href="home.php"><span class="glyphicon glyphicon-home"></span></a>
                        <a href="home.php"><span class="glyphicon glyphicon-user" style="margin-left:1em;"></span></a>
                        <a href="../controller/logout.php" style="margin-left:1em;" id="logout"><span class="glyphicon glyphicon-log-out"></span></a>
                    </li>
                </div>
            </div>
        </nav>
    </header>
    <h1 style="text-align:center;">Add Movie</h1>
    <div class="container" style="width:25%; margin-top:2em;">
        <form action="../controller/insert_movie.php" method="post" id="myform" onSubmit="return validasi()" enctype="multipart/form-data">
            <label>Movie Title</label>
            <input type="text" class="form-control" name="title" id="title"><br>
            <label>Movie Poster</label>
            <input type="file" name="file" id="poster" accept="image/jpeg, image/jpg, image/png"><br>
            <label>Genre</label><br>
            <div style="display:grid; justify-content:space-between;grid-template-columns: auto auto auto; margin-bottom:1em;">
                <div>
                    <input type="checkbox" id="action" name="genre[]" value="action">
                    <label>Action</label>
                </div>
                <div>
                    <input type="checkbox" id="thriller" name="genre[]" value="thriller">
                    <label>Thriller</label>
                </div>
                <div>
                    <input type="checkbox" id="drama" name="genre[]" value="drama">
                    <label>Drama</label>
                </div>
                <div>
                    <input type="checkbox" id="sci-fi" name="genre[]" value="sci-fi">
                    <label>Sci-fi</label>
                </div>
                <div>
                    <input type="checkbox" id="fantasy" name="genre[]" value="fantasy">
                    <label>Fantasy</label>
                </div>
                <div>
                    <input type="checkbox" id="comedy" name="genre[]" value="comedy">
                    <label>Comedy</label>
                </div>
            </div>
            <label>Duration</label>
            <input type="text" class="form-control" name="duration" id="duration">
            <label>Synopsis</label>
            <textarea class="form-control" name="synopsis" id="synopsis" style="resize:none;" rows="5"></textarea><br>
            <label>Release Date</label>
            <input type="text" id="datepicker" name="release_date"><br>
            <input type="submit" class="btn btn-primary" style="margin-top:2em;" value="Submit" name="submit">
            <a href="home.php"><input type="button" value="Cancel" class="btn btn-danger" style="margin-top:2em;"></button></a>
        </form>
    </div>
</body> 
</html>