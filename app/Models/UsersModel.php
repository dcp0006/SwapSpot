<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class UsersModel extends Model
  {
      protected $table = 'usuarios'; // Nombre de la tabla de la BD
      protected $allowedFields = ['usuario', 'nombre', 'contrasenna']; // Campos de la tabla que queremos mapear

      // Para obtener todos los artículos:
      public function getUsers()
      {
          return $this->findAll();
      }
      
  }