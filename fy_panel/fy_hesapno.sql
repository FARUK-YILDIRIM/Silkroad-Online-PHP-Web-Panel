USE SRO_VT_ACCOUNT
CREATE TABLE fy_hesapno(
id int IDENTITY(1,1)PRIMARY KEY NOT NULL,
hesapSahibi varchar(255) NOT NULL,
subeNo varchar(50) NOT NULL,
hesapNo varchar(255) NOT NULL,
IBAN varchar(255) NOT NULL,
bankaAdi varchar(50) NOT NULL,
bankaLogo text,
)

INSERT INTO fy_hesapno(hesapSahibi,subeNo,hesapNo,IBAN,bankaAdi) VALUES ('asdasd','34','3244512235','43594369','oçziraat')

select * from fy_hesapno

