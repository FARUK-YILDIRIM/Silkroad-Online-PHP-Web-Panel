USE SRO_VT_ACCOUNT
CREATE TABLE fy_blog(
id int IDENTITY(1,1) PRIMARY KEY,
baslik text,
icerik text,
icerikfull text,
resim  text,
tarih varchar(50)	
)

insert into fy_blog(baslik,icerik,icerikfull,resim,tarih) values ('Deneme','deneme içerik','deneme içerik full ','images/test.png','Sunday 18th of January 2015 08:57:48 PM')

select * from fy_blog