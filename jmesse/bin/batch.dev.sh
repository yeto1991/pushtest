#!/bin/bash
PHP_HOME=/usr/local/php
MYSQL_HOME=/opt/mysql
JMESSE_HOME=/home/j-messe/app/jmesse
DB_SERVER=localhost

# Batch開始時刻
echo -n Batch Start :
date
$MYSQL_HOME/bin/mysql -ujmesse -pidsjmesse -h$DB_SERVER jmesse < $JMESSE_HOME/bin/summaryCountForFairCntTable.sql
echo -n Step.01 Finish :
date
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonRegion.php
echo -n Step.02 Finish :
date
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonIndustory.php
echo -n Step.03 Finish :
date
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonMonthlyRanking.php
echo -n Step.04 Finish :
date
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonNewMihonichi.php
echo -n Step.05 Finish :
date
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getErrMail.php
# Batch終了時刻
echo -n Batch Finish :
date

# OEF
