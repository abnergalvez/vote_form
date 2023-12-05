CREATE TABLE provinces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    tag VARCHAR(255) NOT NULL,
    short VARCHAR(255) NOT NULL,
    region_id INT NOT NULL,
    FOREIGN KEY (region_id) REFERENCES regions(id)
);