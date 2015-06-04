<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<style>
    .black_words{
        color: #000000 !important;
    }
    .gray_words{
        color: #ced2d6 !important;
    }
</style>   
<!-----pagnali------->

<div class="brands-tabs">
    <ul class="nav-tabs" id="optionsList">
        <li  class="">
            <a style="cursor: pointer" id="allBrands" onclick="allBrands()">
                Показать все бренды
            </a>
        </li>
<?php foreach($arResult['PARAMETERS'] as $param){?>

        <li class="<?= $param['class_name'] ?> ">
        <a style="cursor: pointer" class="<?= $param['class_name'] ?>  gray_words" id="<?= $param['class_name'] ?>" onclick="filt('<?= $param['class_name'] ?>')">
                <?=  $param['NAME'] ?>
        </a>
        </li>
<?php } ?>
    </ul>
</div>
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="all">
        <div class="brands-alphabet-list-wrapper">
            <div class="brands-alphabet-list">
                <?php foreach($arResult['BRANDS'] as $item){?>
                    <?php $firstLetter = strtoupper(substr($item['NAME'], 0,1)); ?>
                            <?php if($firstSym && $firstSym != $firstLetter) { ?>
                                </div>
                            <?php }?>
                            <?php if(!$firstSym || $firstSym != $firstLetter) { ?>
                              <div class="group">  
                              <div class="letter">
                                <?= $firstLetter ?>
                              </div>
                            <?php }?>
                            <ul class="column">
                                <a href="<?= $item['DETAIL_URL'].$item['brand_chapter']['VALUE'] ?>/" class="<?= $item['class_name'] ?> black_words">
                                        <?=  $item['NAME'] ?>
                                </a>
                            </ul>    

                          <?php $firstSym = $firstLetter; ?>

                    <?php } ?>
            </div>
            <!-- / .brands-alphabet-list -->
        </div>
            <!-- / .brands-alphabet-list-wrapper -->
    </div>
</div>
<script>
    function filt(css){console.log(css);
        $('ul.column a').removeClass("black_words");
        $('ul.column a').addClass("gray_words");
        $('ul.column a.'+css).removeClass("gray_words");
        $('ul.column a.'+css).addClass("black_words");
        

        $('#optionsList a').addClass("gray_words");
        $('#optionsList li'+css).addClass("active");
        $('#optionsList a.'+css).removeClass("gray_words");
    }
    
    function allBrands(){
        $('#optionsList a').addClass("gray_words");
        $('#optionsList a#allBrands').removeClass("gray_words");
        $('#optionsList a#allBrands').addClass("black_words");
        
        $('ul.column a').removeClass("gray_words");
        $('ul.column a').addClass("black_words");
    }
</script>