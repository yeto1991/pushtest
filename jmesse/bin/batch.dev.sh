#!/bin/bash

PHP_HOME=/usr/local/php
MYSQL_HOME=/home/jmesse1112/opt/mysql
JMESSE_HOME=/home/jmesse1112/app/jmesse
DB_SERVER=10.11.100.103

# Batch開始時刻
echo -n Batch Start :
date

$MYSQL_HOME/bin/mysql -ujmesse -pidsjmesse -h$DB_SERVER jmesse < $JMESSE_HOME/bin/summaryCountForFairCntTable.sql
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonRegion.php
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonIndustory.php
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonMonthlyRanking.php
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonNewMihonichi.php
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getErrMail.php

# Batch終了時刻
echo -n Batch Finish :
date

# OEF
