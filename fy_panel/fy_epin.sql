USE SRO_VT_ACCOUNT
CREATE TABLE fy_epin(
id int IDENTITY(1,1) PRIMARY KEY,
epin varchar(200) NULL,
sec  varchar(200) NULL,
silk int,
TL int,
durum int,
username varchar(200),
tarih varchar(200),
)

select * from fy_epin