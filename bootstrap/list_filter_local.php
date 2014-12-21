<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Twitter Bootstrap 3 Linked List Groups</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
        margin: 20px;
    }
</style>

<script>
    $(document).ready(function(){
        get_json();

        $(".list-group").on('click','.list-group-item', function(){
            console.log("test");
            $(this).toggleClass("active");
        });

        $('.filterinput').keyup(function() {
            var a = $(this).val().toLowerCase();
            if (a.length > 2) {
                // this finds all links in the list that contain the input,
                // and hide the ones not containing the input while showing the ones that do
                $(".list-group-item").each(function(){
                    if($(this).text().toLowerCase().indexOf(a) > -1){
                        $(this).slideDown();
                    }else{
                        $(this).slideUp();
                    }
                });
            }else{
                $(".list-group-item").slideDown();
            }
        })
    });

    function get_json(){
        var url="../scripts/get_json.php";
        $.getJSON( url, function( data ) {
            $('#list').empty();             
            for(var i = 0;i<data.length;i++){
                var pid=data[i].pid;
                var fname=data[i].fname;
                var lname=data[i].lname;
                var info = '<a href="#" class="list-group-item" data-pid="' + pid + '">' +pid;
                info += '<h4 class="list-group-item-heading">';
                info += lname + ", " + fname + "</h4>";
                info += '<p class="list-group-item-text">'+pid+'</p>'
                info += '</a>';
                $('#list').append(info);
            }
        });
    }
</script>

</head>
<body>
<div class="bs-example">
    <input type="text" class="filterinput">
    <div class="list-group" id="list">
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">What is HTML?</h4>
            <p class="list-group-item-text">HTML stands for HyperText Markup Language. HTML is the main markup language for describing the structure of Web pages.</p>
        </a>
        <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">What is Twitter Bootstrap?</h4>
            <p class="list-group-item-text">Twitter Bootstrap is a powerful front-end framework for faster and easier web development. It is a collection of HTML and CSS based design template.</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">What is CSS?</h4>
            <p class="list-group-item-text">CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc.</p>
        </a>
    </div>
</div>
</body>
</html>       
