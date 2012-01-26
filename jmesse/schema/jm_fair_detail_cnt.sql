create table jmesse.jm_fair_detail_cnt( 
  i_kbn_1 varchar (3) not null
  , i_kbn_2 varchar (3) not null
  , i_kbn_3 varchar (3) not null
  , i_kbn_4 varchar (3) not null
  , v_kbn_1 varchar (3) not null
  , v_kbn_2 varchar (3) not null
  , v_kbn_3 varchar (3) not null
  , v_kbn_4 varchar (3) not null
  , venue_kbn char (1)
  , site_kbn char (1) not null
  , fair_cnt int not null
  , primary key ( 
    i_kbn_1
    , i_kbn_2
    , i_kbn_3
    , i_kbn_4
    , v_kbn_1
    , v_kbn_2
    , v_kbn_3
    , v_kbn_4
    , site_kbn
  )
) engine = innodb

