SELECT Performance.*, Screen.seats - IFNULL(sum(booking.seats), 0) as seatsleft
FROM Booking
RIGHT JOIN Performance
ON (Performance.id = booking.performance)
JOIN Screen
ON ((Performance.screen = Screen.screen) AND (Performance.cinema = Screen.Cinema))
WHERE (Performance.id=10)
GROUP BY performance.id
;
