USE SRO_VT_ACCOUNT
CREATE TABLE fy_userpass(
id int IDENTITY(1,1) PRIMARY KEY,
username varchar(200) NULL,
pass  varchar(200) NULL,
)

INSERT INTO fy_userpass VALUES ('test','testpass')

select * from fy_userpass