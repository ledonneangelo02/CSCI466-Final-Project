<<<<<<< HEAD
##########################################
# CSCI 466  FINAL GROUP PROJECT  SEC: 02 #
#					 #
#  This is a SQL Script that will fill   #
#     our Song Table with data.          #
#					 #
#    By:    Angelo LeDonne z1920784      #
#           Chris Dejong   z1836870      #
#           Mark Southwood z058227       #
#           Milad Jizan    z1943173      #
##########################################

INSERT INTO Artist (Name) VALUES("Shawn Mendes");
INSERT INTO Artist (Name) VALUES("Ariana Grande");
INSERT INTO Artist (Name) VALUES("Ed Sheeran");
INSERT INTO Artist (Name) VALUES("Post Malone");
INSERT INTO Artist (Name) VALUES("Lil Tecca");
INSERT INTO Artist (Name) VALUES("Sam Smith");
INSERT INTO Artist (Name) VALUES("Lil Nas X");
INSERT INTO Artist (Name) VALUES("Billie Eilish");
INSERT INTO Artist (Name) VALUES("Lewis Capaldi");
INSERT INTO Artist (Name) VALUES("Drake");
INSERT INTO Artist (Name) VALUES("Chris Brown");
INSERT INTO Artist (Name) VALUES("Y2K");
INSERT INTO Artist (Name) VALUES("Lizzo");
INSERT INTO Artist (Name) VALUES("MEDUZA");
INSERT INTO Artist (Name) VALUES("Tones and I");
INSERT INTO Artist (Name) VALUES("Young Thug");
INSERT INTO Artist (Name) VALUES("Katy Perry");
INSERT INTO Artist (Name) VALUES("Martin Garrix");
INSERT INTO Artist (Name) VALUES("Kygo");
INSERT INTO Artist (Name) VALUES("Taylor Swift");
INSERT INTO Artist (Name) VALUES("Lady Gaga");
INSERT INTO Artist (Name) VALUES("Marshmello");
INSERT INTO Artist (Name) VALUES("The Chainsmokers");
INSERT INTO Artist (Name) VALUES("Social House");
INSERT INTO Artist (Name) VALUES("Khalid");
INSERT INTO Artist (Name) VALUES("Justin Bieber");
INSERT INTO Artist (Name) VALUES("Rick Ross");
INSERT INTO Artist (Name) VALUES("Macklemore");
INSERT INTO Artist (Name) VALUES("J. Cole");
INSERT INTO Artist (Name) VALUES("Travis Scott");
INSERT INTO Artist (Name, Band) VALUES("Patrick Stump", "Fall Out Boys");
INSERT INTO Artist (Name) VALUES("Chance The Rapper");
INSERT INTO Artist (Name) VALUES("PnB Rock");
INSERT INTO Artist (Name) VALUES("Kane Brown");
##########################################\n
# CSCI 466  FINAL GROUP PROJECT  SEC: 02 #\n
#					 #\n
#     THIS IS A HELPER FUNCTION FOR SQL  #\n
#  SCRIPT CREATION                       #\n
#					 #\n
#    By:    Angelo LeDonne z1920784      #\n
#           Chris Dejong   z1836870      #\n
#           Mark Southwood z058227       #\n
#           Milad Jizan    z1943173      #\n
##########################################
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Senorita","Shawn Mendes","canadian pop",191,"https://upload.wikimedia.org/wikipedia/commons/8/8d/Shawn_Mendes_and_Camila_Cabello_-_Se%C3%B1orita.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("boyfriend (with Social House)","Ariana Grande","dance pop",186,"https://upload.wikimedia.org/wikipedia/en/6/65/Ariana_Grande_and_Social_House_-_Boyfriend.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Beautiful People (feat. Khalid)","Ed Sheeran","pop",198,"https://upload.wikimedia.org/wikipedia/commons/f/fa/Ed_Sheeran_-_Beautiful_People.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Goodbyes (Feat. Young Thug)","Post Malone","dfw rap",175,"https://upload.wikimedia.org/wikipedia/en/3/30/Post_Malone_-_Goodbyes.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("I Don't Care (with Justin Bieber)","Ed Sheeran","pop",220,"https://upload.wikimedia.org/wikipedia/en/6/69/Ed_Sheeran_%26_Justin_Bieber_-_I_Don%27t_Care.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Ransom","Lil Tecca","trap music",131,"https://upload.wikimedia.org/wikipedia/en/8/86/Lil_Tecca_-_Ransom.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("How Do You Sleep?","Sam Smith","pop",202,"https://upload.wikimedia.org/wikipedia/en/6/6d/Sam_Smith_-_How_Do_You_Sleep%3F.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Old Town Road - Remix","Lil Nas X","country rap",157,"https://static.stereogum.com/uploads/2019/07/Lil-Nas-X-Old-Town-Road-Remix-1562934924-1000x1000.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("bad guy","Billie Eilish","electropop",194,"https://i1.sndcdn.com/artworks-000584234423-y1fg41-t500x500.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Someone You Loved","Lewis Capaldi","pop",182,"https://upload.wikimedia.org/wikipedia/en/a/a6/Lewis_Capaldi_-_Someone_You_Loved.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Money In The Grave (feat. Rick Ross)","Drake","canadian hip hop",205,"https://production-digtracks-com.s3-ap-northeast-1.amazonaws.com/uploads/cover_art/file/54572/coverart.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("No Guidance (feat. Drake)","Chris Brown","dance pop",261,"https://upload.wikimedia.org/wikipedia/en/e/ec/Chris_Brown_-_No_Guidance.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Sunflower - Spider-Man: Into the Spider-Verse","Post Malone","dfw rap",158,"https://i.scdn.co/image/ab67616d0000b273e2e352d89826aef6dbd5ff8f");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Lalala","Y2K","canadian hip hop",161,"https://upload.wikimedia.org/wikipedia/en/0/06/Y2K_and_Bbno%24_-_Lalala.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Truth Hurts","Lizzo","escape room",173,"https://upload.wikimedia.org/wikipedia/en/a/a9/LizzoTruthHurts.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Piece Of Your Heart","MEDUZA","pop house",153,"https://upload.wikimedia.org/wikipedia/en/b/b8/Meduza_-_Piece_of_Your_Heart.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Panini","Lil Nas X","country rap",115,"https://upload.wikimedia.org/wikipedia/en/3/32/Panini_Remix_Cover.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("If I Can't Have You","Shawn Mendes","canadian pop",191,"https://upload.wikimedia.org/wikipedia/en/a/a7/Shawn_Mendes_-_If_I_Can%27t_Have_You.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Dance Monkey","Tones and I","australian pop",210,"https://upload.wikimedia.org/wikipedia/en/1/1f/Dance_Monkey_by_Tones_and_I.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Takeaway","The Chainsmokers","edm",210,"https://upload.wikimedia.org/wikipedia/en/4/47/Takeaway_%28song%29.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("7 rings","Ariana Grande","dance pop",179,"https://upload.wikimedia.org/wikipedia/en/b/b7/Ariana_Grande_-_7_rings.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("The London (feat. J. Cole & Travis Scott)","Young Thug","atl hip hop",200,"https://upload.wikimedia.org/wikipedia/en/6/6f/Young_Thug%2C_J._Cole_and_Travis_Scott_-_The_London.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Never Really Over","Katy Perry","dance pop",224,"https://www.udiscovermusic.com/wp-content/uploads/2019/05/Katy-Perry-Never-Really-Over.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Summer Days (feat. Macklemore & Patrick Stump of Fall Out Boy)","Martin Garrix","big room",164,"https://upload.wikimedia.org/wikipedia/en/4/46/Martin_Garrix_-_Summer_Days.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Higher Love","Kygo","edm",228,"https://static.stereogum.com/uploads/2019/06/D-HFC1jWwAATV-Y-1561688704-1000x1000.jpeg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("You Need To Calm Down","Taylor Swift","dance pop",171,"https://upload.wikimedia.org/wikipedia/en/2/27/Taylor_Swift_-_You_Need_to_Calm_Down.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Shallow","Lady Gaga","dance pop",216,"https://lastfm.freetls.fastly.net/i/u/ar0/0dfb22420177633c6791b5de808809db.jpg");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Talk","Khalid","pop",198,"https://upload.wikimedia.org/wikipedia/en/8/8f/Khalid_-_Talk.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("One Thing Right","Marshmello","brostep",182,"https://upload.wikimedia.org/wikipedia/en/d/d2/Marshmello_and_Kane_Brown_-_One_Thing_Right.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Happier","Marshmello","brostep",214,"https://upload.wikimedia.org/wikipedia/en/e/e5/Marshmello_and_Bastille_Happier.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Call You Mine","The Chainsmokers","edm",218,"https://upload.wikimedia.org/wikipedia/en/8/85/The_Chainsmokers_-_Call_You_Mine.png");
INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES("Cross Me (feat. Chance the Rapper & PnB Rock)","Ed Sheeran","pop",206,"https://upload.wikimedia.org/wikipedia/en/4/4d/Ed_Sheeran_-_Cross_Me.png");
=======
##############################
# This is a SQL Script that  #
# will insert data into our  #
# table.                     #
##############################
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Senorita","canadian pop",191,"https://upload.wikimedia.org/wikipedia/commons/8/8d/Shawn_Mendes_and_Camila_Cabello_-_Se%C3%B1orita.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("boyfriend (with Social House)","dance pop",186,"https://upload.wikimedia.org/wikipedia/en/6/65/Ariana_Grande_and_Social_House_-_Boyfriend.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Beautiful People (feat. Khalid)","pop",198,"https://upload.wikimedia.org/wikipedia/commons/f/fa/Ed_Sheeran_-_Beautiful_People.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Goodbyes (Feat. Young Thug)","dfw rap",175,"https://upload.wikimedia.org/wikipedia/en/3/30/Post_Malone_-_Goodbyes.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("I Don't Care (with Justin Bieber)","pop",220,"https://upload.wikimedia.org/wikipedia/en/6/69/Ed_Sheeran_%26_Justin_Bieber_-_I_Don%27t_Care.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Ransom","trap music",131,"https://upload.wikimedia.org/wikipedia/en/8/86/Lil_Tecca_-_Ransom.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("How Do You Sleep?","pop",202,"https://upload.wikimedia.org/wikipedia/en/6/6d/Sam_Smith_-_How_Do_You_Sleep%3F.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Old Town Road - Remix","country rap",157,"https://static.stereogum.com/uploads/2019/07/Lil-Nas-X-Old-Town-Road-Remix-1562934924-1000x1000.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("bad guy","electropop",194,"https://i1.sndcdn.com/artworks-000584234423-y1fg41-t500x500.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Someone You Loved","pop",182,"https://upload.wikimedia.org/wikipedia/en/a/a6/Lewis_Capaldi_-_Someone_You_Loved.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Money In The Grave (feat. Rick Ross)","canadian hip hop",205,"https://production-digtracks-com.s3-ap-northeast-1.amazonaws.com/uploads/cover_art/file/54572/coverart.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("No Guidance (feat. Drake)","dance pop",261,"https://upload.wikimedia.org/wikipedia/en/e/ec/Chris_Brown_-_No_Guidance.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Sunflower - Spider-Man: Into the Spider-Verse","dfw rap",158,"https://i.scdn.co/image/ab67616d0000b273e2e352d89826aef6dbd5ff8f");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Lalala","canadian hip hop",161,"https://upload.wikimedia.org/wikipedia/en/0/06/Y2K_and_Bbno%24_-_Lalala.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Truth Hurts","escape room",173,"https://upload.wikimedia.org/wikipedia/en/a/a9/LizzoTruthHurts.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Piece Of Your Heart","pop house",153,"https://upload.wikimedia.org/wikipedia/en/b/b8/Meduza_-_Piece_of_Your_Heart.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Panini","country rap",115,"https://upload.wikimedia.org/wikipedia/en/3/32/Panini_Remix_Cover.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("If I Can't Have You","canadian pop",191,"https://upload.wikimedia.org/wikipedia/en/a/a7/Shawn_Mendes_-_If_I_Can%27t_Have_You.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Dance Monkey","australian pop",210,"https://upload.wikimedia.org/wikipedia/en/1/1f/Dance_Monkey_by_Tones_and_I.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Takeaway","edm",210,"https://upload.wikimedia.org/wikipedia/en/4/47/Takeaway_%28song%29.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("7 rings","dance pop",179,"https://upload.wikimedia.org/wikipedia/en/b/b7/Ariana_Grande_-_7_rings.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("The London (feat. J. Cole & Travis Scott)","atl hip hop",200,"https://upload.wikimedia.org/wikipedia/en/6/6f/Young_Thug%2C_J._Cole_and_Travis_Scott_-_The_London.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Never Really Over","dance pop",224,"https://www.udiscovermusic.com/wp-content/uploads/2019/05/Katy-Perry-Never-Really-Over.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Summer Days (feat. Macklemore & Patrick Stump of Fall Out Boy)","big room",164,"https://upload.wikimedia.org/wikipedia/en/4/46/Martin_Garrix_-_Summer_Days.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Higher Love","edm",228,"https://static.stereogum.com/uploads/2019/06/D-HFC1jWwAATV-Y-1561688704-1000x1000.jpeg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("You Need To Calm Down","dance pop",171,"https://upload.wikimedia.org/wikipedia/en/2/27/Taylor_Swift_-_You_Need_to_Calm_Down.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Shallow","dance pop",216,"https://lastfm.freetls.fastly.net/i/u/ar0/0dfb22420177633c6791b5de808809db.jpg");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Talk","pop",198,"https://upload.wikimedia.org/wikipedia/en/8/8f/Khalid_-_Talk.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("One Thing Right","brostep",182,"https://upload.wikimedia.org/wikipedia/en/d/d2/Marshmello_and_Kane_Brown_-_One_Thing_Right.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Happier","brostep",214,"https://upload.wikimedia.org/wikipedia/en/e/e5/Marshmello_and_Bastille_Happier.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Call You Mine","edm",218,"https://upload.wikimedia.org/wikipedia/en/8/85/The_Chainsmokers_-_Call_You_Mine.png");
INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES("Cross Me (feat. Chance the Rapper & PnB Rock)","pop",206,"https://upload.wikimedia.org/wikipedia/en/4/4d/Ed_Sheeran_-_Cross_Me.png");
>>>>>>> 36e728012d094c0d2538cde1eef25741f16fabfe
