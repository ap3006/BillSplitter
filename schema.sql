DROP TABLE users;
CREATE TABLE users(
                  id integer primary key,
                  name varchar(250),
                  email varchar(50),
                  encryptedPassword varchar(50),
                  salt varchar(40)
                  );

DROP TABLE bills;
CREATE TABLE bills(
                  id integer primary key,
                  name varchar(250),
                  description varchar(250),
                  originalAmount decimal(19,4),
                  currentAmount decimal(19,4),
                  isSaved BIT,
                  adminID INTEGER,
                  FOREIGN KEY(adminID) REFERENCES users(id)
                  );

DROP TABLE userBills;
CREATE TABLE userBills(
                      id integer primary key,
                      userID INTEGER,
                      userName varchar(250),
                      billID INTEGER,
                      billName varchar(250),
                      billAdminName varchar(250),
                      billDescription varchar(250),
                      originalAmount decimal(19,4),
                      currentAmount decimal(19,4),
                      isComplete BIT,
                      FOREIGN KEY(userID) REFERENCES users(id),
                      FOREIGN KEY(billID) REFERENCES bills(id)
                      );

DROP TABLE groups;
CREATE TABLE groups(
                  id integer primary key,
                  groupName varchar(250),
                  groupAdminID INTEGER,
                  description varchar(250)
                  );

DROP TABLE userGroup;
CREATE TABLE userGroup(
                       id integer primary key,
                       userID INTEGER,
                       userName varchar(250),
                       groupID INTEGER,
                       groupName varchar(250),
                       groupDescription varchar(250),
                       groupAdminName INTEGER,
                       FOREIGN KEY(userID) REFERENCES users(id),
                       FOREIGN KEY(groupID) REFERENCES groups(id)
                       );
