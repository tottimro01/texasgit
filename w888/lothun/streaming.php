<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.6.5/video-js.min.css"> -->
<!-- <link rel="stylesheet" href="js/videojs/videojs-skin-hu.css">     -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.6.5/video.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-flash/2.2.1/videojs-flash.min.js"></script> -->
<link rel="stylesheet" href="js/videojs/video-js.min.css">    
<script src="js/videojs/video.min.js"></script>
<!-- <script src="js/videojs/videojs-flash.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js"></script>
<style>
.video-js .vjs-fullscreen-control{
    margin-left: auto;
}
</style>
<div  class="video-js-box hu-css">
<video id="stream_vdo" class="video-js " style="width:<?=$w;?>px; height:<?=$h;?>px;">
    <!-- <source src="<?=$streaming;?>" type="rtmp/mp4" /> -->
    <source src="https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8"
     type="application/x-mpegURL" />

</video>
<script>
    var player = videojs('stream_vdo', {
        // techOrder: ["flash"],
        controls: true,
        preload: "auto",
        controlBar: {
            progressControl: false,
            currentTimeDisplay: false,
            timeDivider: false,
            durationDisplay: false,
            remainingTimeDisplay: false,
            pictureInPictureToggle: false,
        },
    });
    player.ready(function(){
    var videojsPromise = player.play();
        if (videojsPromise !== undefined) {
            videojsPromise.then(function() {
                // Autoplay started!
            }).catch(function(error) {
                console.log(error)
                // Autoplay was prevented.
            });
        }
    });
</script>
</div>				