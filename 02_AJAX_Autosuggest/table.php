<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax example </title>
    <link rel="stylesheet" href="tablestyle.css">
</head>
<body>
    <div class="container">
        <h2>AJAX MULTIPLICATION TABLE</h2>

        <input type="number" name="num" id="num" placeholder="Enter Number"> 
        <button type="submit" onclick="table()">Generate Table</button>

        <div id="result"></div>
    </div>
    <script>
        function table(){
            
            let xhr= new XMLHttpRequest();

            let num = document.getElementById("num").value;

            xhr.open("GET","tablephp.php?num="+encodeURIComponent(num),true);

            xhr.onreadystatechange = function(){

                if(xhr.readyState == 4 && xhr.status == 200){
                    document.getElementById("result").innerHTML=xhr.responseText;
                }
            }
            xhr.send();
        }

    </script>

</body>
</html>



