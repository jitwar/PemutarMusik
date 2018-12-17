<?php
  session_start();
  if (empty($_SESSION['username'])) {
    # code...
    $message = "Login Dahulu Yaa :)";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>location='../login/login.php';</script>";
  }
  
?>
<html>
<head>
  <title>PHP Filesystem with Ajax JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../Boost/css/bootstrap.min.css">
  <script src="../Boost/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Boost/js/bootstrap.min.js"></script>
  <!-- <script src="script.js"></script> -->
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <br /><br />
  <div class="container">
   <h2 align="center">Admin</a></h2>
   <br />
<a href="logout.php">keluar</a>
   <div align="right">
    <button type="button" name="create_folder" id="create_folder" class="btn btn-success">Create</button>
  </div>

  <br />
  <div class="table-responsive" id="folder_table">

  </div>
</div>
</body>
</html>

<div id="folderModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">

   <div class="modal-header">
    <h4 class="modal-title"><span id="change_title">Buat Folder</span></h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>

  <div class="modal-body">
    <p>Masukkan Nama Folder
      <input type="text" name="folder_name" id="folder_name" class="form-control" /></p>
      <br />
      <input type="hidden" name="action" id="action" />
      <input type="hidden" name="old_name" id="old_name" />
      <input type="button" name="folder_button" id="folder_button" class="btn btn-info" value="Create"/>
    </div>

  </div>
</div>
</div>

<!-- upload lagu -->
<div id="uploadModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">

   <div class="modal-header">
    <h4 class="modal-title">Upload File</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>

  <div class="modal-body">
    <form method="post" id="upload_form" enctype='multipart/form-data' action="upload.php">
      <!-- <h5>Cover Lagu</h5>
      <div class="filediv">
          <p>Pilih Gambar
            <input type="file" name="file[]" id="file" />
          </p>
      </div> -->
      <h5>Lagu</h5>
      <div class="filediv">
          <p>Pilih Lagu
            <input type="file" name="file" id="file" style="margin-left: 20px" />
          </p>
      </div>
       <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />

       <h6>Album</h6>
       <input type="text" name="album" style="width: 100%"><br>
       <h6>Artis</h6>
       <input type="text" name="artis" style="width: 100%"><br><br>
       <!-- <input type="button" id="add_more" class="btn btn-info" value="Add More Files"/> -->
       <input type="submit" name="submit" class="btn btn-success" value="Upload File" id="upload" />
     </form>
     <!-- <?php //include 'kirim.php';?> -->
   </div>

 </div>
</div>
</div>

<div id="filelistModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">

   <div class="modal-header">
    <h4 class="modal-title">Daftar File</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
  </div>

  <div class="modal-body" id="file_list">
  </div>

</div>
</div>
</div>

<script>
  $(document).ready(function(){

   load_folder_list();

   function load_folder_list()
   {
    var action = "fetch";
    $.ajax({
     url:"action.php",
     method:"POST",
     data:{action:action},
     success:function(data)
     {
      $('#folder_table').html(data);
    }
  });
  }

  $(document).on('click', '#create_folder', function(){
    $('#action').val("create");
    $('#folder_name').val('');
    $('#folder_button').val('Buat');
    $('#folderModal').modal('show');
    $('#old_name').val('');
    $('#change_title').text("Nama Folder");
  });

  $(document).on('click', '#folder_button', function(){
    var folder_name = $('#folder_name').val();
    var old_name = $('#old_name').val();
    var action = $('#action').val();
    if(folder_name != '')
    {
     $.ajax({
      url:"action.php",
      method:"POST",
      data:{folder_name:folder_name, old_name:old_name, action:action},
      success:function(data)
      {
       $('#folderModal').modal('hide');
       load_folder_list();
       alert(data);
     }
   });
   }
   else
   {
     alert("Enter Folder Name");
   }
 });

  $(document).on("click", ".update", function(){
    var folder_name = $(this).data("name");
    $('#old_name').val(folder_name);
    $('#folder_name').val(folder_name);
    $('#action').val("change");
    $('#folderModal').modal("show");
    $('#folder_button').val('Update');
    $('#change_title').text("Nama Folder");
  });

  $(document).on("click", ".delete", function(){
    var folder_name = $(this).data("name");
    var action = "delete";
    if(confirm("Setuju untuk dihapus?"))
    {
     $.ajax({
      url:"action.php",
      method:"POST",
      data:{folder_name:folder_name, action:action},
      success:function(data)
      {
       load_folder_list();
       alert(data);
     }
   });
   }
 });

  $(document).on('click', '.upload', function(){
    var folder_name = $(this).data("name");
    $('#hidden_folder_name').val(folder_name);
    $('#uploadModal').modal('show');
  });

  // $('#upload_form').on('submit', function(){
  //   $.ajax({
  //    url:"upload.php",
  //    method:"POST",
  //    data: new FormData(this),
  //    contentType: false,
  //    cache: false,
  //    processData:false,
  //    success: function(data)
  //    { 
  //     load_folder_list();
  //     alert(data);
  //   }
  // });
  // });

  $(document).on('click', '.view_files', function(){
    var folder_name = $(this).data("name");
    var action = "fetch_files";
    $.ajax({
     url:"action.php",
     method:"POST",
     data:{action:action, folder_name:folder_name},
     success:function(data)
     {
      $('#file_list').html(data);
      $('#filelistModal').modal('show');
    }
  });
  });

  $(document).on('click', '.remove_file', function(){
    var path = $(this).attr("id");
    var action = "remove_file";
    if(confirm("Setuju untuk dihapus?"))
    {
     $.ajax({
      url:"action.php",
      method:"POST",
      data:{path:path, action:action},
      success:function(data)
      {
       alert(data);
       $('#filelistModal').modal('hide');
       load_folder_list();
     }
   });
   }
 });

  $(document).on('blur', '.change_file_name', function(){
    var folder_name = $(this).data("folder_name");
    var old_file_name = $(this).data("file_name");
    var new_file_name = $(this).text();
    var action = "change_file_name";
    $.ajax({
     url:"action.php",
     method:"POST",
     data:{folder_name:folder_name, old_file_name:old_file_name, new_file_name:new_file_name, action:action},
     success:function(data)
     {
      alert(data);
    }
  });
  });

});

</script>