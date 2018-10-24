INSERT INTO bird(birdId, birdName, birdColor, birdSize, birdImage, birdVideo, birdRange) VALUES(unhex(f8135d53a85e4a3ea6f741bbe5cf3b61), "Mountain Chickadee",
"Gray", "Sparrow-sized or Smaller", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054751-1280px.jpg", "https://vimeo.com/238671200", "year-round");

INSERT INTO bird(birdId, birdName, birdColor, birdSize, birdImage, birdVideo, birdRange) VALUES(unhex(faf3345b5ae944c496775ff7de01f8ae), "Western Bluebird", "Blue and Brown",
"Sparrow-sized or Smaller", "https://d1ia71hq4oe7pn.cloudfront.net/photo/67472541-720px.jpg", "https://www.allaboutbirds.org/guide/Western_Bluebird/media-browser-overview/407871", "West");

INSERT INTO sound(soundId, soundBirdId, soundFile) VALUES("unhex(6b5abb8dc7e049bd8675371e97f2dfbf)", unhex(faf3345b5ae944c496775ff7de01f8ae), "Song");

INSERT INTO article(articleId, articleBirdId, articleSoundBirdId, articleContent, articleBirdImage)
VALUES(unhex(3c4476f18c2c46b1a213188a7e75fdf1), unhex(f8135d53a85e4a3ea6f741bbe5cf3b61), unhex(a93c21257fdd4a18bf950a306d10e5fa), "Description", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054751-1280px.jpg");

UPDATE bird SET birdColor = "Black and Gray", birdImage = "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054731-1280px.jpg"
WHERE birdName = "Mountain Chickadee";

DELETE from bird WHERE birdName = "Western Bluebird";

INSERT INTO sound(soundId, soundBirdId, soundFile) VALUES(unhex(cd32cb576432499da58e3922e8957b0b), unhex(a93c21257fdd4a18bf950a306d10e5fa), "Call");

SELECT articleId FROM article;

SELECT sound.soundId, sound.soundBirdId, sound.soundFile, bird.birdId FROM sound INNER JOIN bird ON sound.soundBirdId = bird.birdId
WHERE soundId = "1";

SELECT COUNT (likeTweetId) FROM 'like';