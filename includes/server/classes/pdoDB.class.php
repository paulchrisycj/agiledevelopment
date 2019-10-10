<?php
require_once("../config/config.php");

Class pdoDB {
  /**
   * @access private
   * @static $dbConnection to hold the db connection
   */
  private static $dbConnection = null;

  /**
  * make the constructor and clone functions private to prevent normal class instantiation
  * @access private
  */
  private function __construct() {
  }
  private function __clone() {
  }

  /**
   * Return DB connection or create initial connection
   * @return object (PDO connection)
   * @access public
   */
  public static function getConnection() {
    // if there isn't a connection already then create one
    if ( !self::$dbConnection ) {
      try{
        $pdo = new PDO(dsn, userName, passWord);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
      }
    catch(PDOException $e){
        echo 'Connection failed: '.$e->getMessage().dsn.userName.passWord;
    }
        
    }
    // return the connection
    return $pdo;

//     try {
//     $dbh = new PDO(dsn, userName, passWord);
//     foreach($dbh->query('SELECT * from customers') as $row) {
//         print_r($row);
//     }
//     $dbh = null;
// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }



  }
}
?>