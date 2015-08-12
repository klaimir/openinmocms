<?php
if(file_exists(INCLUDE_PATH . '/plugins/clickheat/libs/index.php'))
{
    echo "Updating to phpMyVisites 2.4...
    <br/>Deleting the plugin clickheat (which contains a security issue)...";
    @rmrdir(INCLUDE_PATH . '/plugins/clickheat/');
    @unlink(INCLUDE_PATH . '/datas/thumbs.php');
    @unlink(INCLUDE_PATH . '/config/plugin.php');
    
    echo "<br><br><b><font size='13pt' color=red>Please remove the clickheat Javascript code from your pages if you were using clickheat!</font></b>";
}
