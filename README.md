phpresque-email
===============

大批量邮件发送的处理方案
-------

基于php-resque开发，请先安装resque所需环境，并且把文件放到resque根目录

邮件发送任务可以通过多种方式以消息队列的形式存储到redis中。
常驻后台的多个守护进程，随时监控消息队列，并且完成邮件的发送。
可自定义进程数量
可自定义邮件发送优先级
可随时查询邮件的发送状态
如若发送失败，不会自动重发，需要自行处理。

终端运行(这里Cli方式,也可以选择其它运行方式.):  

1. 把邮件发送任务加入redis
   eg：
   php queue.php email "aaaaaaa@gmail.com" "hello" "how are you?"   
   email指任务类别
   
2. 启动处理进程
   QUEUE=email,email1,email2 COUNT=5 INTERVAL=5 php resque.php  
   QUEUE是任务的级别
   COUNT是处理进程数量
   INTERVAL是处理进程检查队列的时间间隔



