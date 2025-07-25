CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    number VARCHAR(20) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO articles (name, number, price) VALUES
    ('Artikel 1', 'A00001', 12.99),
    ('Artikel 2', 'A00002', 20.49),
    ('Artikel 3', 'A00003', 49.99),
    ('Artikel 4', 'A00004', 34.99),
    ('Artikel 5', 'A00005', 24.50),
    ('Artikel 6', 'B00001', 12.99),
    ('Artikel 7', 'B00002', 20.49),
    ('Artikel 8', 'B00003', 49.99),
    ('Artikel 9', 'B00004', 34.99),
    ('Artikel 10', 'B00005', 24.50)
;