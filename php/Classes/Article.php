<?php
//namespace /sromero130/public_html/data-design/php/Classes/Article.php;

//require_once(Classes(__autoload.php__ ) . "/Classes/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * This shows what a user sees when they go to the website.
 *
 * @author Sharon Romero <sromero130@cnm.edu>
 * @version 1.0.0
 **/

class Bird {

	private $articleId;
	private $articleBirdId;
	private $articleSoundBirdId;
	private $articleContent;
	private $articleBirdImage;

	public function __construct($newArticleId, $newArticleBirdId, $newArticleSoundBirdId, $newArticleContent, $newArticleBirdImage) {
	{
		$this->setArticleId($newArticleId);
		$this->setArticleBirdId($newArticleBirdId);
		$this->setArticleSoundBirdId($newArticleBirdId);
		$this->setArticleContent($newArticleContent);
		$this->setArticleBirdImage($newArticleBirdImage);
		}
	}

$bird1 = new Bird();
$bird1->articleId =
$bird1->articleBirdId =
$bird1->articleSoundBirdId =
$bird1->articleContent = "Behavior";
$bird1->articleBirdImage =

	/**
	 * mutator method for article id
	 * @param $articleId
	 **/
	public function setArticleId($articleId) {
		$this->articleId = $articleId;
	}

	/**
	 * accessor method for article id
	 * @return Uuid of value for articleId
	 **/
	public function getArticleId() : Uuid {
		return ($this->articleId);
	}


	/**
	 * mutator method for article bird id
	 * @param $articleBirdId
	 **/
	public function setArticleBirdId($articleBirdId) {
		$this->articleBirdId = $articleBirdId;
	}

	/**
	 * accessor method for article bird id
	 * @return mixed
	 **/
	public function getArticleBirdId() {
		return ($this->articleBirdId);
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