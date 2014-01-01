USE SRO_VT_ACCOUNT
CREATE TABLE fy_markets(
id int IDENTITY(1,1) PRIMARY KEY,
item_adi varchar(200) NULL,
item_kodu  varchar(200) NULL,
arti_miktari int,
pot_sc_miktari int,
silk int,
tl int,
resim  text,
)

select * from fy_markets