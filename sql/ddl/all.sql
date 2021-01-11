--
-- Creating a sample table.
--


--
-- Table User
--
DROP TABLE IF EXISTS User;
CREATE TABLE User (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "username" TEXT UNIQUE NOT NULL,
    "email" TEXT UNIQUE NOT NULL,
    "password" TEXT NOT NULL,
    "gravatar" TEXT,
    "created" TIMESTAMP,
    "updated" DATETIME,
    "deleted" DATETIME,
    "active" DATETIME
);

--
-- Table Answer
--
DROP TABLE IF EXISTS Answer;
CREATE TABLE Answer (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "body" TEXT NOT NULL,    
    "user" INTEGER NOT NULL,
    "question" INTEGER NOT NULL,    
    "comment" INTEGER,    
    FOREIGN KEY ("user") REFERENCES User ("id"),
    FOREIGN KEY ("question") REFERENCES Question ("id"),
    FOREIGN KEY ("comment") REFERENCES Comment ("id")
);

--
-- Creating a sample table.
--



--
-- Table Comment
--
DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
    "id" INTEGER PRIMARY KEY NOT NULL,    
    "body" TEXT NOT NULL,    
    "user" INTEGER NOT NULL,
    "question" INTEGER,
    "answer" INTEGER,
    FOREIGN KEY ("user") REFERENCES User ("id"),
    FOREIGN KEY ("question") REFERENCES Question ("id"),
    FOREIGN KEY ("answer") REFERENCES Question ("id")
    );

--
-- Creating a sample table.
--



--
-- Creating a sample table.
--



--
-- Table Question
--
DROP TABLE IF EXISTS Question;
CREATE TABLE Question (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "title" TEXT NOT NULL,
    "body" TEXT NOT NULL,
    "tag" TEXT NOT NULL,
    "user" INTEGER NOT NULL,
    "created" TIMESTAMP,
    FOREIGN KEY ("user") REFERENCES User ("id")    
);


DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "title" TEXT NOT NULL,
    "question" TEXT NOT NULL,
    FOREIGN KEY ("question") REFERENCES Question ("title")
);
