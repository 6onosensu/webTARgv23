CREATE TABLE valitsus(
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         valitsuseSeis VARCHAR(50),
                         punktid INT DEFAULT 0,
                         kommentaarid TEXT DEFAULT '',
                         lisamisKuupaev DATE,
                         avalik INT DEFAULT 1
)

INSERT INTO valitsus(valitsuseSeis, lisamisKuupaev)
VALUES('Juku Miku 1.valitsus', '2024-05-02');
INSERT INTO valitsus(valitsuseSeis, lisamisKuupaev)
VALUES('Juku Miku 5.valitsus', '2024-04-02');
INSERT INTO valitsus(valitsuseSeis, lisamisKuupaev)
VALUES('Juku Miku 3.valitsus', '2024-10-22');
INSERT INTO valitsus(valitsuseSeis, lisamisKuupaev)
VALUES('Juku Miku 4.valitsus', '2024-11-04');

UPDATE valitsus SET punktid = punktid + 1
where id = 1;