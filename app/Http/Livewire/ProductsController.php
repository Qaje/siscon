<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Covering_Material;
use App\Models\Covering_Type;
use App\Models\Industry;
use App\Models\Mark;
use App\Models\Modely;
use App\Models\Plant;
use App\Models\Plant_Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Sole_Color;
use App\Models\Sole_Material;
use App\Models\Sole_Type;
use App\Models\Texture_Color;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class ProductsController extends Component
{
	use WithFileUploads;
	use WithPagination;


	public $name,$search,$image, $selected_id, $pageTitle, $componentName,
			 $barcode,$cost,$price,
			 $stock,$alerts,$categoryid,
			 $markid,$industryid,$modelid,
			 $typeid,$plantid,$sizeid,$plantcolorid,
			 $solecolorid,$solematerialid,$soletypeid,
			 $coveringmaterialid,$texturecolorid;
	private $pagination = 3;
    //inicializa informacion
    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Productos';

        $this->categoryid = 'Elegir';
        $this->markid = 'Elegir';
        $this->industryid = 'Elegir';
        $this->modelid = 'Elegir';
        $this->typeid = 'Elegir';
        $this->texturecolorid = 'Elegir';
        $this->sizeid = 'Elegir';
        $this->plantcolorid = 'Elegir';
        $this->solecolorid = 'Elegir';
        $this->soletypeid = 'Elegir';
        $this->coveringtypeid = 'Elegir';
        $this->coveringmaterialid = 'Elegir';

        // $this->plantid = 'Elegir';
        // $this->solematerialid = 'Elegir';
        // solematerialid' 
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if(strlen($this->search) > 0)
    		$products = Product::join('categories as c','c.id','products.category_id')
    					->select('products.*','c.name as category')
    					->where('products.name','like','%' . $this->search . '%')
    					->orWhere('products.barcode','like','%' . $this->search . '%')
    					->orWhere('c.name','like','%' . $this->search . '%')
    					->orderBy('products.name','asc')
    					->paginate($this->pagination);
    	//$products = Product::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
        	$products = Product::join('categories as c','c.id','products.category_id')
    					->select('products.*','c.name as category')
    					->orderBy('products.name','asc')
    					->paginate($this->pagination);
        //$products = Product::orderBy('id','desc')->paginate($this->pagination);
    	//dd($products);
    	
        return view('livewire.products.component',[
        	'data' => $products,
        	'categories' => Category::orderBy('name','asc')->get(),
        	'marks' => Mark::orderBy('name','asc')->get(),
        	'industries' => Industry::orderBy('name','asc')->get(),
        	'models' => Modely::orderBy('name','asc')->get(),
        	'types' => Type::orderBy('name','asc')->get(),
        	'texturecolors' => Texture_Color::orderBy('name','asc')->get(),
        	'sizes' => Size::orderBy('name','asc')->get(),
        	'plantcolors' => Plant_Color::orderBy('name','asc')->get(),
            'solecolors' => Sole_Color::orderBy('name','asc')->get(),
        	'soletypes' => Sole_Type::orderBy('name','asc')->get(),
            'coveringtypes' => Covering_Type::orderBy('name','asc')->get(),
        	'coveringmaterials' => Covering_Material::orderBy('name','asc')->get(),

        	//'plants' => Plant::orderBy('name','asc')->get(),
        	//'solematerials' => Sole_Material::orderBy('name','asc')->get(),
        ])
        ->extends('layouts.theme.app')
        ->section('content');
        
    }


    public function Store()
    {
         //dd($product);

     	$rules = [
     		'name' => 'required|unique:products|min:3',
            'barcode' => 'required',
     		'cost' => 'required',
     		'price' => 'required',
     		'stock' => 'required',
     		'alerts' => 'required',
     		'categoryid' => 'required|not_in:Elegir',
     		'markid' => 'required|not_in:Elegir',
			'industryid' => 'required|not_in:Elegir',
			'modelid' => 'required|not_in:Elegir',
			'typeid' => 'required|not_in:Elegir',
			    // 'plantid' => 'required|not_in:Elegir',
			'sizeid' => 'required|not_in:Elegir',
			'plantcolorid' => 'required|not_in:Elegir',
            'soletypeid' => 'required|not_in:Elegir',
			'solecolorid' => 'required|not_in:Elegir',
			    // 'solematerialid' => 'required|not_in:Elegir',
			'coveringmaterialid' => 'required|not_in:Elegir',
			'texturecolorid' => 'required|not_in:Elegir'
     	];

         $messages = [
            'name.required' => 'Nombre del producto requerido',
            'name.unique' => 'Ya existe el nombre del producto',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'barcode.required' => 'El codigo es requerido',
            'cost.required' => 'El costo es requerido',
            'price.required' => 'El precio es requerido',
            'stock.required' => 'El stock es requerido',
            'alerts.required' => 'Ingresa el valor mínimo de existencia',
            'categoryid.not_in' => 'Elige una categoria',
            'markid.not_in' => 'Elige una marca',
            'industryid.not_in' => 'Elige una industria',
            'modelid.not_in' => 'Elige un modelo',
            'typeid.not_in' => 'Elige un tipo',
                // 'plantid.not_in' => 'Elige un tipo de planta textura',
            'sizeid.not_in' => 'Elige un tamaño',
            'plantcolorid.not_in' => 'Elige un color de planta',
            'soletypeid.not_in' => 'Elige un tipo de suela',
            'solecolorid.not_in' => 'Elige un color de suela',
                // 'solematerialid.not_in' => 'Elige un material de suela',
            'coveringmaterialid.not_in' => 'Elige un material de covertura',
            'texturecolorid.not_in' => 'Elige un color de textura',
         ];

         $this->validate($rules, $messages);
        ///dd($messages);


        $product = Product::create([
            'name' => $this->name,
            'barcode' => $this->barcode,
            'cost' => $this->cost,
            'price' => $this->price,
            'stock' => $this->stock,
            'alerts' => $this->alerts,
            'category_id' => $this->categoryid,
            'mark_id' => $this->markid,
            'industry_id' => $this->industryid,
            'modelies_id' => $this->modelid,
            'type_id' => $this->typeid,
            'texture_color_id' => $this->texturecolorid,
            'size_id' => $this->sizeid,
            'plant_color_id' => $this->plantcolorid,
            'sole_color_id' => $this->solecolorid,
            'sole__types_id' =>$this->soletypeid,
            'covering__types_id' =>$this->coveringtypeid,
            'covering_material_id' => $this->coveringmaterialid,
            'image' => $this->image
        ]);
             //dd($product);
        $customFileName;
        if($this->image)
        {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products', $customFileName);
            $product->image = $customFileName;
            $product->save();

            // if($imageTemp != null)
            // {
            //     if(file_exists('storage/products/' . $imageTemp)){
            //         unlink('storage/products/' . $imageTemp);
            //     }
            // }
        }

        $this->resetUI();
        $this->emit('product-added','Producto Registrado');     
    }


    public function resetUI()
    {   
        $this->name = '';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;

    }

    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];
}
