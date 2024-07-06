<?php
wp_head();
?>

<style>
html {
    margin: 0 !important;
}
body {
    overflow: hidden;
}
#unity-container {
    width: 100%;
    height: 100%;
}
#unity-canvas {
    width: 100% !important;
    height: 100svh !important
}
</style>
<?php
the_content();
?>

<script>
    document.addEventListener('DOMContentLoaded', function(){ // Аналог $(document).ready(function(){
        document.getElementById("unity-canvas").requestFullscreen()
    })
</script>