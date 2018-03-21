<?php include("head.php");?>

<body  id="indexBG">
	<?php include("navbar.php");?>


	<div class="container">

		<div class="row contact_columns">
            <div class="col-md-6 col-sm-6 col-xs-12 index">
                <form class="form-horizontal" role="form" method="post" action="form.php">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Imię</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Imię, nazwisko" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Wiadomość</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="10" name="message"></textarea>
                        </div>


                    </div>
                    <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4 text-center">
                                <input id="submit" name="submit" type="submit" value="Wyślij" class="btn btn-lg btn-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <! Will be used to display an alert to the user>
                            </div>
                        </div>
                </form> 
            </div>
            
            <div class="col-md-6 col-sm-6 col-xs-12 index">
                <div style='background: transparent; text-align: left' class="jumbotron">
                    <h2 style="margin-top: -10%; padding-bottom: 10%;">Elektro Marti - Marcin Płowucha</h2>
                    <p><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> Adres: Racibórz, ul. Powstańsów Śl. 6a</p>
                    <p><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> Biuro: Racibórz, ul. Mickiewicza 13b</p>
                    <p><i class="fa fa-phone fa-lg" aria-hidden="true"></i> (+48) 784 042 220</p>
                    <p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> elektromarti@interia.pl</p>    
                </div>
            </div>

            <div class="col-sm-10 col-sm-offset-1 col-md-offset-4 col-md-6">
                <div class="row">
                    <div class="fb-page center-block" data-href="https://www.facebook.com/Elektro-Marti-1585334751678992/?hc_ref=PAGES_TIMELINE&amp;fref=nf" data-tabs="timeline" data-width="400" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Elektro-Marti-1585334751678992/?hc_ref=PAGES_TIMELINE&amp;fref=nf" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Elektro-Marti-1585334751678992/?hc_ref=PAGES_TIMELINE&amp;fref=nf">Elektro Marti</a></blockquote></div>
                </div>
            </div>
	</div>

		

	<?php include("footer.php");?>
</body>
</html>