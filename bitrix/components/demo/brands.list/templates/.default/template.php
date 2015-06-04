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
<div id="optionsList">

<?php foreach($arResult['PARAMETERS'] as $param){?>

        <a style="cursor: pointer" class="<?= $param['class_name'] ?>  black_words" id="<?= $param['class_name'] ?>" onclick="filt('<?= $param['class_name'] ?>')">
                <?=  $param['NAME'] ?>
        </a>|

<?php } ?>
        </div>
        </br>
        </br>
        </br>
  </hr>      
  <div id="manufacturers">
<?php foreach($arResult['BRANDS'] as $item){?>
  <?php $firstLetter = strtoupper(substr($item['NAME'], 0,1)); ?>
        <?php if($firstSym && $firstSym != $firstLetter) { ?>
            </div>
        <?php }?>
        <?php if(!$firstSym || $firstSym != $firstLetter) { ?>
            <div class="<?= $firstLetter ?>"><?= $firstLetter ?></br>
        <?php }?>

        <a href="<?= $item['DETAIL_URL'].$item['brand_chapter']['VALUE'] ?>/" class="<?= $item['class_name'] ?> black_words">
                <?=  $item['NAME'] ?>
        </a></br>
        <?php $firstSym = $firstLetter; ?>
<?php } ?></div>
</div>

<script>
    function filt(css){
        $('#manufacturers a').removeClass("black_words");
        $('#manufacturers a.'+css).addClass("black_words");
        
        $('#optionsList a').addClass("gray_words");
        $('#optionsList a.'+css).removeClass("gray_words");
    }
</script>    