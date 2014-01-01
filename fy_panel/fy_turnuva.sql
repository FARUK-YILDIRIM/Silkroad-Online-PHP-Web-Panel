USE SRO_VT_ACCOUNT
CREATE TABLE fy_turnuva(
id int IDENTITY(1,1) PRIMARY KEY,
kod varchar(200) NULL,
durum int,
username varchar(200),
tarih varchar(200),
)