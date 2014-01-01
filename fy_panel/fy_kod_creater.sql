/* coder Faruk YILDIRIM ;) */

DECLARE @counter smallint;
DECLARE @kodcreater varchar(64);
SET @counter = 0;
WHILE @counter < 3 -- buraya yaz o sayýyý f5 e bas o zaman
   BEGIN
      --SELECT RAND() Random_Number
	  SET @kodcreater = SUBSTRING(CONVERT(varchar(55), NEWID()),0,19);
	  INSERT INTO fy_turnuva(kod,durum) VALUES (@kodcreater,1)
      SET @counter = @counter + 1
   END;
GO

SELECT * FROM fy_turnuva ORDER BY id DESC


