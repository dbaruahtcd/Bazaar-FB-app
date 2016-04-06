drop table if exists bazaar.user_info;

create table bazaar.user_info(
email character varying(50) NOT NULL,
userid serial not null,
password character varying(256),
salt character varying(100),
dtm_created timestamp default current_timestamp)
