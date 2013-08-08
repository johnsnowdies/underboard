<?
class Model{
    public $DBH; # Основной объект для работы с БД

    function __construct(){
        try {
            $this->DBH = $this->buildDBConnector();
            $this->DBH->query('SET NAMES `utf8`');
        } catch (PDOException $e) {
            #echo $e->getMessage();
        }
    }

    function buildDBConnector(){
        $dsn = 'mysql:dbname=' . C_BASE . ';host=' . C_HOST;
        $dbh = new PDO($dsn, C_USER, C_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }

    public function check_uid($email){
        $sth = $this->DBH->prepare('SELECT md5(CONCAT(`login`,`password`)) AS `uid` FROM `users` WHERE `login` = :email');
        $sth->execute(array('email' => $email));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result['uid'];
    }

    public function get_data(){}
}