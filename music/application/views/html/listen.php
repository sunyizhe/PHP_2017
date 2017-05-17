<!DOCTYPE html>
<!-- // <?php
	// if($this->session->userdata('logged_in') != 'TRUE'){
		// redirect('user/unindex');
	// }
// ?> -->
<html>
<head>
	<title>收听</title>
	<base href="<?php echo site_url()?>" target=""/>
	<link rel="stylesheet"  type="text/css" href="assets/css/stylesheets/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/header.css">
	<script src="assets/js/jquery-1.7.2.min.js"></script>
	<style>
		#pl_input{
			width: 400px;
			height: 80px;
			margin-left:300px;
			outline: none;
		}
		#pl-btn{
			display:block;
			
		}
		.aa{
			width:1000px;
			height:250px;
		}
		.pl_con{
			width:500px;
			margin: 20px auto;
			border:1px solid #fff;
			
			/*margin-bottom:20px;*/
		}
		.pl_con p{
			
		}
	</style>
</head>
<body>
	<div class="top">
			<div class="wrapper">
				<div class="logo">
					<a href="user/index">
						<img src="assets/images/logo.jpg" />
					</a>
				</div>
				<ul class="top-nav">
					<li><a href="user/index">首页</a></li>
					<li><a href="user/lists">榜单</a></li>	
					<!-- <li><a href="user/album">专辑</a></li> -->
					<li><a href="user/singer">歌手</a></li>
				</ul>
				<div class="log-reg">
					<a href="user/unindex">退出</a>
					<a href="user/collect"><?php echo $this->session->userdata('name')?></a>
				</div>
				<div class="se">
					<form action="user/search" method="post">
						<input type="text" placeholder="找到好音乐">
						<input type="submit" class="search-botn" value="">
					</form>
				</div>
			</div>
	</div>
			<div>
				<!-- <div id="background"></div> -->
			<div id="player">
			<div class="cover"></div>
			<div class="ctrl">
				<div class="tag">
					<strong>Title</strong>
					<span class="artist">Artist</span>
					<span class="album">Album</span>
				</div>
				<div class="control">
					<div class="left">
						<div class="rewind icon"></div>
						<div class="playback icon"></div>
						<div class="fastforward icon"></div>
					</div>
					<div class="volume right">
						<div class="mute icon left"></div>
						<div class="slider left">
							<div class="pace"></div>
						</div>
					</div>
				</div>
				<div class="progress">
					<div class="slider">
						<div class="loaded"></div>
						<div class="pace"></div>
					</div>
					<div class="timer left">0:00</div>
					<!-- <div class="right">
						<div class="repeat icon"></div>
						<div class="shuffle icon"></div>
					</div> -->
				</div>
			</div>
		</div>
		<ul id="playlist"></ul>
			</div>
		<div id="pl" style="background: #333;
		
		">
		  	<!-- <form action="user/pl_con?id=<?php echo $xid;?>" method="get"> -->
		  	
				
				
				<div class="aa">
				<input value="<?php echo $id; ?>" id="hide" style="display: none;"/>
				<label for="pl_input" style=" margin-left:300px;">评论:</label>
				<br/><input id="pl_input"><br/>
				<input type="submit" id="pl-btn" value="提交评论"/>
				  
				</div>
				<?php
				foreach ($pl as $p) {
			?>
			
					<div class="pl_con" style="">
						<p><?php echo $p->plcon;?></p><br/>
						评论人：<p><?php echo $p->uname;?></p>
						
						评论时间：<p><?php echo $p->pltime;?></p>
					</div>
			
			<?php } ?>
			<!-- </form> -->
			
		</div>
		<script src="assets/js/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$('#pl-btn').on('click',function(){
				var $id = $('#hide').val();
				var $con = $('#pl_input').val();
				$.get('user/pl_con',{'xid':$id,'comment':$con},function(data){
					// if(data=='success'){
						// alert('评论成功');
// 						
					// }
					// else{
						// alert('评论失败');
					// }
					if(data){
						alert('评论成功');
						$('#pl').append('<div class="pl_con">' + '<p>' + data[0].plcon + '</p>' + '<br/>' +
						'评论人：' + '<p>' + data[0].uname + '</p>' +
						 '评论时间：' + '<p>' + data[0].pltime + '</p>' + 
					'</div>');
					
					}
					else{
						alert('评论失败');
					}	
					
				},"json");
			});
		</script>
		
		

		
		
		
		
		
		<script >
		(function($){
				// Settings
				var repeat = localStorage.repeat || 0,
					shuffle = localStorage.shuffle || 'false',
					continous = true,
					autoplay = true,
					playlist = [
					{
			title: '<?php echo $listen->mname?>',
			artist: '<?php echo $listen->msinger?>',
			album: '<?php echo $listen->mfile?>',
			cover:'assets/img/<?php echo $lis->apic?>',
			mp3: 'assets/mp3/<?php echo $listen->mfile?>',
			ogg: ''
			},
			
			];
			
				// Load playlist
				for (var i=0; i<playlist.length; i++){
					var item = playlist[i];
					$('#playlist').append('<li>'+item.artist+' - '+item.title+'</li>');
				}
			
				var time = new Date(),
					currentTrack = shuffle === 'true' ? time.getTime() % playlist.length : 0,
					trigger = false,
					audio, timeout, isPlaying, playCounts;
			
				var play = function(){
					audio.play();
					$('.playback').addClass('playing');
					timeout = setInterval(updateProgress, 500);
					isPlaying = true;
				}
			
				var pause = function(){
					audio.pause();
					$('.playback').removeClass('playing');
					clearInterval(updateProgress);
					isPlaying = false;
				}
			
				// Update progress
				var setProgress = function(value){
					var currentSec = parseInt(value%60) < 10 ? '0' + parseInt(value%60) : parseInt(value%60),
						ratio = value / audio.duration * 100;
			
					$('.timer').html(parseInt(value/60)+':'+currentSec);
					$('.progress .pace').css('width', ratio + '%');
					$('.progress .slider a').css('left', ratio + '%');
				}
			
				var updateProgress = function(){
					setProgress(audio.currentTime);
				}
			
				// Progress slider
				$('.progress .slider').slider({step: 0.1, slide: function(event, ui){
					$(this).addClass('enable');
					setProgress(audio.duration * ui.value / 100);
					clearInterval(timeout);
				}, stop: function(event, ui){
					audio.currentTime = audio.duration * ui.value / 100;
					$(this).removeClass('enable');
					timeout = setInterval(updateProgress, 500);
				}});
			
				// Volume slider
				var setVolume = function(value){
					audio.volume = localStorage.volume = value;
					$('.volume .pace').css('width', value * 100 + '%');
					$('.volume .slider a').css('left', value * 100 + '%');
				}
			
				var volume = localStorage.volume || 0.5;
				$('.volume .slider').slider({max: 1, min: 0, step: 0.01, value: volume, slide: function(event, ui){
					setVolume(ui.value);
					$(this).addClass('enable');
					$('.mute').removeClass('enable');
				}, stop: function(){
					$(this).removeClass('enable');
				}}).children('.pace').css('width', volume * 100 + '%');
			
				$('.mute').click(function(){
					if ($(this).hasClass('enable')){
						setVolume($(this).data('volume'));
						$(this).removeClass('enable');
					} else {
						$(this).data('volume', audio.volume).addClass('enable');
						setVolume(0);
					}
				});
			
				// Switch track
				var switchTrack = function(i){
					if (i < 0){
						track = currentTrack = playlist.length - 1;
					} else if (i >= playlist.length){
						track = currentTrack = 0;
					} else {
						track = i;
					}
			
					$('audio').remove();
					loadMusic(track);
					if (isPlaying == true) play();
				}
			
				// Shuffle
				var shufflePlay = function(){
					var time = new Date(),
						lastTrack = currentTrack;
					currentTrack = time.getTime() % playlist.length;
					if (lastTrack == currentTrack) ++currentTrack;
					switchTrack(currentTrack);
				}
			
				// Fire when track ended
				var ended = function(){
					pause();
					audio.currentTime = 0;
					playCounts++;
					if (continous == true) isPlaying = true;
					if (repeat == 1){
						play();
					} else {
						if (shuffle === 'true'){
							shufflePlay();
						} else {
							if (repeat == 2){
								switchTrack(++currentTrack);
							} else {
								if (currentTrack < playlist.length) switchTrack(++currentTrack);
							}
						}
					}
				}
			
				var beforeLoad = function(){
					var endVal = this.seekable && this.seekable.length ? this.seekable.end(0) : 0;
					$('.progress .loaded').css('width', (100 / (this.duration || 1) * endVal) +'%');
				}
			
				// Fire when track loaded completely
				var afterLoad = function(){
					if (autoplay == true) play();
				}
			
				// Load track
				var loadMusic = function(i){
					var item = playlist[i],
						newaudio = $('<audio>').html('<source src="'+item.mp3+'"><source src="'+item.ogg+'">').appendTo('#player');
					
					$('.cover').html('<img src="'+item.cover+'" alt="'+item.album+'">');
					$('.tag').html('<strong>'+item.title+'</strong><span class="artist">'+item.artist+'</span><span class="album">'+item.album+'</span>');
					$('#playlist li').removeClass('playing').eq(i).addClass('playing');
					audio = newaudio[0];
					audio.volume = $('.mute').hasClass('enable') ? 0 : volume;
					audio.addEventListener('progress', beforeLoad, false);
					audio.addEventListener('durationchange', beforeLoad, false);
					audio.addEventListener('canplay', afterLoad, false);
					audio.addEventListener('ended', ended, false);
				}
			
				loadMusic(currentTrack);
				$('.playback').on('click', function(){
					if ($(this).hasClass('playing')){
						pause();
					} else {
						play();
					}
				});
				$('.rewind').on('click', function(){
					if (shuffle === 'true'){
						shufflePlay();
					} else {
						switchTrack(--currentTrack);
					}
				});
				$('.fastforward').on('click', function(){
					if (shuffle === 'true'){
						shufflePlay();
					} else {
						switchTrack(++currentTrack);
					}
				});
				$('#playlist li').each(function(i){
					var _i = i;
					$(this).on('click', function(){
						switchTrack(_i);
					});
				});
			
				if (shuffle === 'true') $('.shuffle').addClass('enable');
				if (repeat == 1){
					$('.repeat').addClass('once');
				} else if (repeat == 2){
					$('.repeat').addClass('all');
				}
			
				$('.repeat').on('click', function(){
					if ($(this).hasClass('once')){
						repeat = localStorage.repeat = 2;
						$(this).removeClass('once').addClass('all');
					} else if ($(this).hasClass('all')){
						repeat = localStorage.repeat = 0;
						$(this).removeClass('all');
					} else {
						repeat = localStorage.repeat = 1;
						$(this).addClass('once');
					}
				});
			
				$('.shuffle').on('click', function(){
					if ($(this).hasClass('enable')){
						shuffle = localStorage.shuffle = 'false';
						$(this).removeClass('enable');
					} else {
						shuffle = localStorage.shuffle = 'true';
						$(this).addClass('enable');
					}
				});
			})(jQuery);
			
		</script>
</body>
</html>