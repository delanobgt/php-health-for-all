<?php
require_once __DIR__.'/../config.php';

class Paginator
{
	private $statement;
	private $statementParameters;
	private $page;
	private $limit;
	private $numOfPages;
	private $resultCount;
	// jumlah range maksimal yang akan ditampilkan
	private $rangeLimit;

	public function __construct(PDOStatement $statement, $page, $limit, $statementParameters = array())
	{
	$this->page = $page;
	$this->limit = $limit;
	$this->statement = $statement;
	$this->statementParameters = $statementParameters;
	$this->statement->execute($this->statementParameters);
	$this->resultCount = $this->statement->rowCount();
	$this->numOfPages = ceil($this->resultCount / $limit);
	$this->rangeLimit = 8;
	}

	public function setRangeLimit($rangeLimit) {
	$this->rangeLimit = $rangeLimit;
	}

	public function getResults()
	{
	global $pdo;

	$startLimit = ($this->page - 1) * $this->limit;
	$queryString = $this->statement->queryString . " LIMIT $startLimit, $this->limit";
	$this->statement = $pdo->prepare($queryString);
	$this->statement->execute($this->statementParameters);

	return $this->statement->fetchAll();
	}

	/**
	* Menentukan jika page sebelumnya ada hasil
	*
	* @return boolean
	*/
	public function hasPreviousPage()
	{
	return $this->resultCount > 1 && $this->page > 1;
	}

	/**
	* Mengembalikan halaman sebelumnya
	*
	* @return integer
	*/
	public function getPreviousPage()
	{
	return $this->page - 1;
	}

	/**
	* Menentukan jika page setelahnya ada hasil
	*
	* @return boolean
	*/
	public function hasNextPage()
	{
	return $this->resultCount > 1 && $this->page < $this->numOfPages;
	}

	/**
	* Mengembalikan halaman setelahnya
	*
	* @return integer
	*/
	public function getNextPage()
	{
	return $this->page + 1;
	}

	/**
	* Menentukan range halaman yang akan ditampilkan
	*
	* @return array range halaman
	*/
	public function getRange()
	{
	$halfLimit = $this->rangeLimit / 2;
	if ($this->page < ($halfLimit)) {
	if ($this->numOfPages > $this->rangeLimit) return range(1, $this->rangeLimit);

	return range(1, $this->numOfPages);
	}
	if ($this->page + ($halfLimit) > $this->numOfPages) {
	return range($this->page - $halfLimit + 1, $this->numOfPages);
	}

	return range($this->page - $halfLimit + 1, $this->page + $halfLimit);
	}

	/**
	* Mengembalikan halaman sekarang
	*
	* @return integer
	*/
	public function getPage()
	{
	return $this->page;
	}

	public function getResultCount()
	{
	return $this->resultCount;
	}

	public function getLimit()
	{
	return $this->limit;
	}
	public function getCountPage(){
		return $this->numOfPages;
	}
}