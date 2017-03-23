Hur många är listade som avlidna ?

    SELECT COUNT(*), Status FROM CREW WHERE Status = 0;

Lista antal utav hela besättningen.

    SELECT COUNT(*), crewID FROM Crew;

Kunna söka på för en viss rang?

    SELECT * FROM Crew WHERE  Rank = 1;

Hur många som tillhör olika typer av avdelningar.

    SELECT COUNT(*), dept FROM Crew GROUP BY dept;


Hur många av olika rang.

    SELECT COUNT(*), rank FROM Crew GROUP BY rank;

Lista alla som tjänar mer än en viss (valfri) summa.

SELECT firstName, lastName, rank, rank.salary FROM Crew INNER JOIN Rank ON crew.rank = rank.rankID WHERE (rank.salary > 22000);