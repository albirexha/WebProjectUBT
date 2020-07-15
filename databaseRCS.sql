USE [master]
GO

/****** Object:  Database [rcsDB] ******/
CREATE DATABASE [rcsDB]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'rcsDB', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.SQLEXPRESS\MSSQL\DATA\rcsDB.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'rcsDB_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.SQLEXPRESS\MSSQL\DATA\rcsDB_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [rcsDB] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [rcsDB].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [rcsDB] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [rcsDB] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [rcsDB] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [rcsDB] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [rcsDB] SET ARITHABORT OFF 
GO
ALTER DATABASE [rcsDB] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [rcsDB] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [rcsDB] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [rcsDB] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [rcsDB] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [rcsDB] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [rcsDB] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [rcsDB] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [rcsDB] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [rcsDB] SET  DISABLE_BROKER 
GO
ALTER DATABASE [rcsDB] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [rcsDB] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [rcsDB] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [rcsDB] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [rcsDB] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [rcsDB] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [rcsDB] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [rcsDB] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [rcsDB] SET  MULTI_USER 
GO
ALTER DATABASE [rcsDB] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [rcsDB] SET DB_CHAINING OFF 
GO
ALTER DATABASE [rcsDB] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [rcsDB] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [rcsDB] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [rcsDB] SET QUERY_STORE = OFF
GO
USE [rcsDB]
GO

