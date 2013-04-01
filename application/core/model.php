<?
class Model
{	
	public $DBH;	# Основной объект для работы с БД
	
	function __construct(){
		try{
			$this->DBH = $this->buildDBConnector();
			$this->DBH->query('SET NAMES `utf8`');
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	function buildDBConnector(){
		$dsn = 'mysql:dbname='.C_BASE.';host='.C_HOST;
		$dbh = new PDO($dsn, C_USER, C_PASS);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbh;
	}

    public function get_data()
    {
    }
}
?>