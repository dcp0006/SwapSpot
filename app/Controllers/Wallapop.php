<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\ArticulosModel;

class Wallapop extends BaseController
{
    
    public function index(): string
    {
        $modelo = model(UsersModel::class);
        $users = $modelo->getUsers();
        $data = ['base'=>base_url(),'user' => $users];
        return view("index",$data); 
    }
    public function register()
    {
        $userId =  $this->request->getGet("userId");
        $userPas = $this->request->getGet("password");
        $modelo = model(UsersModel::class);
        $modelo->save(['usuario'=>$userId,'nombre'=>$userId,'contrasenna'=>$userPas]);
        echo("<script>alert('Usuario creado')</script>");
        echo("<script>window.location.href='". base_url() ."'; </script>");
    }
    public function registerArticle()
    {
        $productName =  $this->request->getPost("ProductName");
        $productDescription = $this->request->getPost("ProductDescription");
        $ProductPrice = $this->request->getPost("ProductPrice");
        $ProductImage = $this->request->getFile('ProductImage');
        $nombreArchivo = $ProductImage->getRandomName();
        echo("<script>alert('". $nombreArchivo ."')</script>");
        $ProductImage->move('../public/uploads',$nombreArchivo);
        $modelo = model(ArticulosModel::class);
        $session = session();
        $modelo->save(['usuario'=>$session->get('usuario'),'image'=>$nombreArchivo,'nombre'=>$productName,'descripcion'=>$productDescription,'precio'=>$ProductPrice]);
        echo("<script>window.location.href='". base_url() ."UserPage'</script>");
    }
    public function UserPage() : string {
        $usuario = $this->request->getGet('userLog');
        $session=session();
        $session->set("user",$usuario);
        $data = ['user'=>$usuario];
        return view("UserPage",$data);
    }
    public function Compras() : string {
        $session = session();
        $modelo = model(ArticulosModel::class);
        $articulos = $modelo->getArticulos();
        $data = ['usuario'=>$session->get('usuario'),'articulos'=>$articulos];
        return view('form',$data);
    }
    public function Vista() : string {
        $modelo = model(ArticulosModel::class);
        $articulos = $modelo->getArticulos();
        $data = ['base'=>base_url(),'articles' => $articulos];
        return view('VistaArticulos',$data);
    }
}
