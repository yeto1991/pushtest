@echo off
rem mysql -ujmesse -pidsjmesse -h192.168.0.229 jmesse < summaryCountForFairCntTable.sql
php -f getJsonIndustory.php
php -f getJsonMonthlyRanking.php
php -f getJsonNewMihonichi.php
php -f getJsonRegion.php
