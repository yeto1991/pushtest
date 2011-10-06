create table jmesse.jm_user(
  user_id varchar (16) not null
  , password varchar (8) not null
  , company_nm varchar (255) not null
  , division_dept_nm varchar (255)
  , user_nm varchar (100) not null
  , gender_cd char (1) not null
  , email varchar (255) not null
  , post_code varchar (20)
  , address varchar (255) not null
  , tel varchar (20) not null
  , fax varchar (20)
  , url varchar (255)
  , secret_question_cd varchar (3) not null
  , secret_question_answer varchar (100) not null
  , use_language_cd char (1)
  , regist_result_notice_cd char (1)
  , auth_gen char (1)
  , auth_user char (1)
  , auth_fair char (1)
  , idpass_notice_cd char (1)
  , del_flg char (1)
  , del_date datetime
  , regist_user_id varchar (16)
  , regist_date datetime
  , update_user_id varchar (16)
  , update_date datetime
  , primary key (user_id)
) engine = innodb
