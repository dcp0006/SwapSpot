<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class ArticulosModel extends Model
  {
      protected $table = 'articulos'; // Nombre de la tabla de la BD
      protected $allowedFields = ['id_vendedor','nombre','image', 'descripcion', 'precio']; // Campos de la tabla que queremos mapear

      // Para obtener todos los artículos:
      public function getArticulos()
      {
          return $this->findAll();
      }
      public function getArticulosById($id)
      {
          return $this->find($id);
      }
  }