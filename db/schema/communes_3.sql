CREATE TABLE communes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    tag VARCHAR(255) NOT NULL,
    short VARCHAR(255) NOT NULL,
    province_id INT NOT NULL,
    FOREIGN KEY (province_id) REFERENCES provinces(id)
);
