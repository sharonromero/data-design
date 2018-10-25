INSERT INTO bird(birdId, birdName, birdColor, birdSize, birdImage, birdVideo, birdRange) VALUES(unhex("f8135d53a85e4a3ea6f741bbe5cf3b61"), "Mountain Chickadee",
"Gray", "Sparrow-sized or Smaller", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054751-1280px.jpg", "https://vimeo.com/238671200", "year-round");

INSERT INTO sound(soundId, soundBirdId, soundFile) VALUES(unhex("6b5abb8dc7e049bd8675371e97f2dfbf"), unhex("f8135d53a85e4a3ea6f741bbe5cf3b61"), "Song");

INSERT INTO article(articleId, articleBirdId, articleContent, articleBirdImage)
VALUES(unhex("3c4476f18c2c46b1a213188a7e75fdf1"), unhex("f8135d53a85e4a3ea6f741bbe5cf3b61"), "Description", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054751-1280px.jpg");

INSERT INTO article(articleId, articleBirdId, articleContent, articleBirdImage)
VALUES(unhex("4a77ad37eb824daca945715611d5d658"), unhex("f8135d53a85e4a3ea6f741bbe5cf3b61"), "Information", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054741-1280px.jpg");

INSERT INTO article(articleId, articleBirdId, articleContent, articleBirdImage)
VALUES(unhex("e925e1b8d9044a20b429367eb51ee6f9"), unhex("f8135d53a85e4a3ea6f741bbe5cf3b61"), "Information", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054741-1280px.jpg");

UPDATE article SET articleContent = "Behavior" WHERE articleId = unhex("4a77ad37eb824daca945715611d5d658");

INSERT INTO article(articleId, articleBirdId, articleContent, articleBirdImage)
VALUES(unhex("3602aa0928c94275a80ab24db27337ed"), unhex("f8135d53a85e4a3ea6f741bbe5cf3b61"), "Range", "https://d1ia71hq4oe7pn.cloudfront.net/photo/68054761-1280px.jpg");

DELETE from article WHERE articleId = unhex("e925e1b8d9044a20b429367eb51ee6f9");

SELECT articleId FROM article;

SELECT * FROM article WHERE articleId = unhex("3c4476f18c2c46b1a213188a7e75fdf1");

SELECT sound.soundId, sound.soundBirdId, sound.soundFile, bird.birdId FROM sound INNER JOIN bird ON sound.soundBirdId = bird.birdId
WHERE soundId = unhex("6b5abb8dc7e049bd8675371e97f2dfbf");

SELECT article.articleId, article.articleBirdId, article.articleContent, article.articleBirdImage, bird.birdId FROM article INNER JOIN bird ON article.articleBirdId = bird.birdId
WHERE articleBirdId = unhex("f8135d53a85e4a3ea6f741bbe5cf3b61");

SELECT COUNT (likeTweetId) FROM 'like';