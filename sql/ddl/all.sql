--
-- Creating a sample table.
--



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
    FOREIGN KEY ("user") REFERENCES User ("id")    
);
