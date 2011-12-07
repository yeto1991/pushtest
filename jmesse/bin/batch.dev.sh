#!/bin/bash

# SHELL変数
PHP_HOME=/usr/local/php
MYSQL_HOME=/opt/mysql
JMESSE_HOME=/home/j-messe/app/jmesse
DB_SERVER=localhost
DB_BACKUP_PATH=/home/j-messe/db_backup

# Batch開始時刻
echo -n バッチ 開始 :
date

# 見本市件数テーブルデータ集計バッチ
$MYSQL_HOME/bin/mysql -ujmesse -pidsjmesse -h$DB_SERVER jmesse < $JMESSE_HOME/bin/summaryCountForFairCntTable.sql
echo $?
echo -n 見本市件数テーブルデータ集計バッチ 終了 :
date

# 地域毎件数生成バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonRegion.php
echo $?
echo -n 地域毎件数生成バッチ 終了 :
date

# 業種毎件数生成バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonIndustory.php
echo $?
echo -n 業種毎件数生成バッチ 終了 :
date

# 月間アクセスランキング情報生成バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonMonthlyRanking.php
echo $?
echo -n 月間アクセスランキング情報生成バッチ 終了 :
date

# 新着見本市情報生成バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonNewMihonichi.php
echo $?
echo -n 新着見本市情報生成バッチ 終了 :
date

# エラーメール情報取得バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getErrMail.php
echo $?
echo -n エラーメール情報取得バッチ 終了 :
date

# DBバックアップ
##################################################

# 最古を削除
rm -f $DB_BACKUP_PATH/jmesse_backup_008.dmp.gz

# ローテーション
cd $DB_BACKUP_PATH
mv jmesse_backup_007.dmp.gz jmesse_backup_008.dmp.gz
mv jmesse_backup_006.dmp.gz jmesse_backup_007.dmp.gz
mv jmesse_backup_005.dmp.gz jmesse_backup_006.dmp.gz
mv jmesse_backup_004.dmp.gz jmesse_backup_005.dmp.gz
mv jmesse_backup_003.dmp.gz jmesse_backup_004.dmp.gz
mv jmesse_backup_002.dmp.gz jmesse_backup_003.dmp.gz
mv jmesse_backup_001.dmp.gz jmesse_backup_002.dmp.gz

# ダンプ
$MYSQL_HOME/bin/mysqldump -ujmesse -pidsjmesse -h$DB_SERVER jmesse > $DB_BACKUP_PATH/jmesse_backup_001.dmp
echo $?
echo -n ダンプ 終了 :
date

# 圧縮
gzip $DB_BACKUP_PATH/jmesse_backup_001.dmp
echo $?
echo -n 圧縮 終了 :
date

# Batch終了時刻
echo -n バッチ 終了 :
date

# EOF
