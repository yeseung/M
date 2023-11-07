<?php
//header("Content-type:application/json; charset=utf-8");
header("content-type:text/html; charset=utf-8");

include_once("lib.php");




// 테이블
if(!sql_query(" DESC bin_messenger ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS `bin_messenger` (
                    `mg_idx` INT(11) NOT NULL AUTO_INCREMENT,
                    `mg_datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                    `mg_content` VARCHAR(255) NOT NULL DEFAULT '',
                  PRIMARY KEY (`mg_idx`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8; ", false);
}


sql_query(" insert into `bin_messenger` set mg_content = '222' ");


?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>M</title>
    
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>


</head>

<body>
<?php
$sql = " select * from bin_messenger where mg_idx = '1' ";
$row = sql_fetch($sql);

    
    
?>
     
<textarea style="width: 100%; height: 500px" id="mg_content_1" onkeyup="input_add('mg_content', 1);" autocomplete="off"><?php echo $row['mg_content']; ?></textarea>
    
    
    

<script>
function input_add_dup(str, num) {
    
    console.log(str + "/" + num);
    
    var p = "#" + str + "_" + num;
    
    $.ajax({
        url: "./update.php",
        data: {'p': $(p).val(), 's': str, 'i': num},
        type: "POST",
        dataType : 'json',
        success: function (data) {
            console.log(data);
            //alert(data);
        }
    });
}

       
const input_add = _.debounce(input_add_dup, 300);   
</script>

</body>
</html>
