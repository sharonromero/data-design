ALTER DATABASE data_design_table_CHANGE_ME CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS article;
DROP TABLE IF EXISTS sound;
DROP TABLE IF EXISTS bird;

CREATE TABLE bird(
birdId BINARY(16) NOT NULL,
birdName CHAR(100) NOT NULL,
birdColor CHAR(20) NOT NULL,
birdSize CHAR(25) NOT NULL,
birdImage VARCHAR(255) NOT NULL,
birdVideo VARCHAR(255),
birdRange CHAR(11) NOT NULL,

PRIMARY KEY(birdId)
);

CREATE TABLE sound(
soundId BINARY(16) NOT NULL,
soundBirdId BINARY(16) NOT NULL,
soundFile VARCHAR(75) NOT NULL,

INDEX(soundBirdId),
FOREIGN KEY(soundBirdId) REFERENCES bird(birdId),
PRIMARY KEY(soundId)
);

CREATE TABLE article(
articleId BINARY(16) NOT NULL,
articleBirdId BINARY(16) NOT NULL,
articleContent VARCHAR(100) NOT NULL,
articleBirdImage VARCHAR(255) NOT NULL,

INDEX(articleBirdId),
FOREIGN KEY(articleBirdId) REFERENCES bird(birdId),
PRIMARY KEY(articleId)
);