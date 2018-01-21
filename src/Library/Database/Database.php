<?php

namespace GAPHP\Library\Database;


use PDO;


class Database
{
  private static $instance = null;
  private $connections;

  private function __construct()
  {
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  /**
   * @return array
   */
  public function getConnections()
  {
    return $this->connections === null ? array() : $this->connections;
  }

  /**
   * @param string $connectionName
   * @return PDO
   */
  public function getConnection(string $connectionName)
  {
    return $this->connections[$connectionName];
  }

  /**
   * Expected connection string format <database_type>://<username>:<password>@<database_name>:<port>/<database>
   *
   * @param string $connectionName
   * @param string $connectionString
   */
  public function addConnection(string $connectionName, string $connectionString)
  {
    $credentials = $this->getCredentials($connectionString);
    $conn = new PDO($credentials->getPDOConnectionString(), $credentials->getUsername(), $credentials->getPassword(), $credentials->getOptions());
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->getConnections()[$connectionName] = $conn;
  }

  /**
   * Gives a DatabaseCredential structured datatype.
   *
   * @param $connectionString
   * @return DatabaseCredentials
   */
  private function getCredentials($connectionString)
  {
    return new DatabaseCredentials($connectionString);
  }
}