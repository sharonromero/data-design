<?php
namespace sharonromero\DataDesign;

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * This shows what a user sees when they go to the website.
 *
 * @author Sharon Romero <sromero130@cnm.edu>
 * @version 1.0.0
 **/
class Bird {
	/**
	 * id for this article; this is the primary key.
	 * @var uuid $articleId
	 **/
	private $articleId;
	/**
	 * id of the bird that the article is about; this is a foreign key.
	 * @var uuid $articleBirdId
	 **/
	private $articleBirdId;
	/**
	 * id of the sound file that is played for the bird discussed in the article; this is a foreign key.
	 * @var uuid $articleSoundBirdId
	 **/
	private $articleSoundBirdId;
	/**
	 * actual textual content of the article
	 * @var string $articleContent
	 **/
	private $articleContent;
	/**
	 * name (url) of the image of the bird that is discussed in the article
	 * @var string $articleBirdImage
	 **/
	private $articleBirdImage;

	/**
	 * constructor for bird class
	 * @param uuid $newArticleId id of this article or null if new article
	 * @param uuid $newArticleBirdId id of the bird that is being discussed in the article
	 * @param uuid $newArticleSoundBirdId if of the sound file of the bird discussed in the article
	 * @param string $newArticleContent string containing actual article data
	 * @param string $newArticleBirdImage string containing the name or url of the image of the bird discussed in the article
	 **/
	public function __construct($newArticleId, $newArticleBirdId, $newArticleSoundBirdId, string $newArticleContent, string $newArticleBirdImage) {
	try {
		$this->setArticleId($newArticleId);
		$this->setArticleBirdId($newArticleBirdId);
		$this->setArticleSoundBirdId($newArticleSoundBirdId);
		$this->setArticleContent($newArticleContent);
		$this->setArticleBirdImage($newArticleBirdImage);
		}
		//determine what exception was thrown
	catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for article id
	 *
	 * @return Uuid value for articleId
	 **/
	public function getArticleId() : Uuid {
		return ($this->articleId);

		//this outside of class
		//$article->get article id();
	}

	/**
	 * mutator method for article id
	 * @param uuid $newArticleId new value of article id
	 * @throws \RangeException if $newArticleId is not positive
	 * @throws \TypeError if $newArticleId is not a uuid
	 **/
	public function setArticleId( $newArticleId) : void {
		try {
			$uuid = self::validateUuid($newArticleId);
		}catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		}

		//convert and store the article id
		$this->articleId = $uuid;


			}

	}

/**
 * accessor method for article bird id
 *
 * @return uuid value for article bird id
 **/
public function getArticleBirdId() : uuid{
	return ($this->articleBirdId);
}

	/**
	 * mutator method for article bird id
	 *
	 * @param string | Uuid $newArticleBirdId new value of article bird id
	 * @throws \RangeException if $newArticleBirdId is not positive
	 * @throws \TypeError if $newArticleBirdId is not an integer
	 **/
	public function setArticleBirdId( $newArticleBirdId) : void {
		try {
				$uuid = self::validateUuid($newArticleBirdId);
			catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
				$exceptionType = get_class($exception);
				throw(new $exceptionType($exception->getMessage(), 0, $exception));
			}

			// convert and store the article bird id
			$this->articleBirdId = $uuid;
	}

	/**
	 * @param $articleSoundBirdId
	 * mutator method for article sound bird id
	 **/
	public function setArticleSoundBirdId($articleSoundBirdId) {
		$this->articleSoundBirdId = $articleSoundBirdId;
	}

	/**
	 * @return mixed
	 * accessor method for article sound bird id
	 **/
	public function getArticleSoundBirdId() {
		return ($this->articleSoundBirdId);
	}

	/**
	 * @param $articleContent
	 * mutator method for article content
	 **/
	public function setArticleContent($articleContent) {
		$this->articleContent = $articleContent;
	}

	/**
	 * @return mixed
	 * accessor method for article content
	 **/
	public function getArticleContent() {
		return ($this->articleContent);
	}

	/**
	 * @param $articleBirdImage
	 * mutator method for article bird image
	 **/
	public function setArticleBirdImage($articleBirdImage) {
		$this->articleBirdImage = $articleBirdImage;
	}

	/**
	 * @return mixed
	 * accessor method for article bird image
	 **/
	public function getArticleBirdImage() {
		return ($this->articleBirdImage);
	}

}

?>