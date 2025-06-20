<?php

namespace App\Livewire\User;
//use App\Models\Imagenes;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;


#[Title('Usuarios')]
class UserComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    //Propiedades clase    
    public $search='';
    public $totalRegistros=0;
    public $cantidad=5;   
    
    public $Id;
    public $nombre;
    public $email;
    public $password;
    public $admin = true;
    public $activo = true;
    public $tipo_sat = true;
    public $imagen;
    public $imagenModelo;
    public $re_password;

    public function render()
    {
        $this->totalRegistros = User::count();  
        $users=User::where('nombre','like','%'.$this->search.'%')
            ->orderBy('id','desc')
            ->paginate($this->cantidad);  
        return view('livewire.user.user-component',[
        'users'=>$users
        ]);
    }

    public function create()
    {
        $this->Id=0;
        $this->clean();

        $this->dispatch('open-modal','modalUser');

    }
    public function clean(){
        $this->reset(['Id','nombre','email','password','admin',
        'activo','imagen','imagenModelo']);
        $this->resetErrorBag();
    }

    #[On('destroyUser')]
    public function destroy($id)
    { 
       // dump($id);
       $user = User::findOrfail($id);

       
           if($user->imagenes!=null)
           {
              // dump($product->imagenes->url);
               Storage::delete('public/'.$user->imagenes->url);
               //Storage::delete($product->imagenes->url);
               // dump($product->imagenes->url);
               $customName=$user->imagenes->url;
                       
               $user->imagenes()->delete(['url'=>$customName]);
           
           }
   
      

       $user->delete();
       $this->dispatch('msg','Usuario a sido eliminado correctamente');
    }


    public function edit(User $user)
    {   
        $this->Id= $user->id;
        $this->nombre=$user->nombre; 
        $this->email=$user->email; 
        $this->admin=$user->admin ? true : false; 
        $this->activo=$user->activo ? true : false;
        $this->tipo_sat=$user->tipo_sat ? true : false; 
        $this->imagenModelo=$user->imagenes ? $user->imagenes->url : null; 
        //dump($category);
        $this->dispatch('open-modal','modalUser');
    }

    public function update(User $user)
    { 
       //dump($category);
       $rules=[
        'nombre' => 'required|min:5|max:255',
        'email' => 'required|min:5|max:255|unique:users,id,'.$this->Id,
        'password' => 'min:5|nullable',
        're_password' => 'same:password',
        'imagen' => 'image|max:1024|nullable'
  
    ];
       
    
    $this->validate($rules);  
    $user->nombre = $this->nombre;
    $user->email = $this->email;
    $user->admin = $this->admin;
    $user->activo = $this->activo;
    $user->tipo_sat=$this->tipo_sat;
    if($this->password)
    {
        $user->password= $this->password;
    }
    //dump($this->imagen); 
    $user->update();
  //  if(Storage::exists('public/'.$user->imagenes))
   // {   
        if($this->imagen)
        {
             dump('SI'.'public/'.$user->imagenes->url);   
            Storage::delete('public/'.$user->imagenes);
            $customName='users/'.uniqid().'.'.$this->imagen->extension();
            $user->imagenes()->delete(['url'=>$customName]);
            $this->imagen->storeAs('public',$customName);
            $user->imagenes()->create(['url'=>$customName]);
  
        }    
    //}
        else
        {
       // if($this->imagen)
       // {    

            
            dump('NO '.'public/'.$user->imagenes->url);  
            dump('uniqid '.'public/'.uniqid());  
            dump('extension '.'public/'.$this->imagen->extension());  
            
            $customName='users/'.uniqid().'.'.$this->imagen->extension();
            $this->imagen->storeAs('public',$customName);
            $user->imagenes()->create(['url'=>$customName]); 
        // }    

    }
     
 

    $this->dispatch('close-modal','modalUser');
    $this->dispatch('msg','Usuario editado correctamente');
    $this->clean(); 
    } 


    public function store(){
        // dump($this);
      
         $rules=[
             'nombre' => 'required|min:5|max:255',
             'email' => 'required|min:5|max:255|unique:users',
             'password' => 'required|min:5',
             're_password' => 'required|same:password',
             'imagen' => 'image|max:1024|nullable'
       
         ];
       
           $this->validate($rules);
           $user = new User();
           $user->nombre = $this->nombre;
           $user->email = $this->email;
           $user->password = bcrypt($this->password);
           $user->admin = $this->admin;
           $user->activo = $this->activo;
           $user->tipo_sat = $this->tipo_sat;

           $customName= null;

         $user->save();
 
         if($this->imagen)
         {
            
             $customName='users/'.uniqid().'.'.$this->imagen->extension();
             $this->imagen->storeAs('public',$customName);
            // dump($customName);
             $user->imagenes()->create(['url'=>$customName]);
         }
 
         
         $this->dispatch('close-modal','modalUser');
         $this->dispatch('msg','Usuario creado correctamente');
         $this->clean();
  
     }
}
