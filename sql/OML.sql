INSERT INTO bird(birdId, birdName, birdColor, birdSize, birdImage, birdVideo, birdRange) VALUES(1, "Mountain Chickadee",
"Gray", "Sparrow-sized or Smaller", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054751-1280px.jpg", "https://vimeo.com/238671200", "year-round");

INSERT INTO bird(birdId, birdName, birdColor, birdSize, birdImage, birdVideo, birdRange) VALUES(2, "Western Bluebird", "Blue and Brown",
"Sparrow-sized or Smaller", "https://d1ia71hq4oe7pn.cloudfront.net/photo/67472541-720px.jpg", "https://www.allaboutbirds.org/guide/Western_Bluebird/media-browser-overview/407871", "West");

INSERT INTO sound(soundId, soundBirdId, soundFile) VALUES("1", "1", "Song");

INSERT INTO article(articleId, articleBirdId, articleSoundBirdId, articleContent, articleBirdImage)
VALUES("1", "1", "1", "Description", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054751-1280px.jpg");

UPDATE bird SET birdColor = "Black and Gray", birdImage = "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054731-1280px.jpg"
WHERE birdName = "Mountain Chickadee";

DELETE from bird WHERE birdName = "Western Bluebird";

INSERT INTO sound(soundId, soundBirdId, soundFile) VALUES("2", "1", "Call");

SELECT articleId FROM article;

SELECT sound.soundId, sound.soundBirdId, sound.soundFile, bird.birdId FROM sound INNER JOIN bird ON sound.soundBirdId = bird.birdId
WHERE soundId = "1";

SELECT COUNT (likeTweetId) FROM 'like';