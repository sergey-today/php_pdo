<?

	class db {

		private $host = 'localhost';
		private $dbname = 'default';
		private $user = 'user';
		private $password = 'password';
		private $charset = 'utf8';
		private $options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];

		public function query($query, ...$q) {
			$connect_str = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
			$pdo = new PDO($connect_str, $this->user, $this->password, $this->options);
			$DATA = $pdo->prepare($query);
			$DATA->execute(array(...$q));
			return $DATA;
		}
		
	}

	$db = new db();

?>