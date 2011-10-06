create table jmesse.jm_log( 
  log_id int not null
  , user_id varchar (16) not null
  , ope_kbn char (1) not null
  , info_kbn char (1) not null
  , remarks text(1000)
  , reg_date datetime
) engine = innodb

