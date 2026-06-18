-- Calculate the adjusted and nett strokes for each hole
UPDATE round_holes AS rh 
INNER JOIN vw_stroke_calculations AS vw 
	ON rh.id = vw.round_hole_id
SET rh.adjusted_strokes	= vw.adjusted_strokes, 
	rh.nett_strokes 	= vw.nett_strokes, 
	rh.score		 	= vw.score, 
	rh.calculated 		= 1;

-- Update the rounds table with a summary of each round
UPDATE rounds AS r
INNER JOIN vw_round_summaries AS vw
	ON r.id = vw.round_id
SET r.holes_played		= vw.holes_played,
	r.num_strokes 		= vw.num_strokes, 
	r.adjusted_strokes 	= vw.adjusted_strokes, 
	r.nett_strokes 		= vw.nett_strokes, 
	r.total_score       = vw.total_score,
	r.num_fairways 		= vw.num_fairways, 
	r.num_girs 			= vw.num_girs, 
	r.num_sand_saves 	= vw.num_sand_saves, 
	r.num_putts 		= vw.num_putts, 
	r.calculated 		= 1 
WHERE r.calculated = 0;

-- Update the holes table with a summary of each hole
UPDATE holes AS h
INNER JOIN vw_hole_summaries AS vw
	ON h.id = vw.hole_id
SET h.num_played		= vw.num_played,
	h.num_strokes 		= vw.num_strokes, 
	h.adjusted_strokes 	= vw.adjusted_strokes, 
	h.nett_strokes 		= vw.nett_strokes, 
	h.total_score       = vw.total_score,
	h.num_fairways 		= vw.num_fairways, 
	h.num_girs 			= vw.num_girs, 
	h.num_sand_saves 	= vw.num_sand_saves, 
	h.num_putts 		= vw.num_putts;

-- Update the courses table with a summary of each course
UPDATE courses AS c
INNER JOIN vw_course_summaries AS vw
	ON c.id = vw.course_id
SET c.last_played_at	= vw.last_played_at,
	c.num_players       = vw.num_players,
	c.num_rounds        = vw.num_rounds,
	c.num_complete      = vw.num_complete,
	c.total_score       = vw.total_score,
	c.num_strokes 		= vw.num_strokes, 
	c.adjusted_strokes 	= vw.adjusted_strokes, 
	c.nett_strokes 		= vw.nett_strokes, 
	c.num_fairways 		= vw.num_fairways, 
	c.num_girs 			= vw.num_girs, 
	c.num_sand_saves 	= vw.num_sand_saves, 
	c.num_putts 		= vw.num_putts;

-- Update the venues table with a summary of each venue
UPDATE venues AS v
INNER JOIN vw_venue_summaries AS vw
	ON v.id = vw.venue_id
SET v.last_played_at	= vw.last_played_at,
	v.num_rounds        = vw.num_rounds,
	v.num_complete      = vw.num_complete,
	v.total_score       = vw.total_score,
	v.num_strokes 		= vw.num_strokes, 
	v.adjusted_strokes 	= vw.adjusted_strokes, 
	v.nett_strokes 		= vw.nett_strokes, 
	v.num_fairways 		= vw.num_fairways, 
	v.num_girs 			= vw.num_girs, 
	v.num_sand_saves 	= vw.num_sand_saves, 
	v.num_putts 		= vw.num_putts;



