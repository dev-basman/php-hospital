<?php
namespace models;

class Admin
{
  private ?int $id = null;
  private string $name;
  private string $password;

  public function __construct(string $name, string $password, ?int $id = null)
  {
    $this->name = $name;
    $this->password = $password;
    $this->id = $id;
  }

  public static function createWithNameAndPassword(string $name, string $password): Admin
  {
    return new Admin($name, $password);
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getName(): string
  {
    return $this->name;
  }
}
?>