<?php
namespace sharonromero\DataDesign;

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
require_once("autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * This shows what a user sees when they go to the website.
 *
 * @author Sharon Romero <sromero130@cnm.edu>
 * @version 1.0.0
 **/
class Bird {
	use ValidateUuid;
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
	 * @param string $newArticleContent string containing actual article data
	 * @param string $newArticleBirdImage string containing the name or url of the image of the bird discussed in the article
	 **/
	public function __construct($newArticleId, $newArticleBirdId, string $newArticleContent, string $newArticleBirdImage) {
		try {
			$this->setArticleId($newArticleId);
			$this->setArticleBirdId($newArticleBirdId);
			$this->setArticleContent($newArticleContent);
			$this->setArticleBirdImage($newArticleBirdImage);
		} //determine what exception was thrown
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
	public function getArticleId(): Uuid {
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
	public function setArticleId($newArticleId): void {
		try {
			$uuid = self::validateUuid($newArticleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		}

		//convert and store the article id
		$this->articleId = $uuid;
	}
	/**
	 * accessor method for article bird id
	 *
	 * @return uuid value for article bird id
	 **/
	public function getArticleBirdId(): uuid {
		return ($this->articleBirdId);
	}
	/**
	 * mutator method for article bird id
	 *
	 * @param string | Uuid $newArticleBirdId new value of article bird id
	 * @throws \RangeException if $newArticleBirdId is not positive
	 * @throws \TypeError if $newArticleBirdId is not an integer
	 **/
	public function setArticleBirdId($newArticleBirdId): void {
		try {
			$uuid = self::validateUuid($newArticleBirdId);
		} catch
		(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the article bird id
		$this->articleBirdId = $uuid;
	}
	/**
	 * accessor method for article content
	 *
	 * @return string value of article content
	 **/
	public function getArticleContent(): string {
		return ($this->articleContent);
	}
	/**
	 * mutator method for article content
	 *
	 * @param string $newArticleContent new value of article content
	 * @throws \InvalidArgumentException if $newArticleContent is not a string or insecure
	 * @throws \RangeException if $newArticleContent is > 100 characters
	 * @throws \TypeError if $newArticleContent is not a string
	 **/
	public function setArticleContent(string $newArticleContent): void {
		//verify the article content is secure
		$newArticleContent = trim($newArticleContent);
		$newArticleContent = filter_var($newArticleContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleContent) === true) {
			throw(new \InvalidArgumentException("article content is empty or insecure"));
		}

		//verify the article content will fit in the database
		if(strlen($newArticleContent) >= 100) {
			throw(new \RangeException("article content too large"));
		}

		// store the article content
		$this->articleContent = $newArticleContent;
	}

	/**
	 * accessor method for article bird image
	 *
	 * @return string value of article bird image
	 **/
	public function getArticleBirdImage(): string {
		return ($this->articleBirdImage);
	}

	/**
	 * mutator method for article bird image
	 *
	 * @param string $newArticleBirdImage new value of bird image
	 * @throws \InvalidArgumentException if $newArticleBirdImage is not a string or insecure
	 * @throws \RangeException if $newArticleBirdImage is > 255 characters
	 * @throws \TypeError if $newArticleBirdImage is not a string
	 **/
	public function setArticleBirdImage(string $newArticleBirdImage): void {
		// verify the article bird image is secure
		$newArticleBirdImage = trim($newArticleBirdImage);
		$newArticleBirdImage = filter_var($newArticleBirdImage, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleBirdImage) === true) {
			throw(new \InvalidArgumentException("article bird image is empty or insecure"));
		}

		// store the article bird image
		$this->articleBirdImage = $newArticleBirdImage;
	}

	/**
	 * inserts this article into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {

		$query = "INSERT INTO article(articleId, articleBirdId, articleContent, articleBirdImage) VALUES(:articleId, :articleBirdId, :articleContent, :articleBirdImage)";

		$statement = $pdo->prepare($query);

		$statement->execute($query);
	}

	/**
	 * updates this article in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws	\PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo): void {

		// create query template
		$query = "UPDATE article SET articleBirdId = :articleBirdId, articleContent = :articleContent, articleBirdImage = :articleBirdImage WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);

		$parameters = ["articleId" => $this->articleId->getBytes(), "articleBirdId" => $this->articleBirdId->getBytes(), "articleContent" => $this->articleContent, "articleBirdImage" => $this->articleBirdImage];
		$statement->execute($parameters);
	}

	/**
	 * deletes this article from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {

		// create query template
		$query = "DELETE FROM article WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["articleId" => $this->articleId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * gets the article by articleId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $articleId article id to search for
	 * @return article|null article found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 **/
	public static function getArticleByArticleId(\PDO $pdo, $articleId) : ?Article {
		// sanitize the articleId before searching
		try {
			$articleId = self::validateUuid($articleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT articleId, articleBirdId, articleContent, articleBirdImage FROM article WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);

		// bind the article id to the place holder in the template
		$parameters = ["articleId" => $articleId->getBytes()];
			$statement->execute($parameters);

		// grab the article from mySQL
		try {
			$article = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$article = new Article($row["articleId"], $row["articleBirdId"], $row["articleContent"], $row["articleBirdImage"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($article);
	}

	/**
	 * gets all Articles
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of Articles found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getAllArticles(\PDO $pdo) : \SPLFixedArray {
		// create query template
		$query = "SELECT articleId, articleBirdId, articleContent, articleBirdImage FROM article";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of articles
		$articles = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$article = new Article($row["articleId"], $row["articleBirdId"], $row["articleContent"], $row["articleBirdImage"]);
				$articles[$articles->key()] = $article;
				$articles->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
				}
			}
		return ($articles);
	}

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() : array {
		$fields = get_object_vars($this);

		$fields["articleId"] = $this->articleId->toString();
		$fields["articleBirdId"] = $this->articleBirdId->toString();

		return($fields);
	}
}