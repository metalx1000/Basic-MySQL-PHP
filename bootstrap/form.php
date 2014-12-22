<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Twitter Bootstrap</title>
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
    function generateKey() {
        var length = 8,
            charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }

    function getUrlParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) 
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) 
            {
                return sParameterName[1];
            }
        }
    }   

    function get_json(pid){
        var url="../scripts/get_json.php?pid=" + pid;
        $.getJSON( url, function( data ) {
        var pid=data[i].pid;
                var fname=data[i].fname;
                var lname=data[i].lname;
        });
    }

    $(document).ready(function(){
        if(getUrlParameter('pid')){
            $("#pid").val(getUrlParameter('pid'));
        }else{
            $("#pid").val(generateKey());
        }


        $("#submit").click(function(event){
            event.preventDefault();
            $("#alert").slideDown( "slow" ).delay( 3000 ).slideUp("slow");
            $.get( "../scripts/update.php", $( "#form1" ).serialize() );
        });

        $("#alert").click(function(){
            $(this).slideUp("slow");
        });
        
    });
</script>

</head>
<body>
<div class="bs-example">
    <div class="form-group">
        <a href="form.php" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-edit">
            </span> New Entry
        </a>
    </div>
    <form class="form-inline" role="form" id="form1">
        <div class="form-group">
            <input type="hidden" id="pid" name="pid" >
            <label class="sr-only" for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
        </div>
        <div class="form-group">
            <label class="sr-only" for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="dob">DOB:</label>
            <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
        </div>
        <br><br>
        <div class="form-group">
            <label class="sr-only" for="phone">Last Name</label>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number">
        </div>

        <button class="btn btn-primary" id="submit">Submit</button>
    </form>
    <br>
    <div class="alert alert-info" id="alert" style="display: none">
        <a href="#" >×</a>
        <strong>Note:</strong> The inline form layout is rendered as default vertical form layout if the viewport width is less than 768px. Open the output in a new window and resize the screen to see how it works.
    </div>
</div>
</body>
</html>    
