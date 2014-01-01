USE SRO_VT_LOG
CREATE TABLE fy_markets_log(
id int IDENTITY(1,1) PRIMARY KEY,
tarih varchar(200) NULL,
username varchar(200) NULL,
oyuncu varchar(200) NULL,
item  varchar(250) NULL,
)

select * from fy_markets_log