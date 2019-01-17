<?php if (isset($_SERVER['HTTP_USER_AGENT']) && !strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) echo '<?xml version="1.0" encoding="UTF-8"?>'. "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" xml:lang="<?php echo $lang; ?>"><head>
<title><?php echo $title; ?></title>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<base href="<?php echo $base; ?>" />
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo str_replace('&', '&amp;', $link['href']); ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $template; ?>/stylesheet/stylesheet.css" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/gimboo/stylesheet/ie6.css" />
<script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
DD_belatedPNG.fix('img, #header .div3 a, #content .left, #content .right, .box .top');
</script>
<![endif]-->



<link type="text/css" href="catalog/view/theme/gimboo/template/nav/menu.css" rel="stylesheet" />
<script type="text/javascript" src="catalog/view/theme/gimboo/template/nav/jquery.js"></script>
<script type="text/javascript" src="catalog/view/theme/gimboo/template/nav/menu.js"></script>






<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/thickbox/thickbox-compressed.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/thickbox/thickbox.css" />
<script type="text/javascript" src="catalog/view/javascript/jquery/tab.js"></script>
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>

<script type="text/javascript"><!--
function bookmark(url, title) {
	if (window.sidebar) { // firefox
    window.sidebar.addPanel(title, url, "");
	} else if(window.opera && window.print) { // opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	} else if(document.all) {// ie
   		window.external.AddFavorite(url, title);
	}
}
//--></script>

<link rel="stylesheet" href="catalog/view/theme/gimboo/nivoslider/nivo-slider.css" type="text/css" media="screen" />
<script src="catalog/view/theme/gimboo/nivoslider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
</head>
<body>





<div id="wrapper">

