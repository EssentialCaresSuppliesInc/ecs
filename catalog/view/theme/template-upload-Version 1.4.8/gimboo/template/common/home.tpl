<?php echo $header; ?>
<div id="slider">
    <img src="catalog/view/theme/gimboo/nivoslider/slide1.jpg" alt=""title="#htmlcaption"/>
   <img src="catalog/view/theme/gimboo/nivoslider/slide2.jpg" alt="" title="Homepage sliders bottom text. Customize it by simply editing the file: 'template/common/home.tpl'" /></a>
    <img src="catalog/view/theme/gimboo/nivoslider/slide3.jpg" alt="" title="Homepage sliders bottom text. Customize it by simply editing the file: 'template/common/home.tpl'" />
    <img src="catalog/view/theme/gimboo/nivoslider/slide4.jpg" alt=""title="Homepage sliders bottom text. Customize it by simply editing the file: 'template/common/home.tpl'" />
</div>
<div id="htmlcaption" class="nivo-html-caption">
    <strong>This is an example of a caption with a link <a href="http://gimboo.co.uk/" target="_blank">Gimboo Design</a>.
</div>

<?php echo $column_left; ?><?php echo $column_right; ?>

<div id="content">

  <?php if ($welcome) { ?>
  <div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
      <h1><?php echo $heading_title; ?></h1>
    </div>
  </div>
  

  
  <div class="middle">
    <div><?php echo $welcome; ?></div>
  </div>
  <div class="bottom">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center"></div>
  </div>
  <?php } ?>
  <?php foreach ($modules as $module) { ?>
  <?php echo ${$module['code']}; ?>
  <?php } ?>
</div>
<?php echo $footer; ?>