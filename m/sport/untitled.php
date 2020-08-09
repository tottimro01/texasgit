<html>
    <head>
        <script language="javascript">
            function show (text){
            document.getElementById("text").innerHTML = text;
            }
        </script>
    </head>
    <body>
        <input type="text" name="textbox" id="textbox" value="Insert Name"/>
        <input type="button" name="button" value="OK" onclick="show(document.getElementById('textbox').value)"/>
        <div id="text"></div>
    </body>
</html>