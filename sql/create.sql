


CREATE TABLE ADDRESS
(
  NAME VARCHAR(30) NOT NULL,
  ADDRESS VARCHAR(50) NOT NULL,
  BID INT NOT NULL,
  CITIES_SERVICES VARCHAR(20) NOT NULL,
  DATE_OF_JOINING DATE NOT NULL,
  PHONE INT NOT NULL,
  EMAILID VARCHAR(20) NOT NULL,
  PRIMARY KEY (BID),
  UNIQUE (NAME),
  UNIQUE (PHONE),
  UNIQUE (EMAILID)
);

CREATE TABLE CLIENT
(
  CLIENT_ID INT NOT NULL,
  SINCE DATE NOT NULL,
  NAME VARCHAR(30) NOT NULL,
  ADDRESS VARCHAR(50) NOT NULL,
  PRIMARY KEY (CLIENT_ID),
  UNIQUE (NAME)
);

CREATE TABLE REVIEW
(
  REVIEW_ID INT NOT NULL,
  RATING INT NOT NULL,
  REVIEW_DATE DATE NOT NULL,
  COMMENTS VARCHAR(50) NOT NULL,
  BID INT NOT NULL, 
  CLIENT_ID INT NOT NULL,
  PRIMARY KEY (REVIEW_ID, BID, CLIENT_ID),
  FOREIGN KEY (BID) REFERENCES BUSINESS(BID) ON DELETE CASCADE,
  FOREIGN KEY (CLIENT_ID) REFERENCES CLIENT(CLIENT_ID)  ON DELETE CASCADE
);

CREATE TABLE QUOTE
(
  PRICE INT NOT NULL,
  SERVICE VARCHAR(30) NOT NULL,
  QUOTE_ID INT NOT NULL,
  BID INT NOT NULL,
  CLIENT_ID INT NOT NULL,
  PRIMARY KEY (QUOTE_ID),
  FOREIGN KEY (BID) REFERENCES BUSINESS(BID)  ON DELETE CASCADE,
  FOREIGN KEY (CLIENT_ID) REFERENCES CLIENT(CLIENT_ID)  ON DELETE CASCADE
);



CREATE TABLE CLIENT_REFER
(
  CLIENT_ID INT NOT NULL,
  FRIEND_ID INT NOT NULL,
  PRIMARY KEY (CLIENT_ID, FRIEND_ID),
  FOREIGN KEY (CLIENT_ID) REFERENCES CLIENT(CLIENT_ID),
  FOREIGN KEY (FRIEND_ID) REFERENCES CLIENT(CLIENT_ID)
);
CREATE TABLE QUOTE
(
  PRICE INT NOT NULL,
  SERVICE VARCHAR(30) NOT NULL,
  QUOTE_ID INT NOT NULL,
  BID INT NOT NULL,
  CLIENT_ID INT NOT NULL,
  PRIMARY KEY (QUOTE_ID),
  FOREIGN KEY (BID) REFERENCES BUSINESS(BID)  ON DELETE CASCADE,
  FOREIGN KEY (CLIENT_ID) REFERENCES CLIENT(CLIENT_ID)  ON DELETE CASCADE
);


CREATE TABLE REVIEW
(
  REVIEW_ID INT NOT NULL,
  RATING INT NOT NULL,
  REVIEW_DATE DATE NOT NULL,
  COMMENTS VARCHAR(50) NOT NULL,
  BID INT NOT NULL, 
  CLIENT_ID INT NOT NULL,
  PRIMARY KEY (REVIEW_ID, BID, CLIENT_ID),
  FOREIGN KEY (BID) REFERENCES BUSINESS(BID) ON DELETE CASCADE,
  FOREIGN KEY (CLIENT_ID) REFERENCES CLIENT(CLIENT_ID)  ON DELETE CASCADE
);

CREATE TABLE CLIENT_REFER
(
  CLIENT_ID INT NOT NULL,
  FRIEND_ID INT NOT NULL,
  PRIMARY KEY (CLIENT_ID, FRIEND_ID),
  FOREIGN KEY (CLIENT_ID) REFERENCES CLIENT(CLIENT_ID),
  FOREIGN KEY (FRIEND_ID) REFERENCES CLIENT(CLIENT_ID)
);
