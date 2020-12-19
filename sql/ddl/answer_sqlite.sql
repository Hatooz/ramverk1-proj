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
    FOREIGN KEY ("user") REFERENCES User ("id"),
    FOREIGN KEY ("question") REFERENCES Question ("id")    
);
