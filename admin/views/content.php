<?php foreach($items as $item) { ?>
    <div class="thumbnail backgroundColorBlack">
        <img src="<?php echo IMAGES_PATH.$item[0];?>" alt="...">
        <div class="colorLightGray">
            <h4 class="text-center colorWhite"><?php echo $item[2];?></h4>
            <div class="pull-right paddingLeftRight3PX">
                              <span class="fontSize16PX">
                                  <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                  <?php echo date('d-m-Y',$item[1]);?>
                              </span>
            </div>
            <div class="vkLike fontSize16PX paddingLeftRight3PX">
                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Мне нравится 16
            </div>
        </div>
    </div>
<?php } ?>
<div class="centerBanner marginBottom20PX">
    Место для вашей рекламы
    Место для вашей рекламы

    Место для вашей рекламы

    Место для вашей рекламы

    Место для вашей рекламы
</div>