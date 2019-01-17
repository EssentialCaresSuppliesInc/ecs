</div>
<script type="text/javascript"><!--
$(document).ready(function(){-1==$(location).attr("href").indexOf("account/login")&&$.cookie("url",$(location).attr("href"));$("#welcome a").first().removeAttr("href");$("#welcome a").first().css("position","relative");$("#welcome").append('<div id="loginbox" class="loginbox"></div>');var a=$("#welcome a").first().html();$("#welcome a").first().html('<span class="login"></span>');$("#welcome a .login").html(a);-1!=$("#welcome a[href]").first().attr("href").indexOf("register")?($("#loginbox").load("index.php?route=account/login .right form"), $("#loginbox").css("right","50px")):($("#loginbox").load("index.php?route=account/account #content"),$("#loginbox").css("right","40px"));$("#welcome > a .login").live("hover",function(){$("#welcome").addClass("active");$("#loginbox .breadcrumb").remove();$("#loginbox h1").remove();$("#welcome").live("mouseleave",function(){$(this).removeClass("active")})})});
//--></script>
<div id="footer">
<div id="info">
  <?php if ($informations) { ?>
  <div class="column">
    <h3><?php echo $text_information; ?></h3>
    <ul>
      <?php foreach ($informations as $information) { ?>
      <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
      <?php } ?>
    </ul>
  </div>
  <?php } ?>
  <div class="column">
    <h3><?php echo $text_service; ?></h3>
    <ul>
      <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
      <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
      <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
    </ul>
  </div>
  <div class="column">
    <h3><?php echo $text_extra; ?></h3>
    <ul>
      <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
      <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
      <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
      <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
    </ul>
  </div>
  <div class="column">
    <h3><?php echo $text_account; ?></h3>
    <ul>
      <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
      <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
      <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
      <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
    </ul>
  </div>
  <div class="column">
    <h3 class="h3i">Contact</h3>
    <ul class="nbul">
      <li>123-456-7890</li>
      <li>info@demostore</li>
    </ul>
    <h3 class="h3i">Follow Us</h3>
    <ul class="nbul">
      <li><div id="social"><a class="facebookbutton" href="#" target="_blank" title="Facebook">Facebook</a><a class="twitterbutton" href="#" target="_blank" title="Twitter">Twitter</a><a class="googlebutton" href="#" target="_blank" title="Google+">Google+</a><a class="rssbutton" href="#" target="_blank" title="RSS">RSS</a><a class="vimeobutton" href="#" target="_blank" title="Vimeo">Vimeo</a></div></li>
    </ul>
  </div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<div id="powered">EssentialCares &copy; 2013</div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</div>
</div>
</body></html>