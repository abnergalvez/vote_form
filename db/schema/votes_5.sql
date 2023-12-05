CREATE TABLE votes (
	id INTEGER PRIMARY KEY AUTOINCREMENT, 
	fullname varchar(50) NOT NULL,
	alias varchar(50) NULL,
	rut varchar(11) NULL,
	email varchar(50) NOT NULL,
	region_id INT NOT NULL,
	commune_id INT NOT NULL,
	candidate_id INT NOT NULL,
	find_out varchar(100) NOT NULL,
    FOREIGN KEY (region_id) REFERENCES regions(id),
    FOREIGN KEY (commune_id) REFERENCES communes(id),
    FOREIGN KEY (candidate_id) REFERENCES candidates(id)
);