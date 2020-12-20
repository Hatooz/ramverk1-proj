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
