<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello world</h1>
     <form method="get" id="myform">
        <select name="demo" id="" class="SelectValue" >
            <option value="1">1</option>
            <option value="1">2</option>
            <option value="1">3</option>
            <option value="1">4</option>
        </select>
    </form>    
    <div id="getVal"></div>
    <p>click me</p>


       <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous">
              
        </script>

    <script>
       $(document).ready(function(){
            $('p').bind('click',{msg:'i m clicked'},dataHandler);
       });

       function dataHandler(e){
            alert(e.data.msg)
       }

    </script>

   
</body>
</html>