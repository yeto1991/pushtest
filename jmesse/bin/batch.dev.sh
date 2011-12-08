#!/bin/bash

# SHELL変数
PHP_HOME=/usr/local/php
MYSQL_HOME=/opt/mysql
JMESSE_HOME=/home/j-messe/app/jmesse
DB_SERVER=localhost
DB_BACKUP_PATH=/home/j-messe/db_backup

# Batch開始時刻
echo ▼▼▼ [`date`]【開始】バッチ

# 見本市件数テーブルデータ集計バッチ
echo ▼▼▼ [`date`]【開始】見本市件数テーブルデータ集計バッチ
$MYSQL_HOME/bin/mysql -ujmesse -pidsjmesse -h$DB_SERVER jmesse < $JMESSE_HOME/bin/summaryCountForFairCntTable.sql
echo $?
echo ▲▲▲ [`date`]【終了】見本市件数テーブルデータ集計バッチ

# 地域毎件数生成バッチ
echo ▼▼▼ [`date`]【開始】地域毎件数生成バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonRegion.php
echo $?
echo ▲▲▲ [`date`]【終了】地域毎件数生成バッチ

# 業種毎件数生成バッチ
echo ▼▼▼ [`date`]【開始】業種毎件数生成バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonIndustory.php
echo $?
echo ▲▲▲ [`date`]【終了】業種毎件数生成バッチ

# 月間アクセスランキング情報生成バッチ
echo ▼▼▼ [`date`]【開始】月間アクセスランキング情報生成バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonMonthlyRanking.php
echo $?
echo ▲▲▲ [`date`]【終了】月間アクセスランキング情報生成バッチ

# 新着見本市情報生成バッチ
echo ▼▼▼ [`date`]【開始】新着見本市情報生成バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getJsonNewMihonichi.php
echo $?
echo ▲▲▲ [`date`]【終了】新着見本市情報生成バッチ

# エラーメール情報取得バッチ
echo ▼▼▼ [`date`]【開始】エラーメール情報取得バッチ
$PHP_HOME/bin/php -f $JMESSE_HOME/bin/getErrMail.php
echo $?
echo ▲▲▲ [`date`]【終了】エラーメール情報取得バッチ

# DBバックアップ
##################################################

echo ▼▼▼ [`date`]【開始】DBバックアップ

# 最古を削除
echo ▼▼▼ [`date`]【開始】最古ダンプ削除
rm -f $DB_BACKUP_PATH/jmesse_backup_008.dmp.gz
echo $?
echo ▲▲▲ [`date`]【終了】最古ダンプ削除

# ローテーション
echo ▼▼▼ [`date`]【開始】ローテーション
cd $DB_BACKUP_PATH
echo $?
mv jmesse_backup_007.dmp.gz jmesse_backup_008.dmp.gz
echo $?
mv jmesse_backup_006.dmp.gz jmesse_backup_007.dmp.gz
echo $?
mv jmesse_backup_005.dmp.gz jmesse_backup_006.dmp.gz
echo $?
mv jmesse_backup_004.dmp.gz jmesse_backup_005.dmp.gz
echo $?
mv jmesse_backup_003.dmp.gz jmesse_backup_004.dmp.gz
echo $?
mv jmesse_backup_002.dmp.gz jmesse_backup_003.dmp.gz
echo $?
mv jmesse_backup_001.dmp.gz jmesse_backup_002.dmp.gz
echo $?
echo ▲▲▲ [`date`]【終了】ローテーション

# ダンプ
echo ▼▼▼ [`date`]【開始】ダンプ
$MYSQL_HOME/bin/mysqldump -ujmesse -pidsjmesse -h$DB_SERVER jmesse > $DB_BACKUP_PATH/jmesse_backup_001.dmp
echo $?
echo ▲▲▲ [`date`]【終了】ダンプ

# 圧縮
echo ▼▼▼ [`date`]【開始】圧縮
gzip $DB_BACKUP_PATH/jmesse_backup_001.dmp
echo $?
echo ▲▲▲ [`date`]【終了】圧縮

echo ▲▲▲ [`date`]【終了】DBバックアップ

# Batch終了時刻
echo ▲▲▲ [`date`]【終了】バッチ

# EOF
