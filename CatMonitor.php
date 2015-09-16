<?php
/**
 * HUMAN! Cat can sees you! Clueless human no touch this file! Go touch CatConfig instead, she likes it!
 */
class CatMonitor
{
	/**
	 * @var CatConfig
	 */
	private $catConfig;

	public function __construct(CatConfig $catConfig) {
		$this->catConfig = $catConfig;
	}

	public function routeCat($doCat) {
		switch ($doCat) {
			case 'ajaxCat':
				$this->ajaxCat();
				break;

			default:
				$this->defaultCat();
				break;
		}
	}

	private function defaultCat() {
		include './CatTemplate.php';
	}

	private function ajaxCat() {
		$statusCat = trim(@file_get_contents($this->catConfig->statusCatFile, false, null, -1, 256));

		header('Content-type: application/json');

		if ($statusCat === false) {
			$responseCat = [
				'img' => $this->catConfig->errorCat,
				'txt' => 'Cat has not see status file, human go find: ' . $this->statusCatFile,
			];
		} elseif (!isset($this->catConfig->catMap[$statusCat])) {
			$responseCat = [
				'img' => $this->catConfig->errorCat,
				'txt' => 'Status code incomprehensible gibberish to cat, human go figure it out: ' . htmlspecialchars($statusCat),
			];
		} else {
			$responseCat = $this->catConfig->catMap[$statusCat];
		}

		echo json_encode($responseCat);
	}
}
