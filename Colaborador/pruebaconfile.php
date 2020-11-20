<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Custom File-Input</title>
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <!-- at the end of the `head` -->


<!-- at the end of the `body` -->
<script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js"></script>
  </head>
  <style >
  .upload {
  display: none;
}
.uploader {
  border: 1px solid #ccc;
  width: 300px;
  position: relative;
  height: 30px;
  display: flex;
}
.uploader .input-value{
  width: 250px;
  padding: 5px;
  overflow: hidden;
  text-overflow: ellipsis;
  line-height: 25px;
  font-family: sans-serif;
  font-size: 16px;
}
.uploader label {
  cursor: pointer;
  margin: 0;
  width: 30px;
  height: 30px;
  position: absolute;
  right: 0;
  background: #c3e3fc url('https://www.interactius.com/wp-content/uploads/2017/09/folder.png') no-repeat center;
}</style>
  <body>
    <div class="container">
     <div class="input__row uploader">
  <div id="inputval" class="input-value"></div>
  <label for="file_1"></label>
  <input id="file_1" class="custom-file-upload upload" type="file">
</div>
    </div>
  </body>
  <script>
  $('#file_1').on('change',function(){
   $('#inputval').text( $(this).val());
 });
  </script>
</html>