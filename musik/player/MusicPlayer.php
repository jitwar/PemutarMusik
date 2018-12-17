
<html>
    <head>
        <link href="Main.css" rel="stylesheet"/>
        <script src="jquery-1.10.2.min.js"></script>
    </head>
    <body>
        <div id="bg">
            <div id="blackLayer"></div>
            <img src="Poster1.jpg"/>
        </div>
       
        <div id="main">
            <div id="image">
                <img src="Poster1.jpg"/>
            </div>
            <div id="player">
                <div id="songTitle">Demo</div>
                <div id="buttons">
                    <button id="pre" onclick="pre()"><img src="Pre.png" height="90%" width="90%"/></button>
                    <button id="play" onclick="playOrPauseSong()"><img src="Pause.png"/></button>
                    <button id="next" onclick="next()"><img src="Next.png" height="90%" width="90%"/></button>
                </div>
                
                <div id="seek-bar">
                    <div id="fill"></div>
                    <div id="handle"></div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        <?php
            $id=$_GET['id'];
            $koneksi = new mysqli('localhost','root','','projekpw');
            $sql = mysqli_query($koneksi, "select * from song where id='$id'") or die (mysqli_error());
            $query=mysqli_fetch_array($sql);
            
            // $jumlah=mysqli_fetch_rows($query1);
        ?>

        var songs = ["<?php echo $query['judul']; ?>","a"];
        var poster = ["Poster1.jpg","Poster2.jpg","Poster3.jpg"];
        
        var songTitle = document.getElementById("songTitle");
        var fillBar = document.getElementById("fill");
        
        var song = new Audio();
        var currentSong = 0;    // it point to the current song
        
        window.onload = playSong;   // it will call the function playSong when window is load
        
        var index=-1;
        function playNext() {
            index++;
            var music = listMusic[i];
            if (music) {
                playSound("'" + music + "'");
                setInterval('playNext', musicDuration[index] * 1000);
            }
        }

        function playSong(){
            
            song.src = songs[currentSong];  //set the source of 0th song 
            
            songTitle.textContent = songs[currentSong]; // set the title of song
            
            song.play();    // play the song
        }
        
        function playOrPauseSong(){
            
            
            if(song.paused){
                song.play();
                $("#play img").attr("src","Pause.png");
            }
            else{
                song.pause();
                $("#play img").attr("src","Play.png");
            }
        }
        
        song.addEventListener('timeupdate',function(){ 
            
            var position = song.currentTime / song.duration;
        
            fillBar.style.width = position * 100 +'%';
        });
        
    
        function next(){
            
            currentSong++;
            if(currentSong > 50){
                currentSong = 0;
            }
            playSong();
            $("#play img").attr("src","Pause.png");
            $("#image img").attr("src",poster[currentSong]);
            $("#bg img").attr("src",poster[currentSong]);
        }
    
        function pre(){
            
            currentSong--;
            if(currentSong < 0){
                currentSong = 2;
            }
            playSong();
            $("#play img").attr("src","Pause.png");
            $("#image img").attr("src",poster[currentSong]);
            $("#bg img").attr("src",poster[currentSong]);
        }    
    </script>    
</html>