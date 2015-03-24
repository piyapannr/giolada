<?php
//########### Configuration ##############
$ThumbSquareSize      = 200;            //Thumbnail will be 200x200
$BigImageMaxSize      = 1000;           //Image Maximum height or width
$ThumbPrefix          = "thumbs/thumb_";       //Normal thumb Prefix
$FullPrefix           = "full/";
$DestinationDirectory = '../uploads/';     //Upload Directory ends with / (slash)
$Quality              = 90;
$image_upload_success[2] = null;
$counter              = 0;
//#########################################
//ini_set('memory_limit', '-1'); // maximum memory!

foreach ($_FILES as $file) {
    
    // some information about image we need later.
    $ImageName = $file['name'];
    $ImageSize = $file['size'];
    $TempSrc   = $file['tmp_name'];
    $ImageType = $file['type'];
    
    if (is_array($ImageName)) {
        $c = count($ImageName);        
        for ($i = 0; $i < $c; $i++, $counter++) {
            $processImage = true;
            
            if (!isset($ImageName[$i]) || !is_uploaded_file($TempSrc[$i])) {
                $update_status .= '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>, may be file too big!</div>';
            } else { 
                //Validate file + create image from uploaded file.
                switch (strtolower($ImageType[$i])) {
                    case 'image/png':
                        $CreatedImage = imagecreatefrompng($TempSrc[$i]);
                        break;

                    case 'image/gif':
                        $CreatedImage = imagecreatefromgif($TempSrc[$i]);
                        break;

                    case 'image/jpeg':
                    case 'image/pjpeg':
                        $CreatedImage = imagecreatefromjpeg($TempSrc[$i]);
                        break;

                    default:
                        $processImage = false;
                         //image format is not supported!
                }
                
                //get Image Size
                list($CurWidth, $CurHeight) = getimagesize($TempSrc[$i]);
                
                //Get file extension from Image name, this will be re-added after random name
                $ImageExt = substr($ImageName[$i], strrpos($ImageName[$i], '.'));
                $ImageExt = str_replace('.', '', $ImageExt);
                
                //Construct a new image name (with random number added) for our new image.
                $NewImageName = getNewname() . '.' . $ImageExt;
                $image_upload_success[$counter] = $NewImageName;
                
                //Set the Destination Image path with Random Name
                $thumb_DestRandImageName = $DestinationDirectory . $ThumbPrefix . $NewImageName;
                 //Thumb name
                $DestRandImageName = $DestinationDirectory . $FullPrefix . $NewImageName;
                 //Name for Big Image
                
                //Resize image to our Specified Size by calling resizeImage function.
                if ($processImage && resizeImage($CurWidth, $CurHeight, $BigImageMaxSize, $DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
                    
                    //Create a square Thumbnail right after, this time we are using cropImage() function
                    
                    if (!cropImage($CurWidth, $CurHeight, $ThumbSquareSize, $thumb_DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
                        echo 'Error Creating thumbnail';
                    }
                    
                    
                    /*
                    At this point we have succesfully resized and created thumbnail image
                    We can render image to user's browser or store information in the database
                    For demo, we are going to output results on browser.
                    */
                    
                    //Get New Image Size
                    list($ResizedWidth, $ResizedHeight) = getimagesize($DestRandImageName);
                    
                    
                    //echo '<img class="img img-responsive thumbnail" src="uploads/' . $ThumbPrefix . $NewImageName . '" alt="Thumbnail" width="20%">';
                    //echo '<img class="img img-responsive thumbnail" src="uploads/' . $FullPrefix  . $NewImageName . '" alt="Resized Image" width="40%">';
                    /*
                    // Insert info into database table!
                    mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
                    VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
                    */
                } else {
                    $update_status .= '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>! Please check if file is supported</div>';
                     //output error
                    
                }
            }
        }
    }
}

function getNewname() {
    return (substr(microtime(), 11) . '_' . substr(microtime(), 2, 8) . Hash::getRandomNumber(8));
}

// This function will proportionally resize image
function resizeImage($CurWidth, $CurHeight, $MaxSize, $DestFolder, $SrcImage, $Quality, $ImageType) {
    
    //Check Image size is not 0
    if ($CurWidth <= 0 || $CurHeight <= 0) {
        return false;
    }
    
    //Construct a proportional size of new image
    $ImageScale = min($MaxSize / $CurWidth, $MaxSize / $CurHeight);
    $NewWidth = ceil($ImageScale * $CurWidth);
    $NewHeight = ceil($ImageScale * $CurHeight);
    
    if ($CurWidth < $NewWidth || $CurHeight < $NewHeight) {
        $NewWidth = $CurWidth;
        $NewHeight = $CurHeight;
    }
    $NewCanves = imagecreatetruecolor($NewWidth, $NewHeight);
    
    // Resize Image
    if (imagecopyresampled($NewCanves, $SrcImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight)) {
        switch (strtolower($ImageType)) {
            case 'image/png':
                imagepng($NewCanves, $DestFolder);
                break;

            case 'image/gif':
                imagegif($NewCanves, $DestFolder);
                break;

            case 'image/jpeg':
            case 'image/pjpeg':
                imagejpeg($NewCanves, $DestFolder, $Quality);
                break;

            default:
                return false;
        }
        if (is_resource($NewCanves)) {
            imagedestroy($NewCanves);
        }
        return true;
    }
}

//This function corps image to create exact square images, no matter what its original size!
function cropImage($CurWidth, $CurHeight, $iSize, $DestFolder, $SrcImage, $Quality, $ImageType) {
    
    //Check Image size is not 0
    if ($CurWidth <= 0 || $CurHeight <= 0) {
        return false;
    }
    
    //abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
    //http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
    if ($CurWidth > $CurHeight) {
        $y_offset = 0;
        $x_offset = ($CurWidth - $CurHeight) / 2;
        $square_size = $CurWidth - ($x_offset * 2);
    } else {
        $x_offset = 0;
        $y_offset = ($CurHeight - $CurWidth) / 2;
        $square_size = $CurHeight - ($y_offset * 2);
    }
    
    $NewCanves = imagecreatetruecolor($iSize, $iSize);
    if (imagecopyresampled($NewCanves, $SrcImage, 0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)) {
        switch (strtolower($ImageType)) {
            case 'image/png':
                imagepng($NewCanves, $DestFolder);
                break;

            case 'image/gif':
                imagegif($NewCanves, $DestFolder);
                break;

            case 'image/jpeg':
            case 'image/pjpeg':
                imagejpeg($NewCanves, $DestFolder, $Quality);
                break;

            default:
                return false;
        }
        if (is_resource($NewCanves)) {
            imagedestroy($NewCanves);
        }
        return true;
    }
}

/*
$newName = time();
$target_dir = "uploads/";
$target_file = $target_dir . $newName. '_' . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$redirect = "product.php";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1048576) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
        echo "You will be redirect in  5 seconds.";
        header("Refresh: 3; URL=$redirect"); 
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/
?>