<?php
	include('../source/encoding.php');
?>

 <?php 
  	$rootPath = "..\BookWorm";
	$folders = array_filter(glob($rootPath."\*"), 'is_dir');
	if(count($folders) > 0){
		$urlBookwormCurrent = isset($_POST['BOOKWORM'])?$_POST['BOOKWORM']:$folders[0];
	}
	$phpfiles = glob($urlBookwormCurrent. "\*.mp3");
  	natsort($phpfiles);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="author" content="John Doe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title id="title-id">Bookworm</title>
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
			    	<form id="form-choose-bookworm" action="" method="POST">
			    		<div class="input-group mb-3">
					  		<div class="input-group-prepend">
					    		<label class="input-group-text" for="inputGroupSelect01">Choose bookworm</label>
						 	</div>
						  	<select class="custom-select" id="select-bookworm" name="BOOKWORM">
						    <?php 
				      			foreach ($folders as $value) {
					      	?>
					      			<option value="<?=$value?>" <?=($urlBookwormCurrent===$value)?'selected':''?>><?= str_replace("$rootPath\\", "", $value)?></option>
					        <?php 
					        	}
					        ?>
						  	</select>
						</div>
					</form>
			    </div>
			</div>
			<div class="col-sm-8">
		        <div>
		          <div class="tab-content" id="pills-tabContent">
		            <div class="tab-pane fade show active" id="pills-tab-1" role="tabpanel" aria-labelledby="pills-tab-div-1">
		              <div class="list-group">
		                <?php 
		                  foreach ($phpfiles as $phpfile)
		                  {
		                    $linkSong = Encoding::toUTF8($phpfile);
		                    ?>
		                      <a href="<?=$linkSong?>" class="bg-info text-white list-group-item list-group-item-action click-mp3">
		                        <?=str_replace("$urlBookwormCurrent\\","",$linkSong)?>
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
		var rootPath = '<?=$rootPath?>'.replace('..','../');
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
		    audio[0].pause();
		    audio[0].load();
		    var arSong = href.split("/");
		    $('#name-song').text(decodeURI(arSong[arSong.length - 1]));
        	$('#title-id').text(decodeURI(arSong[arSong.length - 1]));
		    setCookie('linkSongBook', href, 200);
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

    $('#select-bookworm').on('change', function(e){
    	$('#form-choose-bookworm').submit();
    })

	$(document).ready(function(){
		var linkSong = getCookie('linkSongBook');
		var numberSpeed = getCookie('numberSpeed') === ''? 1 : getCookie('numberSpeed');
		if(linkSong === ''){
			setCookie('linkSongBook', $('#source-audio').attr('src'), 200);
		}else{
			setLinkPlay(linkSong);
			setNumberSpeed(numberSpeed);
			var urlFolderSong = linkSong.split('/');
			var valueOption = rootPath+'/'+urlFolderSong[urlFolderSong.length - 2];
			// $('#select-bookworm').val(valueOption+'');
		}

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

