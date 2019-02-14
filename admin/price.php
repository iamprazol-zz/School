<?php

$web_page_data = file_get_contents("http://gajabko.com/?s=iphone+x");
echo "Below data is output of Above webpage data".'<br>';
echo "!!----------------------------------------------------------------------------!!".'<br>';
//echo $web_page_data;

$item_list = explode('<ul class="products">', $web_page_data);

for($i=1;$i<=5;$i++){

    echo $item_list[$i];

}
?>
