$( document ).ready(function() {
	$('body').on('click','.overlay',function(){
		var this_btn = $(this),
			id = this_btn.data('id'),
			video_id = 'video_' + id,
			video = document.getElementById(video_id);

		play(this_btn, video);
	}) 
});

function play(overlay, vid) { 
    if (vid.paused){
        vid.play(); 
        overlay.className = "o";
    }else {
        vid.pause(); 
        overlay.className = "";
    }
}