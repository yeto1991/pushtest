create table jmesse.jm_fair_cnt( 
  category_kbn char (1) not null
  , kind_kbn char (1) not null
  , venue_kbn char (1) not null
  , fair_cnt int not null
  , primary key (category_kbn, kind_kbn, venue_kbn)
) engine = innodb

