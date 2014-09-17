 <style type=text/css>
      .CodeMirror {
        float: left;
        width: 50%;
        border: 1px solid black;
      }
      iframe {
        width: 49%;
        float: left;
        height: 300px;
        border: 1px solid black;
        border-left: 0px;
      }
    </style>
 <div id="tabs">
<ul>

    <li><a href="#tabs-html">Html tester</a></li>

    <li><a href="#tabs-php">PHP tester</a></li>
    <li><a href="#tabs-ee">EE tag tester</a></li>

    

</ul>
 <div id="tabs-html">
<textarea id="html_code" name="html_code">
<!doctype html>
<html>
  <head>
    <meta charset=utf-8>
    <title>HTML5 canvas demo</title>
    <style>p {font-family: monospace;}</style>
  </head>
  <body>
    <p>Canvas pane goes here:</p>
    <canvas id=pane width=300 height=200></canvas>
    <script>
      var canvas = document.getElementById('pane');
      var context = canvas.getContext('2d');

      context.fillStyle = 'rgb(250,0,0)';
      context.fillRect(10, 10, 55, 50);

      context.fillStyle = 'rgba(0, 0, 250, 0.5)';
      context.fillRect(30, 30, 55, 50);
    </script>
  </body>
</html></textarea>    
 <iframe id=html_preview></iframe>
 
</div>    

<div id="tabs-php">
<textarea id="php_code" name="php_code">
</textarea>    
<iframe id=php_preview></iframe>
 
</div>    

<div id="tabs-ee">
<textarea id="ee_code" name="ee_code">
</textarea>    
<iframe id=ee_preview></iframe>
 
</div>    
 
</div>    
