   USE db_fwutschk;
SELECT COUNT(*) AS movies
  FROM member
 WHERE date_last_film BETWEEN '2006-10-30' AND '2007-07-27'
    OR (MONTH(date_last_film) = 12 AND DAY(date_last_film) = 24);
