USE [master]
GO
/* For security reasons the login is created disabled and with a random password. */
/****** Object:  Login [##MS_PolicyEventProcessingLogin##]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [##MS_PolicyEventProcessingLogin##] WITH PASSWORD=N'3ET4ZkbyNl4XiKf33WlI6I9YtnkXje8/WT48sVdazKo=', DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english], CHECK_EXPIRATION=OFF, CHECK_POLICY=ON
GO
ALTER LOGIN [##MS_PolicyEventProcessingLogin##] DISABLE
GO
/* For security reasons the login is created disabled and with a random password. */
/****** Object:  Login [##MS_PolicyTsqlExecutionLogin##]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [##MS_PolicyTsqlExecutionLogin##] WITH PASSWORD=N'4KbcOfy79+3gFobtI1gzze68xwTMQ9RQV+1i6Y/RI2g=', DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english], CHECK_EXPIRATION=OFF, CHECK_POLICY=ON
GO
ALTER LOGIN [##MS_PolicyTsqlExecutionLogin##] DISABLE
GO
/****** Object:  Login [BUILTIN\Users]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [BUILTIN\Users] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english]
GO
/* For security reasons the login is created disabled and with a random password. */
/****** Object:  Login [director]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [director] WITH PASSWORD=N'+baqKtSRzbtkMFEVI2jnQaBKei9GL+f/WhmzyKItlAE=', DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english], CHECK_EXPIRATION=OFF, CHECK_POLICY=OFF
GO
ALTER LOGIN [director] DISABLE
GO
/****** Object:  Login [LAPTOP-OR388G0G\darja]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [LAPTOP-OR388G0G\darja] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english]
GO
/* For security reasons the login is created disabled and with a random password. */
/****** Object:  Login [manager]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [manager] WITH PASSWORD=N'RezNuqHS0XAuHvxsBWezC8m7DtYLHHfugSgBZ6HQTmE=', DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english], CHECK_EXPIRATION=OFF, CHECK_POLICY=OFF
GO
ALTER LOGIN [manager] DISABLE
GO
/****** Object:  Login [NT AUTHORITY\SYSTEM]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [NT AUTHORITY\SYSTEM] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english]
GO
/****** Object:  Login [NT Service\MSSQL$SQLEXPRESS]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [NT Service\MSSQL$SQLEXPRESS] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english]
GO
/****** Object:  Login [NT SERVICE\SQLTELEMETRY$SQLEXPRESS]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [NT SERVICE\SQLTELEMETRY$SQLEXPRESS] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english]
GO
/****** Object:  Login [NT SERVICE\SQLWriter]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [NT SERVICE\SQLWriter] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english]
GO
/****** Object:  Login [NT SERVICE\Winmgmt]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [NT SERVICE\Winmgmt] FROM WINDOWS WITH DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english]
GO
/* For security reasons the login is created disabled and with a random password. */
/****** Object:  Login [salesman]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE LOGIN [salesman] WITH PASSWORD=N'2zOjJbxMZuz3R3Bn11P1VPg1bOM00mK8CFJRYfH/Ytk=', DEFAULT_DATABASE=[master], DEFAULT_LANGUAGE=[us_english], CHECK_EXPIRATION=OFF, CHECK_POLICY=OFF
GO
ALTER LOGIN [salesman] DISABLE
GO
ALTER SERVER ROLE [sysadmin] ADD MEMBER [LAPTOP-OR388G0G\darja]
GO
ALTER SERVER ROLE [sysadmin] ADD MEMBER [NT Service\MSSQL$SQLEXPRESS]
GO
ALTER SERVER ROLE [sysadmin] ADD MEMBER [NT SERVICE\SQLWriter]
GO
ALTER SERVER ROLE [sysadmin] ADD MEMBER [NT SERVICE\Winmgmt]
GO
USE [AutoRent]
GO
/****** Object:  User [director]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE USER [director] FOR LOGIN [director] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [manager]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE USER [manager] FOR LOGIN [manager] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [salesman]    Script Date: 5/21/2024 10:31:27 PM ******/
CREATE USER [salesman] FOR LOGIN [salesman] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_ddladmin] ADD MEMBER [director]
GO
/****** Object:  Table [dbo].[Agreement]    Script Date: 5/21/2024 10:31:27 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Agreement](
	[id_agreement] [int] NOT NULL,
	[date_] [date] NOT NULL,
	[id_employee] [int] NOT NULL,
	[id_client] [int] NOT NULL,
	[id_car_number] [char](7) NOT NULL,
	[time_] [real] NOT NULL,
	[distance] [int] NOT NULL,
	[id_condition] [int] NOT NULL,
	[price] [real] NOT NULL,
 CONSTRAINT [Agreement_pk] PRIMARY KEY CLUSTERED 
(
	[id_agreement] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Agreement] TO  SCHEMA OWNER 
GO
GRANT ALTER ON [dbo].[Agreement] TO [director] AS [dbo]
GO
GRANT DELETE ON [dbo].[Agreement] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Agreement] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Agreement] TO [director] AS [dbo]
GO
GRANT TAKE OWNERSHIP ON [dbo].[Agreement] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Agreement] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Agreement] TO [manager] AS [dbo]
GO
GRANT SELECT ON [dbo].[Agreement] TO [manager] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Agreement] TO [manager] AS [dbo]
GO
GRANT INSERT ON [dbo].[Agreement] TO [salesman] AS [dbo]
GO
GRANT SELECT ON [dbo].[Agreement] TO [salesman] AS [dbo]
GO
/****** Object:  Table [dbo].[Car]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Car](
	[id_car_number] [char](7) NOT NULL,
	[id_model] [int] NOT NULL,
	[id_car_make] [int] NOT NULL,
	[id_car_type] [int] NOT NULL,
	[id_car_class] [int] NOT NULL,
	[car_year] [int] NOT NULL,
 CONSTRAINT [Car_pk] PRIMARY KEY CLUSTERED 
(
	[id_car_number] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Car] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Car] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Car] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Car] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Car] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Car] TO [manager] AS [dbo]
GO
GRANT SELECT ON [dbo].[Car] TO [manager] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Car] TO [manager] AS [dbo]
GO
GRANT SELECT ON [dbo].[Car] TO [salesman] AS [dbo]
GO
/****** Object:  Table [dbo].[Car_class]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Car_class](
	[id_car_class] [int] NOT NULL,
	[class] [varchar](50) NOT NULL,
	[cost_min] [real] NOT NULL,
 CONSTRAINT [Car_class_pk] PRIMARY KEY CLUSTERED 
(
	[id_car_class] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Car_class] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Car_class] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Car_class] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Car_class] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Car_class] TO [director] AS [dbo]
GO
/****** Object:  Table [dbo].[Car_make]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Car_make](
	[id_car_make] [int] NOT NULL,
	[make] [varchar](50) NOT NULL,
 CONSTRAINT [Car_make_pk] PRIMARY KEY CLUSTERED 
(
	[id_car_make] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Car_make] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Car_make] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Car_make] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Car_make] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Car_make] TO [director] AS [dbo]
GO
/****** Object:  Table [dbo].[Car_model]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Car_model](
	[id_model] [int] NOT NULL,
	[model] [varchar](50) NOT NULL,
 CONSTRAINT [Car_model_pk] PRIMARY KEY CLUSTERED 
(
	[id_model] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Car_model] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Car_model] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Car_model] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Car_model] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Car_model] TO [director] AS [dbo]
GO
/****** Object:  Table [dbo].[Car_type]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Car_type](
	[id_car_type] [int] NOT NULL,
	[car_type] [varchar](50) NOT NULL,
	[cost_km] [real] NOT NULL,
 CONSTRAINT [Car_type_pk] PRIMARY KEY CLUSTERED 
(
	[id_car_type] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Car_type] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Car_type] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Car_type] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Car_type] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Car_type] TO [director] AS [dbo]
GO
/****** Object:  Table [dbo].[Client]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Client](
	[id_client] [int] NOT NULL,
	[first_name] [varchar](50) NOT NULL,
	[last_name] [varchar](50) NOT NULL,
	[telefon] [int] NOT NULL,
	[drivers_license] [varchar](50) NOT NULL,
	[client_address] [varchar](50) NOT NULL,
	[email] [varchar](50) NOT NULL,
 CONSTRAINT [Client_pk] PRIMARY KEY CLUSTERED 
(
	[id_client] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Client] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Client] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Client] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Client] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Client] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Client] TO [manager] AS [dbo]
GO
GRANT SELECT ON [dbo].[Client] TO [manager] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Client] TO [manager] AS [dbo]
GO
GRANT INSERT ON [dbo].[Client] TO [salesman] AS [dbo]
GO
GRANT SELECT ON [dbo].[Client] TO [salesman] AS [dbo]
GO
/****** Object:  Table [dbo].[Condition]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Condition](
	[id_condition] [int] NOT NULL,
	[condition] [text] NOT NULL,
 CONSTRAINT [Condition_pk] PRIMARY KEY CLUSTERED 
(
	[id_condition] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Condition] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Condition] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Condition] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Condition] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Condition] TO [director] AS [dbo]
GO
/****** Object:  Table [dbo].[Employee]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Employee](
	[id_employee] [int] NOT NULL,
	[first_name] [varchar](50) NOT NULL,
	[last_name] [varchar](50) NOT NULL,
	[id_job_title] [int] NOT NULL,
 CONSTRAINT [Employee_pk] PRIMARY KEY CLUSTERED 
(
	[id_employee] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Employee] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Employee] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Employee] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Employee] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Employee] TO [director] AS [dbo]
GO
/****** Object:  Table [dbo].[Job_title]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Job_title](
	[id_job_title] [int] NOT NULL,
	[job_title] [varchar](50) NOT NULL,
 CONSTRAINT [Job_titles_pk] PRIMARY KEY CLUSTERED 
(
	[id_job_title] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[Job_title] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[Job_title] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[Job_title] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[Job_title] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[Job_title] TO [director] AS [dbo]
GO
/****** Object:  Table [dbo].[logi]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[logi](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[log_date] [datetime] NULL,
	[userName] [varchar](100) NULL,
	[operation] [varchar](100) NULL,
	[additionalData] [text] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
ALTER AUTHORIZATION ON [dbo].[logi] TO  SCHEMA OWNER 
GO
GRANT DELETE ON [dbo].[logi] TO [director] AS [dbo]
GO
GRANT INSERT ON [dbo].[logi] TO [director] AS [dbo]
GO
GRANT SELECT ON [dbo].[logi] TO [director] AS [dbo]
GO
GRANT UPDATE ON [dbo].[logi] TO [director] AS [dbo]
GO
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (1, CAST(N'2023-05-01' AS Date), 1, 1, N'XYZ1234', 1.5, 20, 1, 17)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (2, CAST(N'2023-05-02' AS Date), 2, 2, N'XYZ5678', 2, 30, 2, 28)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (3, CAST(N'2023-05-03' AS Date), 3, 3, N'ABC1234', 4, 45, 1, 69)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (4, CAST(N'2023-05-04' AS Date), 4, 4, N'ABC5678', 24, 55, 1, 488.25)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (5, CAST(N'2023-05-05' AS Date), 1, 1, N'DEF1234', 1.5, 20, 1, 48.4)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (6, CAST(N'2023-05-06' AS Date), 2, 2, N'DEF5678', 2, 30, 1, 57.5)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (7, CAST(N'2023-05-07' AS Date), 3, 3, N'GHI1234', 4, 45, 1, 173.5)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (8, CAST(N'2023-05-08' AS Date), 4, 4, N'XYZ5678', 24, 55, 1, 305.5)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (9, CAST(N'2023-05-09' AS Date), 1, 1, N'GHI5678', 1.5, 20, 1, 77)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (10, CAST(N'2023-05-10' AS Date), 2, 2, N'XYZ1234', 2, 30, 1, 23)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (11, CAST(N'2023-05-11' AS Date), 1, 1, N'XYZ1234', 1.5, 20, 1, 100)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (12, CAST(N'2023-05-12' AS Date), 1, 1, N'XYZ1234', 2, 30, 2, 300)
INSERT [dbo].[Agreement] ([id_agreement], [date_], [id_employee], [id_client], [id_car_number], [time_], [distance], [id_condition], [price]) VALUES (13, CAST(N'2024-05-05' AS Date), 4, 12, N'ABC1234', 24, 1000, 1, 1000)
GO
INSERT [dbo].[Car] ([id_car_number], [id_model], [id_car_make], [id_car_type], [id_car_class], [car_year]) VALUES (N'ABC1234', 3, 3, 2, 3, 2021)
INSERT [dbo].[Car] ([id_car_number], [id_model], [id_car_make], [id_car_type], [id_car_class], [car_year]) VALUES (N'ABC5678', 4, 4, 3, 4, 2020)
INSERT [dbo].[Car] ([id_car_number], [id_model], [id_car_make], [id_car_type], [id_car_class], [car_year]) VALUES (N'DEF1234', 5, 5, 4, 5, 2016)
INSERT [dbo].[Car] ([id_car_number], [id_model], [id_car_make], [id_car_type], [id_car_class], [car_year]) VALUES (N'DEF5678', 6, 6, 5, 6, 2021)
INSERT [dbo].[Car] ([id_car_number], [id_model], [id_car_make], [id_car_type], [id_car_class], [car_year]) VALUES (N'GHI1234', 7, 7, 6, 7, 2015)
INSERT [dbo].[Car] ([id_car_number], [id_model], [id_car_make], [id_car_type], [id_car_class], [car_year]) VALUES (N'GHI5678', 8, 8, 1, 8, 2022)
INSERT [dbo].[Car] ([id_car_number], [id_model], [id_car_make], [id_car_type], [id_car_class], [car_year]) VALUES (N'XYZ1234', 1, 1, 1, 1, 2018)
INSERT [dbo].[Car] ([id_car_number], [id_model], [id_car_make], [id_car_type], [id_car_class], [car_year]) VALUES (N'XYZ5678', 2, 2, 1, 2, 2019)
GO
INSERT [dbo].[Car_class] ([id_car_class], [class], [cost_min]) VALUES (1, N'Economy', 10)
INSERT [dbo].[Car_class] ([id_car_class], [class], [cost_min]) VALUES (2, N'Compact', 12.5)
INSERT [dbo].[Car_class] ([id_car_class], [class], [cost_min]) VALUES (3, N'Standard', 15)
INSERT [dbo].[Car_class] ([id_car_class], [class], [cost_min]) VALUES (4, N'Full Size', 20)
INSERT [dbo].[Car_class] ([id_car_class], [class], [cost_min]) VALUES (5, N'Luxury', 30)
INSERT [dbo].[Car_class] ([id_car_class], [class], [cost_min]) VALUES (6, N'SUV', 25)
INSERT [dbo].[Car_class] ([id_car_class], [class], [cost_min]) VALUES (7, N'Convertible', 40)
INSERT [dbo].[Car_class] ([id_car_class], [class], [cost_min]) VALUES (8, N'VIP', 50)
GO
INSERT [dbo].[Car_make] ([id_car_make], [make]) VALUES (1, N'Toyota')
INSERT [dbo].[Car_make] ([id_car_make], [make]) VALUES (2, N'Ford')
INSERT [dbo].[Car_make] ([id_car_make], [make]) VALUES (3, N'Chevrolet')
INSERT [dbo].[Car_make] ([id_car_make], [make]) VALUES (4, N'Honda')
INSERT [dbo].[Car_make] ([id_car_make], [make]) VALUES (5, N'Hyundai')
INSERT [dbo].[Car_make] ([id_car_make], [make]) VALUES (6, N'Nissan')
INSERT [dbo].[Car_make] ([id_car_make], [make]) VALUES (7, N'Volkswagen')
INSERT [dbo].[Car_make] ([id_car_make], [make]) VALUES (8, N'BMW')
GO
INSERT [dbo].[Car_model] ([id_model], [model]) VALUES (1, N'Camry')
INSERT [dbo].[Car_model] ([id_model], [model]) VALUES (2, N'Fusion')
INSERT [dbo].[Car_model] ([id_model], [model]) VALUES (3, N'Impala')
INSERT [dbo].[Car_model] ([id_model], [model]) VALUES (4, N'Civic')
INSERT [dbo].[Car_model] ([id_model], [model]) VALUES (5, N'Sonata')
INSERT [dbo].[Car_model] ([id_model], [model]) VALUES (6, N'Altima')
INSERT [dbo].[Car_model] ([id_model], [model]) VALUES (7, N'Golf')
INSERT [dbo].[Car_model] ([id_model], [model]) VALUES (8, N'3 Series')
GO
INSERT [dbo].[Car_type] ([id_car_type], [car_type], [cost_km]) VALUES (1, N'Sedan', 0.1)
INSERT [dbo].[Car_type] ([id_car_type], [car_type], [cost_km]) VALUES (2, N'Coupe', 0.2)
INSERT [dbo].[Car_type] ([id_car_type], [car_type], [cost_km]) VALUES (3, N'Hatchback', 0.15)
INSERT [dbo].[Car_type] ([id_car_type], [car_type], [cost_km]) VALUES (4, N'Station Wagon', 0.17)
INSERT [dbo].[Car_type] ([id_car_type], [car_type], [cost_km]) VALUES (5, N'SUV', 0.25)
INSERT [dbo].[Car_type] ([id_car_type], [car_type], [cost_km]) VALUES (6, N'Convertible', 0.3)
GO
INSERT [dbo].[Client] ([id_client], [first_name], [last_name], [telefon], [drivers_license], [client_address], [email]) VALUES (1, N'John', N'Doe', 5555553, N'D1234567', N'123 Elm St', N'john.doe@example.com')
INSERT [dbo].[Client] ([id_client], [first_name], [last_name], [telefon], [drivers_license], [client_address], [email]) VALUES (2, N'Jane', N'Smith', 67457657, N'S2345678', N'234 Oak St', N'jane.smith@example.com')
INSERT [dbo].[Client] ([id_client], [first_name], [last_name], [telefon], [drivers_license], [client_address], [email]) VALUES (3, N'Jim', N'Brown', 2366454, N'B3456789', N'345 Pine St', N'jim.brown@example.com')
INSERT [dbo].[Client] ([id_client], [first_name], [last_name], [telefon], [drivers_license], [client_address], [email]) VALUES (4, N'Jessica', N'Jones', 34657465, N'J4567890', N'456 Maple St', N'jessica.jones@example.com')
INSERT [dbo].[Client] ([id_client], [first_name], [last_name], [telefon], [drivers_license], [client_address], [email]) VALUES (5, N'Emily', N'Clark', 1234567890, N'C123456', N'789 Birch St', N'emily.clark@newemail.com')
INSERT [dbo].[Client] ([id_client], [first_name], [last_name], [telefon], [drivers_license], [client_address], [email]) VALUES (6, N'Emily', N'Clark', 1234567890, N'C123456', N'789 Birch St', N'emily.clark@example.com')
INSERT [dbo].[Client] ([id_client], [first_name], [last_name], [telefon], [drivers_license], [client_address], [email]) VALUES (12, N'Niki', N'Lep', 5557555, N'A2Y74289', N'NY, Bulvar st 3', N'niki.lep@example.com')
GO
INSERT [dbo].[Condition] ([id_condition], [condition]) VALUES (1, N'5/5')
INSERT [dbo].[Condition] ([id_condition], [condition]) VALUES (2, N'4/5')
INSERT [dbo].[Condition] ([id_condition], [condition]) VALUES (3, N'0/5')
INSERT [dbo].[Condition] ([id_condition], [condition]) VALUES (4, N'3/5')
INSERT [dbo].[Condition] ([id_condition], [condition]) VALUES (5, N'2/5')
INSERT [dbo].[Condition] ([id_condition], [condition]) VALUES (6, N'1/5')
GO
INSERT [dbo].[Employee] ([id_employee], [first_name], [last_name], [id_job_title]) VALUES (1, N'Alice', N'Wong', 1)
INSERT [dbo].[Employee] ([id_employee], [first_name], [last_name], [id_job_title]) VALUES (2, N'Bob', N'Johnson', 2)
INSERT [dbo].[Employee] ([id_employee], [first_name], [last_name], [id_job_title]) VALUES (3, N'Carlos', N'Lopez', 3)
INSERT [dbo].[Employee] ([id_employee], [first_name], [last_name], [id_job_title]) VALUES (4, N'Diana', N'Garcia', 4)
GO
INSERT [dbo].[Job_title] ([id_job_title], [job_title]) VALUES (1, N'Sales Associate')
INSERT [dbo].[Job_title] ([id_job_title], [job_title]) VALUES (2, N'Mechanic')
INSERT [dbo].[Job_title] ([id_job_title], [job_title]) VALUES (3, N'Manager')
INSERT [dbo].[Job_title] ([id_job_title], [job_title]) VALUES (4, N'director')
GO
SET IDENTITY_INSERT [dbo].[logi] ON 

INSERT [dbo].[logi] ([id], [log_date], [userName], [operation], [additionalData]) VALUES (1, CAST(N'2024-05-21T19:39:47.583' AS DateTime), N'manager', N'Car UPDATE', N'Updated: id_car_number=ABC1234, id_model=3, id_car_make=3, id_car_type=2, id_car_class=3, car_year=2021Old data: ABC123433232021')
INSERT [dbo].[logi] ([id], [log_date], [userName], [operation], [additionalData]) VALUES (2, CAST(N'2024-05-21T19:44:45.993' AS DateTime), N'salesman', N'Client INSERT', N'id_client=12, first_name=Niki, last_name=Lep, telefon=5557555, drivers_license=A2Y74289, client_address=NY, Bulvar st 3, email=niki.lep@example.com')
INSERT [dbo].[logi] ([id], [log_date], [userName], [operation], [additionalData]) VALUES (3, CAST(N'2024-05-21T19:56:51.243' AS DateTime), N'manager', N'Car UPDATE', N'Updated: id_car_number=ABC1234, id_model=3, id_car_make=3, id_car_type=2, id_car_class=3, car_year=2021Old data: ABC123433232021')
INSERT [dbo].[logi] ([id], [log_date], [userName], [operation], [additionalData]) VALUES (4, CAST(N'2024-05-21T19:57:35.280' AS DateTime), N'manager', N'Car INSERT', N'id_car_number=ABC1434, id_model=1, id_car_make=1, id_car_type=1, id_car_class=1, car_year=2020')
INSERT [dbo].[logi] ([id], [log_date], [userName], [operation], [additionalData]) VALUES (5, CAST(N'2024-05-21T19:59:50.920' AS DateTime), N'director', N'Car DELETE', N'id_car_number=ABC1434, id_model=1, id_car_make=1, id_car_type=1, id_car_class=1, car_year=2020')
INSERT [dbo].[logi] ([id], [log_date], [userName], [operation], [additionalData]) VALUES (6, CAST(N'2024-05-21T20:20:52.540' AS DateTime), N'salesman', N'Agreement INSERT', N'id_agreement=13, date_=2024-05-05, id_employee=4, id_client=12, id_car_number=ABC1234, time_=24, distance=1000, id_condition=1, price=1000')
SET IDENTITY_INSERT [dbo].[logi] OFF
GO
ALTER TABLE [dbo].[Agreement]  WITH CHECK ADD  CONSTRAINT [Agreement_Car] FOREIGN KEY([id_car_number])
REFERENCES [dbo].[Car] ([id_car_number])
GO
ALTER TABLE [dbo].[Agreement] CHECK CONSTRAINT [Agreement_Car]
GO
ALTER TABLE [dbo].[Agreement]  WITH CHECK ADD  CONSTRAINT [Agreement_Client] FOREIGN KEY([id_client])
REFERENCES [dbo].[Client] ([id_client])
GO
ALTER TABLE [dbo].[Agreement] CHECK CONSTRAINT [Agreement_Client]
GO
ALTER TABLE [dbo].[Agreement]  WITH CHECK ADD  CONSTRAINT [Agreement_Condition] FOREIGN KEY([id_condition])
REFERENCES [dbo].[Condition] ([id_condition])
GO
ALTER TABLE [dbo].[Agreement] CHECK CONSTRAINT [Agreement_Condition]
GO
ALTER TABLE [dbo].[Agreement]  WITH CHECK ADD  CONSTRAINT [Agreement_Employee] FOREIGN KEY([id_employee])
REFERENCES [dbo].[Employee] ([id_employee])
GO
ALTER TABLE [dbo].[Agreement] CHECK CONSTRAINT [Agreement_Employee]
GO
ALTER TABLE [dbo].[Car]  WITH CHECK ADD  CONSTRAINT [Car_Car_class] FOREIGN KEY([id_car_class])
REFERENCES [dbo].[Car_class] ([id_car_class])
GO
ALTER TABLE [dbo].[Car] CHECK CONSTRAINT [Car_Car_class]
GO
ALTER TABLE [dbo].[Car]  WITH CHECK ADD  CONSTRAINT [Car_Car_make] FOREIGN KEY([id_car_make])
REFERENCES [dbo].[Car_make] ([id_car_make])
GO
ALTER TABLE [dbo].[Car] CHECK CONSTRAINT [Car_Car_make]
GO
ALTER TABLE [dbo].[Car]  WITH CHECK ADD  CONSTRAINT [Car_Car_model] FOREIGN KEY([id_model])
REFERENCES [dbo].[Car_model] ([id_model])
GO
ALTER TABLE [dbo].[Car] CHECK CONSTRAINT [Car_Car_model]
GO
ALTER TABLE [dbo].[Car]  WITH CHECK ADD  CONSTRAINT [Car_Car_type] FOREIGN KEY([id_car_type])
REFERENCES [dbo].[Car_type] ([id_car_type])
GO
ALTER TABLE [dbo].[Car] CHECK CONSTRAINT [Car_Car_type]
GO
ALTER TABLE [dbo].[Employee]  WITH CHECK ADD  CONSTRAINT [Employee_Job_title] FOREIGN KEY([id_job_title])
REFERENCES [dbo].[Job_title] ([id_job_title])
GO
ALTER TABLE [dbo].[Employee] CHECK CONSTRAINT [Employee_Job_title]
GO
/****** Object:  Trigger [dbo].[Agreement_Delete]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Agreement_Delete]
ON [dbo].[Agreement]
AFTER DELETE
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
		GETDATE(),
        USER, 
        'Agreement DELETE', 
        CONCAT('id_agreement=', d.id_agreement, ', date_=', d.date_, 
               ', id_employee=', d.id_employee, ', id_client=', d.id_client, 
               ', id_car_number=', d.id_car_number, ', time_=', d.time_, 
               ', distance=', d.distance, ', id_condition=', d.id_condition, 
               ', price=', d.price)
    FROM deleted d;
END;
GO
ALTER TABLE [dbo].[Agreement] ENABLE TRIGGER [Agreement_Delete]
GO
/****** Object:  Trigger [dbo].[Agreement_Insert]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Agreement_Insert]
ON [dbo].[Agreement]
AFTER INSERT
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
        GETDATE(),
		USER, 
        'Agreement INSERT', 
        CONCAT('id_agreement=', i.id_agreement, ', date_=', i.date_, 
               ', id_employee=', i.id_employee, ', id_client=', i.id_client, 
               ', id_car_number=', i.id_car_number, ', time_=', i.time_, 
               ', distance=', i.distance, ', id_condition=', i.id_condition, 
               ', price=', i.price)
    FROM inserted i;
END;
GO
ALTER TABLE [dbo].[Agreement] ENABLE TRIGGER [Agreement_Insert]
GO
/****** Object:  Trigger [dbo].[Agreement_Update]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Agreement_Update]
ON [dbo].[Agreement]
AFTER UPDATE
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
        GETDATE(),
		USER, 
        'Agreement UPDATE', 
        CONCAT('New DATA: ', i.id_agreement, ', ', i.date_, 
               ', ', i.id_employee, ', ', i.id_client, 
               ', ', i.id_car_number, ', ', i.time_, 
               ', ', i.distance, ', ', i.id_condition, 
               ', ', i.price, '; Old DATA: ' , d.id_agreement, ', ', d.date_, 
               ', ', d.id_employee, ', ', d.id_client, 
               ', ', d.id_car_number, ', ', d.time_, 
               ', ', d.distance, ', ', d.id_condition, 
               ', ', d.price)
    FROM deleted d 
    INNER JOIN inserted i
    ON i.id_agreement = d.id_agreement;
END;
GO
ALTER TABLE [dbo].[Agreement] ENABLE TRIGGER [Agreement_Update]
GO
/****** Object:  Trigger [dbo].[Car_Delete]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Car_Delete]
ON [dbo].[Car]
AFTER DELETE
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
        GETDATE(),
		USER,
        'Car DELETE', 
        CONCAT('id_car_number=', d.id_car_number, ', id_model=', d.id_model, 
               ', id_car_make=', d.id_car_make, ', id_car_type=', d.id_car_type, 
               ', id_car_class=', d.id_car_class, ', car_year=', d.car_year)
    FROM deleted d;
END;
GO
ALTER TABLE [dbo].[Car] ENABLE TRIGGER [Car_Delete]
GO
/****** Object:  Trigger [dbo].[Car_Insert]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Car_Insert]
ON [dbo].[Car]
AFTER INSERT
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
		GETDATE(),
		USER,
        'Car INSERT', 
        CONCAT('id_car_number=', i.id_car_number, ', id_model=', i.id_model, 
               ', id_car_make=', i.id_car_make, ', id_car_type=', i.id_car_type, 
               ', id_car_class=', i.id_car_class, ', car_year=', i.car_year)
    FROM inserted i;
END;
GO
ALTER TABLE [dbo].[Car] ENABLE TRIGGER [Car_Insert]
GO
/****** Object:  Trigger [dbo].[Car_Update]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Car_Update]
ON [dbo].[Car]
AFTER UPDATE
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
        GETDATE(),
		USER,
        'Car UPDATE', 
        CONCAT('Updated: id_car_number=', i.id_car_number, ', id_model=', i.id_model, 
               ', id_car_make=', i.id_car_make, ', id_car_type=', i.id_car_type, 
               ', id_car_class=', i.id_car_class, ', car_year=', i.car_year, 'Old data: ',  i.id_car_number, i.id_model, 
               i.id_car_make, i.id_car_type, i.id_car_class, i.car_year)
    FROM deleted d 
    INNER JOIN inserted i
    ON i.id_car_number = d.id_car_number;
END;
GO
ALTER TABLE [dbo].[Car] ENABLE TRIGGER [Car_Update]
GO
/****** Object:  Trigger [dbo].[Client_Delete]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Client_Delete]
ON [dbo].[Client]
AFTER DELETE
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
        GETDATE(),
        USER, 
        'Client DELETE', 
        CONCAT('id_client=', d.id_client, ', first_name=', d.first_name, 
               ', last_name=', d.last_name, ', telefon=', d.telefon, 
               ', drivers_license=', d.drivers_license, ', client_address=', d.client_address, 
               ', email=', d.email)
    FROM deleted d;
END;
GO
ALTER TABLE [dbo].[Client] ENABLE TRIGGER [Client_Delete]
GO
/****** Object:  Trigger [dbo].[Client_Insert]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Client_Insert]
ON [dbo].[Client]
AFTER INSERT
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
        GETDATE(), 
		USER,
        'Client INSERT', 
        CONCAT('id_client=', i.id_client, ', first_name=', i.first_name, 
               ', last_name=', i.last_name, ', telefon=', i.telefon, 
               ', drivers_license=', i.drivers_license, ', client_address=', i.client_address, 
               ', email=', i.email)
    FROM inserted i;
END;
GO
ALTER TABLE [dbo].[Client] ENABLE TRIGGER [Client_Insert]
GO
/****** Object:  Trigger [dbo].[Client_Update]    Script Date: 5/21/2024 10:31:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[Client_Update]
ON [dbo].[Client]
AFTER UPDATE
AS
BEGIN
    INSERT INTO logi (log_date, userName, operation, additionalData)
    SELECT 
		GETDATE(),
        USER, 
        'Client UPDATE', 
        CONCAT('New DATA: ', i.id_client, ', ', i.first_name, 
               ', ', i.last_name, ', ', i.telefon, 
               ', ', i.drivers_license, ', ', i.client_address, 
               ', ', i.email, '; Old DATA: ', d.first_name, 
               ', ', d.last_name, ', ', d.telefon, 
               ', ', d.drivers_license, ', ', d.client_address, 
               ', ', d.email)
    FROM deleted d 
    INNER JOIN inserted i
    ON i.id_client = d.id_client;
END;
GO
ALTER TABLE [dbo].[Client] ENABLE TRIGGER [Client_Update]
GO
