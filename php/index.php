<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/styles.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
<body>
<?php
include "config.php";
include_once "common.php";
$common = new Common();
$allCountries = $common->getCountries($connection);
?>
<div class="container">
    <form action="signup.php" method="post" enctype="multipart/form-data">
<input type="text" name="user_name" placeholder="User Name" required>
            <input type="text" name="mobile" placeholder="Mobile" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="aadhr_numer" placeholder="Aadhaar Number" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="address" placeholder="Address" required>
        <!--<label>Country <span style="color:red">*</span></label>-->
        <select name="country" id="countryId" class="form-control" onchange="getStatesByCountry();" required >
            <option value="">Country</option>
            <?php
            if ($allCountries->num_rows > 0 ){
                while ($country = $allCountries->fetch_object() ) {
                    $countryId = $country->id;
                    $countryName = $country->name;?>
                    <option value="<?php echo $countryId;?>"><?php echo $countryName;?></option>
                <?php }
            }
            ?>

        </select>

        <!--<label>State <span style="color:red">*</span></label>-->
        <select class="form-control" name="state" id="stateId" onchange="getCityByState();" required >
            <option value="">State</option>
        </select>

        <!--<label>City <span style="color:red">*</span></label>-->
        <select class="form-control" name="city" id="cityDiv">
            <option value="">City</option>
        </select>
           <input type="text" name="desig" placeholder="Designation" required> 
           <input type="text" name="uniquecode" placeholder="Unique Code" required>
           <input type="text" name="appointplace" placeholder="Appoint Place" required>
           <input type="text" name="disecode" placeholder="Dise Code" required>
           <input type="text" name="vikaskhand" placeholder="Vikaskhande" required>
<label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" onchange="previewPhoto()" required>
            <img id="photo-preview" style="display:none; width:170px; height:170px;">
            <canvas id="photo-canvas" style="display:none;"></canvas>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<script>
    function getStatesByCountry() {
        var countryId = $("#countryId").val();
        $.post("ajax.php",{getStatesByCountry:'getStatesByCountry',countryId:countryId},function (response) {
           // alert(response);
            var data = response.split('^');
            var stateData = data[1];
            $("#stateId").html(stateData);
        });
    }

    function getCityByState() {
        var stateId = $("#stateId").val();
        $.post("ajax.php",{getCityByState:'getCityByState',stateId:stateId},function (response) {
            // alert(response);
            var data = response.split('^');
            var cityData = data[1];
            $("#cityDiv").html(cityData);
        });
    }
function previewPhoto() {
    const photoInput = document.getElementById('photo');
    const photoPreview = document.getElementById('photo-preview');
    const photoCanvas = document.getElementById('photo-canvas');
    const file = photoInput.files[0];

    if (file) {
        const validExtensions = ['image/jpeg', 'image/png'];

        if (!validExtensions.includes(file.type)) {
            alert('Please upload a .jpg or .png file.');
            photoInput.value = '';
            photoPreview.style.display = 'none';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
                const canvas = photoCanvas;
                const ctx = canvas.getContext('2d');
                const maxWidth = 170;
                const maxHeight = 170;

                // Set canvas dimensions to 170x170
                canvas.width = maxWidth;
                canvas.height = maxHeight;

                // Calculate cropping area
                const cropSize = Math.min(img.width, img.height);
                const cropX = (img.width - cropSize) / 2;
                const cropY = (img.height - cropSize) / 2;

                // Draw cropped and resized image to canvas
                ctx.drawImage(img, cropX, cropY, cropSize, cropSize, 0, 0, maxWidth, maxHeight);

                // Update the photo preview
                photoPreview.src = canvas.toDataURL(file.type);
                photoPreview.style.display = 'block';
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        photoPreview.style.display = 'none';
    }
}


</script>

</body>
</html>