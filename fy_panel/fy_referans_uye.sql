USE [SRO_VT_ACCOUNT]
GO

/****** Object:  Table [dbo].[fy_referans_uye]    Script Date: 13.01.2016 05:50:53 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[fy_referans_uye](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[referans_uye] [varchar](50) NOT NULL,
	[yeni_uye] [varchar](50) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO


