<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="common/css/bootstrap.css" rel="stylesheet">
	<link href="common/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="common/css/bootstrap-custom.css" rel="stylesheet">
	<link href="common/css/font-awesome.css" rel="stylesheet">
	<!--[if lt IE 7]>
	<link href="common/css/font-awesome-ie7.css" rel="stylesheet">
	<![endif]-->
	<link href="common/css/style.css" rel="stylesheet">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Fav and touch icons -->
	<link rel="shortcut icon" href="common/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="common/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="common/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="common/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="common/ico/apple-touch-icon-57-precomposed.png">
	<script src="common/js/lib/bootstrap/jquery.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-transition.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-alert.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-modal.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-dropdown.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-scrollspy.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-tab.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-tooltip.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-popover.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-button.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-collapse.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-carousel.js"></script>
	<script src="common/js/lib/bootstrap/bootstrap-typeahead.js"></script>
	<script src="common/js/common.js"></script>
</head>
<body>

<!-- NAVBAR
================================================== -->
<div class="container navbar-wrapper">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">Project name</a>
			<div class="nav-collapse collapse">
			</div><!--nav-collapse -->
		</div><!--navbar-inner -->
	</div><!--navbar -->
</div><!--container -->

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span9">
			<div class="row-fluid shop-items">
{foreach from=$categories item=v}
				<div class="span3">
					<dl class="blue active">
						<dt class="item-img">
							<img class="img-circle" src="common/images/naviko/01.png" onclick="location.href='http://www.snowwhite.hokkaido.jp/ThetaTest/main.html?viewmode=0'">
						<ul>
							<li class="heading"><h2>{$v.title}</h2></li>
							<li class="take-look">選択</li>
						</ul>
						</dt>
					</dl>
				</div><!--span3 -->
	<div class="span3">
		<dl class="blue active">
			<dt class="item-img">
				<img class="img-circle" src="common/images/naviko/01.png" onclick="location.href='http://www.snowwhite.hokkaido.jp/ThetaTest/main.html?viewmode=1'">
			<ul>
				<li class="heading"><h2>{$v.title}(2画面)</h2></li>
				<li class="take-look">選択</li>
			</ul>
			</dt>

		</dl>
	</div><!--span3 -->
{/foreach}
			</div><!--/row-->
		</div><!--/span-->
	</div><!--/row-->
	<hr>
</div><!--/.fluid-container-->

<!-- FOOTER -->
<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row cf">
            <div class="span4">
                <div class="f-span-inner">
                    <p class="foot-tit">Contact Info</p>
                    <ul class="contact-info">
                        <!--<em class="shouttop">&nbsp;</em>-->
{*                        <li>Boulevard 42, Copacabana</li>
                        <li>Tokyo - Japan</li>*}
{*                        <li><i class="icon-phone"></i>+99 (99) 9999-999</li>*}
                        <li><i class="icon-envelope"></i>minavi.sw@gmail.com</li>
                    </ul>
                    <ul class="brand-icon">
                        <li class="brand1"><a href="#"><i class="icon-facebook-sign"></i></a></li>
                        <li class="brand2"><a href="#"><i class="icon-twitter"></i></a></li>
                        <li class="brand3"><a href="#"><i class="icon-google-plus-sign"></i></a></li>
                    </ul>
                </div><!--span-inner-->
            </div><!--span4-->
        </div>
    </div><!--container-->
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; 2016 SnowWhite. All Rights Reserved. </p>
        </div><!--container-->
    </div><!--footer-bottom-->
</footer>
</body>
</html>
</body>
</html>
