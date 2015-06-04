function changeFilter(){ 
    kind = $('#watchesSelect').val();
    makeFilter(kind);
    
}
function makeFilter(filterId){ console.log(filterId);
       switch(filterId) { 

            // watches
            case "21":  
                $('#seeAll').attr('href', '/e-store/watches/157/');
                var head = "<div class=\"option\" id=\"watchesKind\"><select id=\"watchesSelect\" name=\"\" onchange=\"changeFilter()\" ><option value=\"0\">Часы</option><option value=\"21\" selected >Наручные</option><option value=\"27\">Интерьерные</option></select></div>";
                var bottom = "<div class=\"option clear\"  onclick=\"filterReset()\" >Очистить</div></div>";
                var body = '';
                var str;
                var k;
                var subBottom = '</select></div>';console.log(filterWatches);
                for (k = 0, len = filterWatches.length; k < len; ++k) {
                    
                    var option = "<div class=\"option\"><select id=\""+filterWatches[k].id+"\" onchange=\"changeCriteria('"+filterWatches[k].id+"')\" >";
                    var n = 0; 
                    var inner = '<option value="">'+filterWatches[k].name+'</option>';
                    
                    for(n =0, leng = filterWatches[k].value.length; n < leng; ++n){
                        inner = inner+'<option value="'+filterWatches[k].value[n].value+'">'+filterWatches[k].value[n].value+'</option>';
                    }
                    
                    var subHead = '<div class="option" id="watchesKind"><select id="watchesSelect" name="">';
                    
                    body = body+option+inner+subBottom;
                }
                str = head+body+bottom;
                $('div.search-options').html('');
                $('div.search-options').append(str);
//                currentFilter.splice(0, currentFilter.length);
                var k;
                var curentFilterStr = '';
                for (k = 0, len = filterWatches.length; k < len; ++k) {
                var filtId = filterWatches[k].id;
                var subLen = len - 1;
                if(subLen > k){
                    curentFilterStr = curentFilterStr+"\""+filterWatches[k].id+"\": \""+filterWatches[k].def+"\",  ";
                }else if(subLen == k){
                    curentFilterStr = curentFilterStr+"\""+filterWatches[k].id+"\":\""+filterWatches[k].def+"\"";
                }
//                     currentFilter.push({
//                         name: filterWatches[k].id,
//                         value: filterWatches[k].def
//                     });
                }
                var finalFilterStr = "{"+curentFilterStr+"}";
                currentFilter = JSON.parse(finalFilterStr);

                kind = filterId;
                changeCriteria(kind);
                
            break;
            // clocks
            case "27":     
                $('#seeAll').attr('href', '/e-store/watches/156/');
                var head = "<div class=\"option\" id=\"watchesKind\"><select id=\"watchesSelect\" name=\"\" onchange=\"changeFilter()\" ><option value=\"0\">Часы</option><option value=\"21\" selected >Наручные</option><option value=\"27\" selected>Интерьерные</option></select></div>";
                var bottom = "<div class=\"option clear\" onclick=\"filterReset()\">Очистить</div></div>";
                var body = '';
                var str;
                var k;
                var subBottom = '</select></div>';
                for (k = 0, len = filterClocks.length; k < len; ++k) {
                    
                    var option = "<div class=\"option\"><select id=\""+filterClocks[k].id+"\" onchange=\"changeCriteria('"+filterClocks[k].id+"')\">";
                    var n = 0; 
                    var inner = '<option value="">'+filterClocks[k].name+'</option>';
                    
                    for(n =0, leng = filterClocks[k].value.length; n < leng; ++n){
                        inner = inner+'<option value="'+filterClocks[k].value[n].value+'">'+filterClocks[k].value[n].value+'</option>';
                    }
                    
                    var subHead = '<div class="option" id="watchesKind"><select id="watchesSelect" name="">';
                    
                    body = body+option+inner+subBottom;
                }
                str = head+body+bottom;
                $('div.search-options').html('');
                $('div.search-options').append(str);
//                currentFilter.splice(0, currentFilter.length);
                var k;
                var curentFilterStr = '';
                for (k = 0, len = filterClocks.length; k < len; ++k) {
                var filtId = filterClocks[k].id;
                var subLen = len - 1;
                if(subLen > k){
                    curentFilterStr = curentFilterStr+"\""+filterClocks[k].id+"\": \"\",  ";
                }else if(subLen == k){
                    curentFilterStr = curentFilterStr+"\""+filterClocks[k].id+"\":\"\"";
                }
//                     currentFilter.push({
//                         name: filterWatches[k].id,
//                         value: filterWatches[k].def
//                     });
                }
                var finalFilterStr = "{"+curentFilterStr+"}";console.log(finalFilterStr);
                currentFilter = JSON.parse(finalFilterStr);

                kind = filterId;
                changeCriteria(kind);
            break;
                
            default:
                $('#seeAll').attr('href', '/e-store/watches/157/');
                var str = "<div class=\"option\" id=\"watchesKind\"><select id=\"watchesSelect\" name=\"\" onchange=\"changeFilter()\" ><option value=\"0\">Часы</option><option value=\"21\" selected >Наручные</option><option value=\"27\">Интерьерные</option></select></div><div class=\"option clear\" onclick=\"filterReset()\">Очистить</div></div>";
                $('div.search-options').html('');
                $('div.search-options').append(str);
//                currentFilter.splice(0, currentFilter.length);
                kind = filterId; 
                
        }
         $('.b-quick-selection .search-options .option select, .b-products .sortable select').selectpicker();
}

function changeCriteria(id){ 
    var selectValue = $('#'+id+' option:selected').val();
    currentFilter[id] = selectValue;
   
    $('#preloader_img').show();
    var url = "bitrix/components/demo/fastsearch/filter.php";
    $.ajax({
        url: url,
        type: 'post',
        data: {filter: currentFilter,
                iblockId: kind},
        error: function(xhr, status, error){
            console.log(xhr.responseText + '|\n' + status + '|\n' +error);

        },
        success: function(data) {
            data = JSON.parse(data);
            $('div.products-list').html('');
            $('#items_amount').text('');
           $('div.products-list').append(data.ITEMS);
           $('#items_amount').append(data.COUNT);
//            $('div.products-list').html('');
        }
    });

}

function filterReset(){
    $('#seeAll').attr('href', '/e-store/watches/157/');
    var filterStrAppend = "<div class=\"option\" id=\"watchesKind\"><select id=\"watchesSelect\" name=\"\" onchange=\"changeFilter()\" ><option value=\"0\" selected>Часы</option><option value=\"21\"  >Наручные</option><option value=\"27\">Интерьерные</option></select></div><div class=\"option clear\" onclick=\"filterReset()\">Очистить</div></div>";

    $('div.search-options').html('');
    $('div.search-options').append(filterStrAppend);
    $('div.products-list').html('');
    $('div.products-list').append(defaultJsonStr);
     $('.b-quick-selection .search-options .option select, .b-products .sortable select').selectpicker();
}