<div id="header">
  <div class="div1">
    <div class="div2">
    <!-- Logo Starts -->
    
    
      <?php if ($logo) { ?>
      <a href="<?php echo str_replace('&', '&amp;', $home); ?>"><img src="<?php echo $logo; ?>" title="<?php echo $store; ?>" alt="<?php echo $store; ?>" /></a>
      <?php } ?>
    </div>
    
    <!-- Logo Ends -->
    
    <div class="div7">
        <?php if ($currencies) { ?>
        <form action="<?php echo str_replace('&', '&amp;', $action); ?>" method="post" enctype="multipart/form-data" id="currency_form">
          <div class="switcher">
            <?php foreach ($currencies as $currency) { ?>
            <?php if ($currency['code'] == $currency_code) { ?>
            <div class="selected"><a><?php echo $currency['title']; ?></a></div>
            <?php } ?>
            <?php } ?>
            <div class="option">
              <?php foreach ($currencies as $currency) { ?>
              <a onclick="$('input[name=\'currency_code\']').attr('value', '<?php echo $currency['code']; ?>'); $('#currency_form').submit();"><?php echo $currency['title']; ?></a>
              <?php } ?>
            </div>
          </div>
          <div style="display: inline;">
            <input type="hidden" name="currency_code" value="" />
            <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
          </div>
        </form>
        <?php } ?>
        <?php if ($languages) { ?>
        <form action="<?php echo str_replace('&', '&amp;', $action); ?>" method="post" enctype="multipart/form-data" id="language_form">
          <div class="switcher">
            <?php foreach ($languages as $language) { ?>
            <?php if ($language['code'] == $language_code) { ?>
            <div class="selected"><a><img src="image/flags/<?php echo $language['image']; ?>" alt="<?php echo $language['name']; ?>" />&nbsp;&nbsp;<?php echo $language['name']; ?></a></div>
            <?php } ?>
            <?php } ?>
            <div class="option">
              <?php foreach ($languages as $language) { ?>
              <a onclick="$('input[name=\'language_code\']').attr('value', '<?php echo $language['code']; ?>'); $('#language_form').submit();"><img src="image/flags/<?php echo $language['image']; ?>" alt="<?php echo $language['name']; ?>" />&nbsp;&nbsp;<?php echo $language['name']; ?></a>
              <?php } ?>
            </div>
          </div>
          <div>
            <input type="hidden" name="language_code" value="" />
            <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
          </div>
        </form>
        <?php } ?>
    
    <div class="div5">
      <div class="left"></div>
      <div class="right"></div>
      <div class="center">
        <div id="search">
          <div class="div8"><?php echo $entry_search; ?>&nbsp;</div>
          <div class="div9">
            <?php if ($keyword) { ?>
            <input type="text" value="<?php echo $keyword; ?>" id="filter_keyword" />
            <?php } else { ?>
            <input type="text" value="<?php echo $text_keyword; ?>" id="filter_keyword" onclick="this.value = '';" onkeydown="this.style.color = '#000000'" style="color: #999;" />
            <?php } ?>
            <select id="filter_category_id">
              <option value="0"><?php echo $text_category; ?></option>
              <?php foreach ($categories as $category) { ?>
              <?php if ($category['category_id'] == $category_id) { ?>
              <option value="<?php echo $category['category_id']; ?>" selected="selected"><?php echo $category['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select>
          </div>
          <div class="div10">&nbsp;&nbsp;<a onclick="moduleSearch();" class="button"><span><?php echo $button_go; ?></span></a> <a href="<?php echo str_replace('&', '&amp;', $advanced); ?>"><?php echo $text_advanced; ?></a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="div6">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
	  <?php if (isset($common_error)) { ?>
	  <div class="warning"><?php echo $common_error; ?></div>
	  <?php } ?>
      <div id="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        
        <?php } ?>
      </div>
     
      </div>
    </div>
  </div>
</div>

<!-- Menu Starts  -->

<div id="menu">
<ul class="menu">
<li><a href="<?php echo str_replace('&', '&amp;', $home); ?>" class="parent"><span>Home</span></a>

</li>

<?php if (!$logged) { ?>   
<li><a href="<?php echo str_replace('&', '&amp;', $login); ?>"><span>Login</span></a></li>
<?php } else { ?>
<li><a href="<?php echo str_replace('&', '&amp;', $logout); ?>"><span>Logout</span></a></li>
<?php } ?>

<li><a href="<?php echo str_replace('&', '&amp;', $account); ?>"><span>Account</span></a></li>

<li><a href="<?php echo str_replace('&', '&amp;', $cart); ?>"><span>Cart</span></a></li>

<li><a href="<?php echo str_replace('&', '&amp;', $checkout); ?>"><span>Checkout</span></a></li>

<li><a onclick="bookmark(document.location, '<?php echo addslashes($title); ?>');"><span>Bookmark</span></a></li>

<li><a href="<?php echo str_replace('&', '&amp;', $special); ?>"><span>Specials</span></a></li>

<li class="last"><a href="<?php echo str_replace('&', '&amp;', $contact); ?>"><span>Contact Us</span></a></li>

<li><a href="<?php echo str_replace('&', '&amp;', $sitemap); ?>"><span>Sitemap</span></a></li>
</ul>
</div>
<!-- Menu Finished  -->

<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script><script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        effect:'random', //Specify sets like: 'fold,fade,sliceDown'
        slices:60,
        animSpeed:500, //Slide transition speed
        pauseTime:500,
        startSlide:0, //Set starting Slide (0 index)
        directionNav:true, //Next & Prev
        directionNavHide:true, //Only show on hover
        controlNav:true, //1,2,3...
        controlNavThumbs:false, //Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, //Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', //Replace this with...
        controlNavThumbsReplace: 'bullets.png', //...this in thumb Image src
        keyboardNav:true, //Use left & right arrows
        pauseOnHover:true, //Stop animation while hovering
        manualAdvance:false, //Force manual transitions
        captionOpacity:0.8, //Universal caption opacity
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){}, //Triggers after all slides have been shown
        lastSlide: function(){}, //Triggers when last slide is shown
        afterLoad: function(){} //Triggers when slider has loaded
    });
});
</script>

<script type="text/javascript"><!-- 
function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');

		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}
	
	return urlVarValue;
} 

$(document).ready(function() {
	route = getURLVar('route');
	
	if (!route) {
		$('#tab_home').addClass('selected');
	} else {
		part = route.split('/');
		
		if (route == 'common/home') {
			$('#tab_home').addClass('selected');
		} else if (route == 'account/login') {
			$('#tab_login').addClass('selected');	
		} else if (part[0] == 'account') {
			$('#tab_account').addClass('selected');
		} else if (route == 'checkout/cart') {
			$('#tab_cart').addClass('selected');
		} else if (part[0] == 'checkout') {
			$('#tab_checkout').addClass('selected');
		} else {
			$('#tab_home').addClass('selected');
		}
	}
});
//--></script>
<script type="text/javascript"><!--
$('#search input').keydown(function(e) {
	if (e.keyCode == 13) {
		moduleSearch();
	}
});

function moduleSearch() {
	url = 'index.php?route=product/search';
	
	var filter_keyword = $('#filter_keyword').attr('value')
	
	if (filter_keyword) {
		url += '&keyword=' + encodeURIComponent(filter_keyword);
	}
	
	var filter_category_id = $('#filter_category_id').attr('value');
	
	if (filter_category_id) {
		url += '&category_id=' + filter_category_id;
	}
	
	location = url;
}
//--></script>
<script type="text/javascript"><!--
$('.switcher').bind('click', function() {
	$(this).find('.option').slideToggle('fast');
});
$('.switcher').bind('mouseleave', function() {
	$(this).find('.option').slideUp('fast');
}); 
//--></script>
