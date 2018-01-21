<?php

namespace GAPHP\Library\Model;

use DateTime;

class BaseModel
{

  private $createdAt;
  private $updatedAt;
  private $isActive;
  private $tableName;

  /**
   * @return string
   */
  public function getTableName()
  {
    return $this->tableName;
  }

  /**
   * @param string $tableName
   */
  public function setTableName(string $tableName)
  {
    $this->tableName = $tableName;
  }

  /**
   * @return DateTime
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * @param DateTime $createdAt
   */
  public function setCreatedAt(DateTime $createdAt)
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @return DateTime
   */
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }

  /**
   * @param DateTime $updatedAt
   */
  public function setUpdatedAt(DateTime $updatedAt)
  {
    $this->updatedAt = $updatedAt;
  }

  /**
   * @return bool
   */
  public function getisActive()
  {
    return (bool) $this->isActive;
  }

  /**
   * @param bool $isActive
   */
  public function setIsActive(bool $isActive)
  {
    $this->isActive = $isActive;
  }

  public function save()
  {

  }
}