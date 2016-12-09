INSERT INTO Books (authorId, title, year) VALUES ('8', N'Kažkokia knyga', '1976'), ('9', 'Graži Knyga', '1955');
DELETE FROM Books WHERE authorId IS NULL;
ALTER TABLE Books ADD Genre varchar(255);
UPDATE Books SET Genre = 'Pasaka' where bookId <11;
CREATE TABLE BookAuthors (id INT NOT NULL AUTO_INCREMENT, bookId INT NOT NULL, authorId INT NOT NULL, PRIMARY KEY(id));
INSERT INTO BookAuthors (bookId, authorId) VALUES ('1','1'),('2','2'),('2','3'),('3','4'),('4','5'),('5','4'),('6','3'),('9','2'),('10','1'),('10','2');
ALTER TABLE Books DROP COLUMN authorId;
UPDATE Books SET year = '1969' where bookId = 6;
