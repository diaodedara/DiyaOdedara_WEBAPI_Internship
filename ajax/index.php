<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <h1>Internship Search</h1>
        <div class="mode">
            <!-- <label for="mode">Mode:</label> -->
            <select id="mode" name="mode" onchange="searchStudent(this.value)">
                <option value="Online">Online</option>
                <option value="Onsite">Onsite</option>
                <option value="Hybrid">Hybrid</option>
            </select>
    </div>
        


        <!-- <div class="mode">

            <label>
                <input type="radio" name="mode" value="Online" onclick="searchStudent(this.value)">
                Online
            </label>

            <label>
                <input type="radio" name="mode" value="Onsite" onclick="searchStudent(this.value)">
                Onsite
            </label>

            <label>
                <input type="radio" name="mode" value="Hybrid" onclick="searchStudent(this.value)">
                Hybrid
            </label>
        </div> -->

        <!-- <button onclick="searchStudent(mode)">Search</button> -->
        <table  border="1" width="100%" style="margin-top:20px;">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Mode</th>
                </tr>
            </thead>

            <tbody class="tbody"></tbody>

        </table>
    </div>



    
    <script>
        function searchStudent(mode){

            let xhr = new XMLHttpRequest();

            xhr.open("GET","search.php?mode="+encodeURIComponent(mode),true);

            xhr.onreadystatechange = function(){

                if(xhr.readyState == 4 && xhr.status == 200){
                    document.querySelector(".tbody").innerHTML = xhr.responseText;
                }
            }

            xhr.send();
        }


    </script>

</body>
</html>