/****** Object:  Table [dbo].[[Film]]  ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Film](
	[Film_ID] [int] IDENTITY(1,1) NOT NULL,
	[Title] [varchar](100) NOT NULL,
	[Director] [varchar] (100) NOT NULL,
	[Subject] [varchar] (1000) NOT NULL,
	[Category] [varchar] (150) NOT NULL,
	[Image] [varchar] (500) NOT NULL,
 CONSTRAINT [PK_Film] PRIMARY KEY CLUSTERED 
(
	[Film_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

/****** Object:  Table [dbo].[[PropozoFilm]]  ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Propozimet](
	[Propozimet_ID] [int] IDENTITY(1,1) NOT NULL,
	[UserID] [int] NOT NULL,
	[Mesazhi] [varchar] (100) NOT NULL,
 CONSTRAINT [PK_Propozimet] PRIMARY KEY CLUSTERED 
(
	[Propozimet_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO





CREATE TABLE [dbo].[Useri](
	[User_ID] [int] IDENTITY(1,1) NOT NULL,
	[Username] [varchar](50) NOT NULL,
	[Email] [varchar](50) NOT NULL,
	[Password] [varchar](550) NOT NULL,
	[RoleID] [int] NOT NULL,
 CONSTRAINT [PK_Useri] PRIMARY KEY CLUSTERED 
(
	[User_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [dbo].[Role](
	[Role_ID] [int] IDENTITY(1,1) NOT NULL,
	[Name] [varchar](50) NULL,
 CONSTRAINT [PK_Role] PRIMARY KEY CLUSTERED 
(
	[Role_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

INSERT [dbo].[Useri] ([Username], [Email], [Password], [RoleID]) VALUES (N'albi.rexha', N'albi@gmail.com', N'test1', 1)
INSERT [dbo].[Useri] ([Username], [Email], [Password], [RoleID]) VALUES (N'andi.bugujevci', N'andi@gmail.com', N'test2', 1)
INSERT [dbo].[Useri] ([Username], [Email], [Password], [RoleID]) VALUES (N'user.tester1', N'usert1@gmail.com', N'test3', 2)
INSERT [dbo].[Useri] ([Username], [Email], [Password], [RoleID]) VALUES (N'user.tester2', N'usert1@gmail.com', N'test4', 2)



INSERT [dbo].[Role] ([Name]) VALUES (N'Admin')
INSERT [dbo].[Role] ([Name]) VALUES (N'User')

ALTER TABLE [dbo].[Useri]  WITH CHECK ADD  CONSTRAINT [FK_User_Role] FOREIGN KEY([RoleID])
REFERENCES [dbo].[Role] ([Role_ID])
GO
ALTER TABLE [dbo].[Useri] CHECK CONSTRAINT [FK_User_Role]
GO

ALTER TABLE [dbo].[Propozimet]  WITH CHECK ADD  CONSTRAINT [FK_User_Propozimet] FOREIGN KEY([UserID])
REFERENCES [dbo].[Useri] ([User_ID])
GO
ALTER TABLE [dbo].[Propozimet] CHECK CONSTRAINT [FK_User_Propozimet]
GO





CREATE TABLE [dbo].[Contact](
	[Contact_ID] [int] IDENTITY(1,1) NOT NULL,
	[UserID] [int] NOT NULL,
	[Message] [varchar] (1000) NOT NULL,
 CONSTRAINT [PK_Contact] PRIMARY KEY CLUSTERED 
(
	[Contact_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Contact]  WITH CHECK ADD  CONSTRAINT [FK_User_Contact] FOREIGN KEY([UserID])
REFERENCES [dbo].[Useri] ([User_ID])
GO
ALTER TABLE [dbo].[Contact] CHECK CONSTRAINT [FK_User_Contact]
GO

INSERT [dbo].[Film] ([Title], [Director], [Subject], [Category], [Image]) VALUES (N'Fight Club', N'David Fincher', N'When I first saw the previews for this movie, it had me interested. A movie about guys who fight - it didnt seem to deep, but I thought it would provide entertainment. I had heard buzz about, a few of my friends raved about it for a few days, and I was convinced. I should see this movie. I went to my local video store and picked up the last remaining DVD. I popped it in, sat in amazement until the last credit rolled, and then watched it again. And again. And again. This movie is dark and disturbing, however, it is equally smart and stylistic. I found it hard to watch at points, but I couldnt turn my eyes away. Fight Club makes many bold statements against the modern consumer-driven society, and produces Nortons best performance and Pitts second best (12 Monkeys). One of the best movie endings Ive seen. Even better if youre a Pixies fan.', N'Drame', N'Images/NTWlsRcUqw.png')
INSERT [dbo].[Film] ([Title], [Director], [Subject], [Category], [Image]) VALUES (N'Forrest Gump', N'Robert Zemeckis', N'When I first saw this movie I didnt appreciate it like I do now. I think it may have been because I was so young when I first saw it. Just recently I saw the movie again. What an amazing story and moving meaning. That movie teaches you so much about life and the meaning of it. That life isnt as bad as most people make it seem. That an innocent man can impact so many lives with his innocence. The meaning of the movie to me is that everyone needs to have a better outlook on life. That we need to appreciate more of the little things and not let the big things hold us back. That truly although life may throw us trials and tribulations like a box of chocolates but that we have to just bite into it and get through it even if we dont like it. That we all need to hold true to our values and not sink into a place that feels like theres no hope... I just love this movie. And anyone who hasnt seen it or who thinks that dont like it I seriously suggest seeing it or seeing it again.', N'Komedi, Drame', N'Images/ri5T3DqVrC.png')
INSERT [dbo].[Film] ([Title], [Director], [Subject], [Category], [Image]) VALUES (N'The Godfather', N'Francis Ford Coppola', N'Rather than concentrating on everything that is great about The Godfather, a much easier way for me to judge its quality is on what is bad about it. Almost every film has something that I dont like about it, but I can honestly say that I wouldnt change anything about The Godfather. There is nothing weak about it and nothing that stands out as bad. Thats why it gets ten out of ten. This is one of those films that made me wonder why I hadnt seen it earlier. The acting from everyone involved is great, Marlon Brando comes across perfectly as the head of the family, and James Caan and Al Pacino are excellent as his sons. The soundtrack by Nino Rota is also very memorable, bringing back memories of the film every time I hear it. The plot has to be excellent for it to get ten out of ten, and it is, its far from predictable and the film is the definition of a great epic.', N'Drame, Krim', N'Images/vs7yymd210.png')
INSERT [dbo].[Film] ([Title], [Director], [Subject], [Category], [Image]) VALUES (N'The Dark Knight', N'Christopher Nolan', N'First Id controversially like to point out that this movie wouldnt have gotten as much hype as it did if it wasnt for Heath Ledgers death before the release and the Academy not being afraid to give an Oscar to a corpse. Nevertheless, his performance is easily the best one in the superhero genre and the crafty, well put together New York accent confirms he put a lot of dedication and effort into his methodical role and deserved what he got (an Oscar). This isnt just another Batman movie anymore. Yes, there is action, explosions and stunt work but between that is masterfully crafted dialogue that dwells deep.Batman is his definitive self now, we finally see the fullest of his character and Christian Bale does him justice. Christopher Nolan praised be created complex characters and given each one justifiable treatment. Thats the reason the cast works, everyone holds their own, there are no lazily written or neglected characters.', N'Aksion, Aventure', N'Images/Liy6Kx3r4i.png')
INSERT [dbo].[Film] ([Title], [Director], [Subject], [Category], [Image]) VALUES (N'Inception', N'Christopher Nolan', N'Dom Cobb is a skilled thief, the absolute best in the dangerous art of extraction, stealing valuable secrets from deep within the subconscious during the dream state, when the mind is at its most vulnerable. Cobbs rare ability has made him a coveted player in this treacherous new world of corporate espionage, but it has also made him an international fugitive and cost him everything he has ever loved. Now Cobb is being offered a chance at redemption. One last job could give him his life back but only if he can accomplish the impossible, inception. Instead of the perfect heist, Cobb and his team of specialists have to pull off the reverse: their task is not to steal an idea, but to plant one. If they succeed, it could be the perfect crime. But no amount of careful planning or expertise can prepare the team for the dangerous enemy that seems to predict their every move. An enemy that only Cobb could have seen coming.', N'Thriller, Aksion', N'Images/Ke45dIsZeN.png')



USE [master]
GO
ALTER DATABASE [rcsDB] SET  READ_WRITE 
GO



