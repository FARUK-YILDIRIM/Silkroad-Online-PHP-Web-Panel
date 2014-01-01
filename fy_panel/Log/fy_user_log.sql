USE SRO_VT_LOG
CREATE TABLE fy_user_log(
id int IDENTITY(1,1) PRIMARY KEY,
username varchar(200) NULL,
tarih varchar(200) NULL,
location varchar(200) NULL,
ip  varchar(200) NULL,
)

select * from fy_user_log