<?php

namespace GAPHP\Library\Database;

use GAPHP\Library\Exceptions\ConnectionStringException;

class DatabaseCredentials
{
  private $scheme;
  private $host;
  private $port;
  private $username;
  private $password;
  private $database;

  public function __construct($connectionString)
  {
    $connectionParts = parse_url($connectionString);

    if ($connectionParts === false) {
      throw new ConnectionStringException('malformed.connection.string', 400);
    }

    $this->setScheme($connectionParts['scheme']);
    $this->setHost($connectionParts['host']);
    $this->setPort($connectionParts['port']);
    $this->setUsername($connectionParts['user']);
    $this->setPassword($connectionParts['pass']);
    $this->setDatabase(str_replace('/', '', $connectionParts['path']));
  }

  /**
   * @return string
   */
  public function getScheme()
  {
    return $this->scheme;
  }

  /**
   * @param string $scheme
   */
  public function setScheme(string $scheme)
  {
    $this->scheme = $scheme;
  }

  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
  }

  /**
   * @param string $host
   */
  public function setHost(string $host)
  {
    $this->host = $host;
  }

  /**
   * @return integer
   */
  public function getPort()
  {
    return (integer)$this->port;
  }

  /**
   * @param integer $port
   */
  public function setPort($port)
  {
    $this->port = $port;
  }

  /**
   * @return string
   */
  public function getUsername()
  {
    return (string)$this->username;
  }

  /**
   * @param string $username
   */
  public function setUsername(string $username)
  {
    $this->username = $username;
  }

  /**
   * @return string
   */
  public function getPassword()
  {
    return (string)$this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword(string $password)
  {
    $this->password = $password;
  }

  /**
   * @return string
   */
  public function getDatabase()
  {
    return (string)$this->database;
  }

  /**
   * @param string $database
   */
  public function setDatabase(string $database)
  {
    $this->database = $database;
  }

  public function getOptions()
  {
    return null;
  }

  public function getPDOConnectionString()
  {
    return "{$this->getScheme()}:host={$this->getHost()};port={$this->getPort()};dbname={$this->getDatabase()}";
  }
}
