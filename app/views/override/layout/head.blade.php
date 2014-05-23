<link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/zepto/1.1.3/zepto.min.js"></script>

<script type="text/javascript">
    $(document).ready( function() {
    $("#post-form form").hide();
    $("#post-form h3").on("click tap", function() { 
        $(this).parent().find("form").toggle(); 
        $("#post-form input[type='text']").first().focus();
        });
    });
    
</script>
