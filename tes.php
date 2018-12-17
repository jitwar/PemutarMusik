<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="file" id="input"/>
		<audio id="sound" controls></audio>
</body>
</html>
<script type="text/javascript">
	input.onchange = function(e){
  var sound = document.getElementById('sound');
  sound.src = URL.createObjectURL(this.files[0]);
  // not really needed in this exact case, but since it is really important in other cases,
  // don't forget to revoke the blobURI when you don't need it
  var bantu = sound.src;
  document.write(bantu);

  var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "test"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  var sql = "INSERT INTO lagujudul (judul) VALUES (bantu)";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
  });
});

  sound.onend = function(e) {
    URL.revokeObjectURL(this.src);
  }
 
}
</script>
