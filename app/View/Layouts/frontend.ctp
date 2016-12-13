<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport"    content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author"      content="">

        <title>SwankCook</title>

        <link rel="shortcut icon" href="<?php echo SITE_LINK; ?>img/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Raleway:800" rel="stylesheet">
		<?php echo $this->Html->css(array("bootstrap.min","font-awesome.min","star-rating","common")) ?>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src=" js/html5shiv.js"></script>
        <script src=" js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="home">
        <?php echo $this->element("frontheader"); ?>

        <?php echo $content_for_layout; ?>

        <?php echo $this->element("frontfooter"); ?>	

        <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="js/star-rating.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
        <script>
            jQuery(document).ready(function() {
                $("#input-21f").rating({
                    starCaptions: function(val) {
                        if (val < 3) {
                            return val;
                        } else {
                            return 'high';
                        }
                    },
                    starCaptionClasses: function(val) {
                        if (val < 3) {
                            return 'label label-danger';
                        } else {
                            return 'label label-success';
                        }
                    },
                    hoverOnClear: false
                });

                $('#rating-input').rating({
                    min: 0,
                    max: 5,
                    step: 1,
                    size: 'lg',
                    showClear: false
                });

                $('#btn-rating-input').on('click', function() {
                    $('#rating-input').rating('refresh', {
                        showClear: true,
                        disabled: !$('#rating-input').attr('disabled')
                    });
                });


                $('.btn-danger').on('click', function() {
                    $("#kartik").rating('destroy');
                });

                $('.btn-success').on('click', function() {
                    $("#kartik").rating('create');
                });

                $('#rating-input').on('rating.change', function() {
                    alert($('#rating-input').val());
                });


                $('.rb-rating').rating({'showCaption': true, 'stars': '3', 'min': '0', 'max': '3', 'step': '1', 'size': 'xs', 'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}});
            });

            $("#logo-slider").flexisel({
                visibleItems: 4,
                itemsToScroll: 1,
                autoPlay: {
                    enable: true,
                    interval: 5000,
                    pauseOnHover: true
                }
            });
			//setTimeout($('#flashMessage').hide(),5000);
        </script>
    </body>
</html>