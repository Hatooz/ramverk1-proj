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
