SELECT Performance.*, Screen.seats - IFNULL(sum(booking.seats), 0) as seatsleft
FROM Booking
RIGHT JOIN Performance
ON (Performance.id = booking.performance)
JOIN Screen
ON ((Performance.screen = Screen.screen) AND (Performance.cinema = Screen.Cinema))
WHERE (Performance.id=10)
GROUP BY performance.id
;

using orders
CREATE TRIGGER no_seats_left ON Booking AFTER INSERT
IF EXISTS (
	SELECT * FROM (
           SELECT Performance.id, Screen.seats - IFNULL(sum(booking.seats), 0) as seatsleft
		FROM Booking
		RIGHT JOIN Performance
		ON (Performance.id = booking.performance)
		JOIN Screen
		ON ((Performance.screen = Screen.screen) AND (Performance.cinema = Screen.Cinema))
		GROUP BY performance.id
          )
	WHERE seatsleft < 0
	)
BEGIN
	RAISERROR ('A teachers''s student tally is too high to accept new students.', 16, 1);
	ROLLBACK TRANSACTION;
	RETURN;
//

