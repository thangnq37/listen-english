<?php
	include('source/encoding.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="author" content="John Doe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title id="title-id">Test</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container p-3 my-3 bg-light text-primary">
    
		<div class="row">
			<div class="col-sm-12 form-group text-center">
        <div class="btn-group" role="group" aria-label="Basic example">
          <a class="btn btn-warning" href="/listen/">Listen English</a>
          <a class="btn btn-danger" href="/listen/page/bookworm.php">Bookworm</a>
        </div>
			</div>
			<div class="col-sm-12">
				<h4>Lession: <span id="name-song"></span></h4>
			</div>
			<div class="col-sm-4">
				<audio controls loop id="audio" autoplay>
				  	<source id="source-audio" src="" type="audio/mpeg">
				</audio>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="number-speed">Choose speed:</label>
          </div>
          <select class="custom-select" id="number-speed">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>
				
        <div>
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-tab-div-1" data-toggle="pill" href="#pills-tab-1" role="tab" aria-controls="pills-tab-1" aria-selected="true">LPTD 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-tab-div-2" data-toggle="pill" href="#pills-tab-2" role="tab" aria-controls="pills-tab-2" aria-selected="false">LPTD 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-tab-div-3" data-toggle="pill" href="#pills-tab-3" role="tab" aria-controls="pills-tab-3" aria-selected="false">LPTD 3</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-tab-div-4" data-toggle="pill" href="#pills-tab-4" role="tab" aria-controls="pills-tab-4" aria-selected="false">LPTD 4</a>
            </li>
          </ul>
        </div>
			</div>
			<div class="col-sm-8">
        <div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-tab-1" role="tabpanel" aria-labelledby="pills-tab-div-1">
              <div class="list-group">
                <?php 
                  $rootPath = ".\LPTD\LPTD 1";
                  $phpfiles = glob($rootPath . "\*.mp3");
                  natsort($phpfiles);
                  foreach ($phpfiles as $phpfile)
                  {
                    $linkSong = Encoding::toUTF8($phpfile);
                    ?>
                      <a href="<?=$linkSong?>" class="bg-info text-white list-group-item list-group-item-action click-mp3">
                        <?=str_replace($rootPath."\Unit ","",$linkSong)?>
                      </a>
                  <?php
                  }
                ?>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-tab-2" role="tabpanel" aria-labelledby="pills-tab-div-2">
              <div class="list-group">
                <?php 
                  $rootPath = ".\LPTD\LPTD 2";
                  $phpfiles = glob($rootPath . "\*.mp3");
                  natsort($phpfiles);
                  foreach ($phpfiles as $phpfile)
                  {
                    $linkSong = Encoding::toUTF8($phpfile);
                    ?>
                      <a href="<?=$linkSong?>" class="bg-success text-white list-group-item list-group-item-action click-mp3">
                        <?=str_replace($rootPath."\Unit ","",$linkSong)?>
                      </a>
                  <?php
                  }
                ?>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-tab-3" role="tabpanel" aria-labelledby="pills-tab-div-3">
              <div class="list-group">
                <?php 
                  $rootPath = ".\LPTD\LPTD 3";
                  $phpfiles = glob($rootPath . "\*.mp3");
                  natsort($phpfiles);
                  foreach ($phpfiles as $phpfile)
                  {
                    $linkSong = Encoding::toUTF8($phpfile);
                    ?>
                      <a href="<?=$linkSong?>" class="bg-warning text-white list-group-item list-group-item-action click-mp3">
                        <?=str_replace($rootPath."\Unit ","",$linkSong)?>
                      </a>
                  <?php
                  }
                ?>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-tab-4" role="tabpanel" aria-labelledby="pills-tab-div-4">
              <div class="list-group">
                <?php 
                  $rootPath = ".\LPTD\LPTD 4";
                  $phpfiles = glob($rootPath . "\*.mp3");
                  natsort($phpfiles);
                  foreach ($phpfiles as $phpfile)
                  {
                    $linkSong = Encoding::toUTF8($phpfile);
                    ?>
                      <a href="<?=$linkSong?>" class="bg-danger text-white list-group-item list-group-item-action click-mp3">
                        <?=str_replace($rootPath."\Unit ","",$linkSong)?>
                      </a>
                  <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
				<ul>
					
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var rootPath = '<?=$rootPath?>';
		function setCookie(cname, cvalue, exdays) {
		  	var d = new Date();
		  	d.setTime(d.getTime() + (exdays*24*60*60*1000));
		  	var expires = "expires="+ d.toUTCString();
		 	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}
		function getCookie(cname) {
		  	var name = cname + "=";
		  	var decodedCookie = decodeURIComponent(document.cookie);
		  	var ca = decodedCookie.split(';');
		  	for(var i = 0; i <ca.length; i++) {
		    	var c = ca[i];
		    	while (c.charAt(0) == ' ') {
		      		c = c.substring(1);
		    	}
		    	if (c.indexOf(name) == 0) {
		      		return c.substring(name.length, c.length);
		    	}
		  	}
		  	return "";
		}
		function setLinkPlay(href){
			var audio = $('#audio');
			$("#source-audio").attr("src", decodeURI(href));
		    // audio[0].pause();
		    audio[0].load();
		    var arSong = href.split("/");
		    $('#name-song').text(decodeURI(arSong[arSong.length - 1]));
        $('#title-id').text(decodeURI(arSong[arSong.length - 1]));
		    setCookie('linkSong', decodeURI(href), 200);
        chooseSongPlayingCurrent(decodeURI(href));
		}

		function setNumberSpeed(numberSpeed){
			var mySnd = document.getElementById("audio");
			if(parseInt(numberSpeed) > 0){
				mySnd.playbackRate=numberSpeed;
			}
			$('#number-speed').val(numberSpeed);
			setCookie('numberSpeed', numberSpeed, 200);
		}
		
    function chooseSongPlayingCurrent(linkSong){
      var tabsA = $('a');
      tabsA.removeClass('bg-light text-dark');
      for(var i = 0; i < tabsA.length; i++){
        var hrefChoosed = decodeURI(tabsA[i].href);
        if(hrefChoosed === linkSong){
          $(tabsA[i]).addClass('bg-light text-dark');
        }
      }
    }

		$(document).ready(function(){
			var linkSong = getCookie('linkSong');
			var numberSpeed = getCookie('numberSpeed') === ''? 1 : getCookie('numberSpeed');
			if(linkSong === ''){
				setCookie('linkSong', $('#source-audio').attr('src'), 200);
			}else{
				setLinkPlay(linkSong);
				setNumberSpeed(numberSpeed);
			}
      var linkDecodeSong = decodeURI(linkSong);
      var numberTabLinkSong = ((linkDecodeSong.search("LPTD 4") > 0)?'4':(linkDecodeSong.search("LPTD 3") > 0)?'3':(linkDecodeSong.search("LPTD 2") > 0)?'2':'1');
      $('#pills-tab-div-'+numberTabLinkSong).click();
		})

		$('.click-mp3').on('click', function(e){
			e.preventDefault();
			var href = this.href;
			setLinkPlay(href);
	    var number = $('#number-speed').val();
	    setNumberSpeed(number);
		})
		$('#number-speed').on('change', function(){
			var numberSpeed = this.value;
			setNumberSpeed(numberSpeed);
		})
	</script>
</body>
</html>

