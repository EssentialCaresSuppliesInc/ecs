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
      <li>Address: 795 East Washington Blvd. Los Angeles, CA 90021</li>
      <li>Tel: (213) 743-1402</li>
      <li>Fax: (213) 743-1401</li>
      <li>info@essentialcares.com</li>
    </ul>
    <h3 class="h3i">Follow Us</h3>
   <img src="http://www.essentialcaressupplies.com/social.png" width="81" height="28" border="0" usemap="#Soci" />
<map name="Soci" id="Soci">
  <area shape="rect" coords="2,4,23,25" href="https://www.facebook.com/pages/Essential-Cares-Supplies-Inc/131415710378975" target="_blank" />
  <area shape="rect" coords="27,2,52,26" href="https://twitter.com/EssentialCares" target="_blank" />
  <area shape="rect" coords="55,5,77,25" href="http://www.linkedin.com/profile/view?id=243712920&trk=hb_tab_pro_top" target="_blank" />
</map>
  </div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</div>
</div>
</body></html>