SELECT Performance.*, Screen.seats - IFNULL(sum(booking.seats), 0)
FROM Booking
RIGHT JOIN Performance
ON (Performance.id = booking.performance)
JOIN Screen
ON ((Performance.screen = Screen.screen) AND (Performance.cinema = Screen.Cinema))
GROUP BY performance.id
