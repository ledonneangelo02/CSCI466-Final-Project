##########################################
# CSCI 466  FINAL GROUP PROJECT  SEC: 02 #
#					 #
#  This is a SQL Script that will fill   #
#     our Person Table with data.        #
#					 #
#    By:    Angelo LeDonne z1920784      #
#           Chris Dejong   z1836870      #
#           Mark Southwood z058227       #
#           Milad Jizan    z1943173      #
##########################################

INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Angelo','z1920784@students.niu.edu','LeDonne','420 QikScope St.', 'Dekalb, Illinois 60115');
INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Chris','z1836870@students.niu.edu','Dejong','96024 W. Ashhull Ln.', 'Dekalb, Illinois 60115');
INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Mark','z058227@students.niu.edu','Southwood','999 Bndover Ct.', 'Dekalb, Illinois 60115');
INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Milad','z1943173@students.niu.edu','Jizan','56 Wilie Cir.', 'Dekalb, Illinois 60115');

INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Bonnie',' ','Beaver','893 Johnson St.','Dekalb, Illinois 60115');
INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Tony',' ','Balogne','45 Loosey Ln.','Dekalb, Illinois 60115');
INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Kocane',' ','Baire','78 Movie Dr.','Dekalb, Illinois 60115');
INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Private',' ','Ryan','87 MetalJacket Blvd.','Dekalb, Illinois 60115');
INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Adam',' ','Sandler','965 GoodIdea Rd.','Dekalb, Illinois 60115');
INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Mya',' ','Kaleafa','78 Buheht St. ','Dekalb, Illinois 60115');

INSERT INTO Person (FirstName, Email, LastName, AddressLine1, AddressLine2) VALUES ('Jon','lehuta@niu.edu','Lehuta','466 Sequel Dr.', 'Apt. 69, Dekalb, Illinois 60115');

INSERT INTO Client (PersonID) VALUES ('01');
INSERT INTO Client (PersonID) VALUES ('02');
INSERT INTO Client (PersonID) VALUES ('03');
INSERT INTO Client (PersonID) VALUES ('04');
INSERT INTO Client (PersonID) VALUES ('05');
INSERT INTO Client (PersonID) VALUES ('06');
INSERT INTO Client (PersonID) VALUES ('07');
INSERT INTO Client (PersonID) VALUES ('08');
INSERT INTO Client (PersonID) VALUES ('09');
INSERT INTO Client (PersonID) VALUES ('10');

INSERT INTO DJ (PersonID) VALUES ('11');
