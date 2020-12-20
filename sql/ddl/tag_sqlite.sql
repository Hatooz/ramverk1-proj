--
-- Creating a sample table.
--



--
-- Table Tag
--
DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "title" TEXT NOT NULL,
    "question" TEXT NOT NULL,
    FOREIGN KEY ("question") REFERENCES Question ("title")
);
