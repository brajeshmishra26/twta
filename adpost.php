<html>
    <head>
        <style>
           #myDIV{
               
  position: -webkit-sticky;
  position: sticky;
  top: 190px;
  left: 70%;
  /*padding: 5px;*/
  background-color: #0066cc;
  /*border: 2px solid #0066cc;*/
  /*color: #ffffff;*/
  z-index: 1;
  
}

#myDIV {
  width: 25%;
  text-align: right;
  }
</style>

    </head>
    <body>
        



<div id="myDIV" class="sticky">
    <button onclick="myFunction()" title="Close Ad" >X</button>
    <img src="CMS/Images/ad/vidya.jpeg" width="100%" >

</div>



<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>


    </body>
</html>