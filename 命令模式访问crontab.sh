# https://form1.cn/php-thinkphp-51.html
#!/bin/sh
#cli.php [模块/控制器/方法]
# 直接在crontab -e 里面写这个指令，每分钟执行
# 方法1：使用 * * * * * php /www/wwwroot/adminnet/indexcli.php Crontab/proTest
# 方法2：或者把当前这个文件创建成shell脚本调用执行
#       * * * * * /bin/sh /www/wwwroot/adminnet/tp3.sh
# 访问   * * * * *  curl http://admincfbao.easychangfang.net/indexcli.php/Crontab/test
# php /www/wwwroot/adminnet/indexcli.php Crontab/proTest
# 0 23 * * * /bin/sh /www/wwwroot/adminnet/tp3.sh 每天晚上23点执行一次
# * * * * * /bin/sh /www/wwwroot/adminnet/tp3.sh 每一分钟执行一次
php /www/wwwroot/adminnet/mycli.php Mycli/Index
