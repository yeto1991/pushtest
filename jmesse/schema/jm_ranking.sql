create table jmesse.jm_ranking( 
  mihon_no int not null
  , ranking_yyyymm varchar (6) not null
  , access_cnt int not null
  , venue_kbn char (1) not null
  , index (mihon_no, ranking_yyyymm, venue_kbn)
) engine = innodb

