dsafdasdasf
<script type="text/javascript">
$(document).ready(function() {    
	$.gritter.add({
	    // (string | mandatory) the heading of the notification
	    title: '<?= h($titulo); ?>',
	    // (string | mandatory) the text inside the notification
	    text: '<?php echo h($message); ?>',
	    // (string | optional) the image to display on the left
	    image: 'img/style1/logo_gsk.png',
	    // (bool | optional) if you want it to fade out on its own or just sit there
	    sticky: true,
	    // (int | optional) the time you want it to be alive for before fading out
	    time: '',
	    // (string | optional) the class name you want to apply to that specific message
	    class_name: 'my-sticky-class'
	});
});
</script>